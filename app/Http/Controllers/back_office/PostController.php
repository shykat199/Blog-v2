<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use App\Models\back_office\Post;

class PostController extends Controller
{
    public function index()
    {
        $data=[];
        $data['allPosts']=Post::all();

        return view('back_office.post.index',$data);
    }

    public function create()
    {
        return view('back_office.post.create');
    }
}
