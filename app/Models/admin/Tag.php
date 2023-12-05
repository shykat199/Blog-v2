<?php

namespace App\Models\admin;

use App\Models\back_office\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag_name', 'tag_slug'];
    protected $table = "tags";


    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_tags','tag_id','post_id');
    }

}
