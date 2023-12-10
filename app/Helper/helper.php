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
    $latestPosts = Post::select('title', 'featured_image')
        ->where('status', 'Active');
    if ($limit != 0) {
        $latestPosts = $latestPosts->inRandomOrder()->limit($limit);
    }
    return $latestPosts->get();
}

function trendingPosts($limit = 0, $id = 0, $days = 7)
{
    $getPosts = Post::select('title')
        ->where('status', '=', 'Active')
        ->where('created_at', '>=', \Carbon\Carbon::now()->subDay($days)->format('Y-m-d H:i'));
    if ($limit != 0) {
        $getPosts = $getPosts->limit($limit);
    }
    $getPosts = $getPosts->orderBy('hit_count', 'Desc')->get();
    return $getPosts;
}
