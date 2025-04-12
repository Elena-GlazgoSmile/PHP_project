<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    public $someProperty;
    protected $fillable = ['title', 'content', 'image', 'likes', 'is_published', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


}
