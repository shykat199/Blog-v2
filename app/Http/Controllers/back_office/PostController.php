<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\admin\PostCategory;
use App\Models\admin\Tag;
use App\Models\back_office\Post;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $data = [];
        $data['allPosts'] = Post::with(['tags', 'category.subCategory'])
            ->where('status', '=', 'Active')->get();
        return view('back_office.post.index', $data);
    }

    public function store(Request $request)
    {
        $checkPost = Post::where('post_url',$request->post('post_url'))->first();

        if (!empty($checkPost)){

            toast('Post is already exist wjith same title','error');
            return redirect()->back();
        }


        $fileName = null;
        if ($request->file()) {
            $fileName = Uuid::uuid() . '.' . 'post_image' . '.' . $request->file('image')->getClientOriginalExtension();
            $file = Storage::put('/public/images/post/' . $fileName, file_get_contents($request->file('image')));
        }
        $data = [
            'user_id' => Auth::user()->id,
            'sub_cat_id' => $request->post('sub_cat_id') !== null ? $request->post('sub_cat_id') : 0,
            'cat_id' => $request->post('cat_id') !== null ? $request->post('cat_id') : 0,
            'description' => $request->post('description') !== null ? $request->post('description') : '',
            'post_url' => $request->post('post_url') !== null ? $request->post('post_url') : '',
            'title' => $request->post('title') !== null ? $request->post('title') : '',
            'status' => $request->post('status') !== null ? $request->post('status') : 'Pending',
            'featured_image' => $request->file('image') !== null ? $fileName : null,
            'is_featured' => $request->post('is_featured') == 'on' ? 1 : 0,
            'hit_count' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        if ($data) {
            $storePost = Post::create($data);
            if ($storePost) {
                $tags = $request->input('tag_id');
                $storePost->tags()->sync($tags);
            }


            if ($storePost) {
                toast('Post created successfully', 'success');
                return redirect()->route('show-post');
            } else {
                toast('Something wrong try again.', 'error');
                return redirect()->back();
            }
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }
    }

    public function create()
    {
        $data['allCategories'] = PostCategory::where('parent_id', '=', 0)->get();
        return view('back_office.post.create', $data);
    }

    public function edit($slug)
    {
        $data['allCategories'] = PostCategory::where('parent_id', '=', 0)->get();
        $data['postDetails'] = Post::with(['tags', 'category.subCategory'])
            ->whereRaw('post_url = ?', [$slug])
            ->where('status', '=', 'Active')->first();

        return view('back_office.post.edit', $data);
    }

    public function update(Request $request, $slug)
    {

        $getPostDetails = Post::where('post_url', '=', $slug)->first();
        $fileName = null;
        if ($getPostDetails && $request->file('image')) {
            $dltVideo = Storage::delete('public/images/post/' . $getPostDetails->featured_image);
            $fileName = Uuid::uuid() . '.' . 'post_image' . '.' . $request->file('image')->getClientOriginalExtension();
            $file = Storage::put('/public/images/post/' . $fileName, file_get_contents($request->file('image')));
        }

        if ($getPostDetails) {
            $updatePost = Post::where('post_url', $slug)->first()->update([
                'user_id' => Auth::user()->id,
                'sub_cat_id' => $request->post('sub_cat_id') !== null ? $request->post('sub_cat_id') : 0,
                'cat_id' => $request->post('cat_id') !== null ? $request->post('cat_id') : 0,
                'description' => $request->post('description') !== null ? $request->post('description') : '',
                'post_url' => $request->post('post_url') !== null ? $request->post('post_url') : '',
                'title' => $request->post('title') !== null ? $request->post('title') : '',
                'is_featured' => $request->post('is_featured') == 'on' ? 1 : 0,
                'status' => $request->post('status') !== null ? $request->post('status') : 'Pending',
                'featured_image' => $request->file('image') !== null ? $fileName : $getPostDetails->featured_image,
                'hit_count' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            if ($updatePost) {
                $tags = $request->input('tag_id');
                if ($tags) {
                    $getPostDetails->tags()->sync($tags);
                }
            }


            if ($updatePost) {
                toast('Post updated successfully', 'success');
                return redirect()->route('show-post');
            } else {
                toast('Something wrong try again.', 'error');
                return redirect()->back();
            }
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }
    }


    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $postSlug = $request->get('slug');

            $getPost = Post::where('post_url', $postSlug)->first();

            if ($getPost) {
                $dltVideo = Storage::delete('public/images/post/' . $getPost->featured_image);
                $getPost->tags()->detach();
                $deletePost = $getPost->delete();

                if ($deletePost) {
                    toast('Post deleted successfully', 'success');
                    return redirect()->route('show-post');
                } else {
                    toast('Something wrong try again.', 'error');
                    return redirect()->back();
                }

            } else {
                toast('Something wrong try again.', 'error');
                return redirect()->back();
            }

        }
    }


    public function postTag(Request $request)
    {
        $query = $request->input('query');
        $keywords = explode(' ', $query);

        $tags = Tag::where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $lowercaseKeyword = strtolower($keyword);
                $query->orWhereRaw('LOWER(tag_name) LIKE ?', ["%$lowercaseKeyword%"]);
            }
        })->get();

        return response()->json($tags);
    }

    public function postTagData(Request $request)
    {

        if ($request->ajax()) {
            $getAllTags = Tag::whereIn('id', array_keys($request->get('tagList')))->get();
            $tagOption = '';
            if ($getAllTags) {
                foreach ($getAllTags as $key => $tag) {
                    $tagOption .= '
                    <option value="' . $tag->id . '" SELECTED>' . $tag->tag_name . '</option>
                    ';
                }
            }
            return response()->json([
                'selectedTagList' => $tagOption
            ]);
        }
    }

    public function getSubCategory(Request $request)
    {
        if ($request->ajax()) {
            $getSubCategory = PostCategory::whereRaw('parent_id = ?', [
                $request->get('cat_id'),
            ])->get();
            return response()->json($getSubCategory);
        }
    }
}
