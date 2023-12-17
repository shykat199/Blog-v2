<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\admin\PostCategory;
use App\Models\back_office\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['categories'] = PostCategory::with(['subCategory' => function ($q) {
            $q->selectRaw('id,parent_id,name,slug');
        }])->selectRaw('id,parent_id,name,slug,image')
            ->where('parent_id', '=', 0)->limit(4)->get();

        $data['randomNews'] = Post::with(['category' => function ($q) {
            $q->selectRaw('name,slug,id');
        }])->selectRaw('title,featured_image,created_at,cat_id,post_url')
            ->where('status', '=', 'Active')
            ->inRandomOrder()->limit(3)->get();

        $data['randomFeature'] = Post::with(['category' => function ($q) {
            $q->selectRaw('name,slug,id');
        }])->selectRaw('title,featured_image,created_at,cat_id,post_url')
            ->where('status', '=', 'Active')
            ->where('is_featured', '=', 1)
            ->inRandomOrder()->limit(6)->get();

        return view('frontend.layout.master', $data);
    }

    public function categoryDetails($slug)
    {

        $data['categoryPosts'] = Post::selectRaw('posts.title,posts.description,posts.post_url,posts.featured_image,posts.created_at,posts.cat_id,posts.is_featured,
                                        post_categories.name as categoryName,post_categories.slug as categorySlug')
            ->where('status', '=', 'Active')
            ->join('post_categories', 'posts.cat_id', '=', 'post_categories.id')
            ->where('post_categories.slug', '=', $slug)
            ->orderBy('posts.id', 'DESC')
            ->paginate(15);

        return view('frontend.category-details', $data);
    }

    public function newsDetails($slug)
    {
        $data['postDetails'] = Post::with(['category' => function ($select) {
            $select->select('name', 'slug','id');
        }])
            ->selectRaw('posts.id,posts.hit_count,posts.title,posts.description,posts.post_url,posts.featured_image,posts.created_at,posts.cat_id,posts.is_featured')
            ->where('posts.post_url', '=', $slug)
            ->where('posts.status', '=', 'Active')
            ->first();
        $this->postHitCount($data['postDetails']->id, $data['postDetails']->hit_count);
        return view('frontend.news-details', $data);

    }

    public function postHitCount($id, $hitCount)
    {
        $updateHitCount = Post::where('id', $id)->update(['hit_count' => \DB::raw($hitCount . ' + 1')]);

    }
}
