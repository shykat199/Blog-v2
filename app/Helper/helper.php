<?php

use App\Models\admin\Tag;
use App\Models\admin\PostCategory;
use App\Models\back_office\Post;

function getAllTags($limit = 0, $orderBy = 'asc')
{
    $allTags = Tag::select('tag_name', 'tag_slug');
    if ($limit != 0) {
        $allTags = $allTags->limit($limit);
        $allTags = $allTags->orderBy('id', $orderBy);
    }
    return $allTags->get();
}

function getAllCategory($limit = 0, $order = 'asc')
{
    $allCategory = PostCategory::select('name', 'slug')
        ->where('parent_id', 0)
        ->orderBy('id', $order)->get();
    return $allCategory;
}

function getLatestPost($limit = 0)
{
    $latestPosts = Post::with(['category' => function ($select) {
        $select->select('name', 'slug', 'id');
    }])->selectRaw('title,featured_image,description,created_at,post_url,cat_id')
        ->where('status', 'Active')
        ->orderBy('id', 'DESC');
    if ($limit != 0) {
        $latestPosts = $latestPosts->inRandomOrder()->limit($limit);
    }
    return $latestPosts->get();
}

function trendingPosts($limit = 0, $id = 0, $days = 7)
{
    $getPosts = Post::with(['category' => function ($select) {
        $select->selectRaw('id,name,slug');
    }])->selectRaw('title,featured_image,description,cat_id,created_at,post_url,cat_id')
        ->where('status', '=', 'Active')
        ->where('created_at', '>=', \Carbon\Carbon::now()->subDay($days)->format('Y-m-d H:i:s'));
    if ($limit != 0) {
        $getPosts = $getPosts->limit($limit);
    }
    return $getPosts->orderBy('hit_count', 'Desc')->get();
}

function popularPosts($limit = 0, $days = 1)
{
    $popularPosts = Post::with(['category' => function ($select) {
        $select->selectRaw('name,slug,id');
    }])->selectRaw('title,description,post_url,featured_image,created_at,cat_id')
        ->where('status', '=', 'Active')
        ->where('created_at', '>=', \Carbon\Carbon::now()->subDay($days)->format('Y-m-d H:i:s'))
        ->orderBy('hit_count', 'DESC')
        ->limit($limit)
        ->get();

    return $popularPosts;
}

function getCategoryData($category = null, $limit = 0)
{

    $getCategoryData = Post::with(['category'=>function($select){
        $select->select('name','slug','id');
    }])->selectRaw('title,featured_image,created_at,cat_id,post_url')
        ->where('status', '=', 'Active');
    if ($category == 'business') {
        $getCategoryData = $getCategoryData->where('cat_id', '=', 4);
    } elseif ($category == 'technology') {
        $getCategoryData = $getCategoryData->where('cat_id', '=', 2);
    } elseif ($category == 'news') {
        $getCategoryData = $getCategoryData->where('cat_id', '=', 5);
    } elseif ($category == 'entertainment') {
        $getCategoryData = $getCategoryData->where('cat_id', '=', 3);
    } else {
        $getCategoryData = $getCategoryData->where('cat_id', '=', 1);
    }
    return $getCategoryData->orderBy('id','DESC')->limit($limit)->get();

}
