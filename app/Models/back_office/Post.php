<?php

namespace App\Models\back_office;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table='posts';

    protected $fillable=[
        'sub_cat_id','user_id','hit_count','cat_id','title','description','post_url','featured_image','status'
    ];
}
