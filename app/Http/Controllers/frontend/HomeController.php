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

        $data['randomNews'] = Post::with(['category'=>function($q) {
            $q->selectRaw('name,slug,id');
        }])->selectRaw('title,featured_image,created_at,cat_id')
            ->where('status','=','Active')
            ->inRandomOrder()->limit(3)->get();

        return view('frontend.layout.master',$data);
    }
}
