<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'subCategory_id', 'name', 'slug'];
    protected $table = 'post_categories';

    public function subCategory(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }
}
