<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\admin\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    public function index()
    {
        $allTags = Tag::orderBy('created_at')->get();
        return view('back_office.post_tag.index', compact('allTags'));

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'tag_name' => 'required|unique:tags|max:255',
        ]);

        if ($validated) {
            $storeTag = Tag::create([
                'tag_name' => $request->post('tag_name'),
                'tag_slug' => $request->post('slug'),
            ]);

            if ($storeTag) {
                toast('Category created successfully', 'success');
                return redirect()->back();
            } else {
                toast('Something wrong try again.', 'error');
                return redirect()->back();
            }
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {

        $updateTag = Tag::where('id', '=', $id)->update([
            'tag_name' => $request->post('tag_name'),
            'tag_slug' => $request->post('slug'),
        ]);

        if ($updateTag) {
            toast('Tag updated successfully', 'success');
            return redirect()->route('show-tag');
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->route('show-tag');
        }
    }


    public function edit($slug)
    {
        $tagDetails = Tag::where('tag_slug', '=', $slug)->first();
        if ($tagDetails) {
            $allTags = Tag::all();
            return view('back_office.post_tag.index', compact('tagDetails', 'allTags'));
        }
    }

    public function delete(Request $request)
    {
        $tagDetails = Tag::where('tag_slug', $request->get('slug'))->first();

        if ($tagDetails) {
            $tagDetails = $tagDetails->delete();

            if ($tagDetails) {
                toast('Tag deleted successfully', 'success');
            } else {
                toast('Something wrong try again.', 'error');
            }
        } else {
            toast('Something wrong try again.', 'error');
            return redirect()->route('show-tag');
        }
    }
}
