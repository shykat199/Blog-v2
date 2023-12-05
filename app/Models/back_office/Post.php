<?php

namespace App\Models\back_office;

use App\Models\admin\PostCategory;
use App\Models\admin\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table='posts';

    protected $fillable=[
        'sub_cat_id','user_id','hit_count','cat_id','title','description','post_url','featured_image','status'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PostCategory::class,'id','cat_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }
}
