<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\admin\PostCategory;
use App\View\Components\CategoryComponent;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index()
    {
        $allCategories = PostCategory::with('subCategory')->where('parent_id', '=', 0)
            ->orderBy('created_at')
            ->get();
        return view('back_office.post_category.index', compact('allCategories'));
    }

    public function create()
    {
        $data['allCategories'] = PostCategory::whereRaw("parent_id = 0")->get();
        return view('back_office.post_category.create', $data);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:post_categories|max:255',
        ]);

        if ($validated) {

            $storeCategory = PostCategory::create([
                'parent_id' => $request->post('category_id') != null && !empty($request->post('category_id')) ? $request->post('category_id') : 0,
                'subCategory_id' => $request->post('sub_category_id') != null && !empty($request->post('sub_category_id')) ? $request->post('sub_category_id') : 0,
                'name' => $request->post('name') != null && !empty($request->post('name')) ? $request->post('name') : '',
                'slug' => $request->post('categorySlug') != null && !empty($request->post('categorySlug')) ? $request->post('categorySlug') : '',
            ]);

            if ($storeCategory) {
                toast('Category created successfully', 'success');
                return redirect()->route('show-category');
            } else {
                toast('Something wrong try again.', 'error');
                return redirect()->route('show-category');
            }

        } else {

            toast('Something wrong try again.', 'error');
            return redirect()->route('create-category');
        }
    }


    public function edit($slug)
    {

        $data['post'] = PostCategory::where('slug', '=', $slug)->first();
        $postId = $data['post']->id;
        $data['subCategory'] = PostCategory::whereRaw("parent_id != 0 AND parent_id != $postId AND id != $postId")->get();


        if ($data['post']) {
//            $categoryComponentData = new CategoryComponent(null, null,$post);

            $data['allCategories'] = PostCategory::where('parent_id', '=', 0)->get();
            return view('back_office.post_category.edit', $data);
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }

    }

    public function update(Request $request, $slug)
    {
        $updateCategory = PostCategory::find($slug);

        if ($updateCategory->parent_id == 0) {
            $updateCategory = $updateCategory->update([
                'name' => $request->post('name') != null && !empty($request->post('name')) ? $request->post('name') : '',
                'slug' => $request->post('categorySlug') != null && !empty($request->post('categorySlug')) ? $request->post('categorySlug') : '',
            ]);
            if ($updateCategory) {
                toast('Category created successfully', 'success');
                return redirect()->route('show-category');
            } else {
                toast('Something wrong try again.', 'error');
                return redirect()->back();
            }
        } else {
            $updateCategory = $updateCategory->update([
                'name' => $request->post('name') != null && !empty($request->post('name')) ? $request->post('name') : '',
                'slug' => $request->post('categorySlug') != null && !empty($request->post('categorySlug')) ? $request->post('categorySlug') : '',
            ]);
            if ($updateCategory) {
                toast('Sub Category created successfully', 'success');
                return redirect()->route('show-category');
            } else {
                toast('Something wrong try again.', 'error');
                return redirect()->back();
            }
        }

    }

    public function delete(Request $request)
    {
        $category = PostCategory::where('slug', $request->get('slug'))->first();
        if ($category) {
            $deleteSubCategory = PostCategory::where('parent_id', $category->id)->delete();
            $category = $category->delete();
            toast('Category created successfully', 'success');
        } else {
            toast('Something wrong try again.', 'error');
        }

    }


}