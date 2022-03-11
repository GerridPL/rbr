<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'title',
        'content'
    ];

    public function post_comment_relation()
    {
        return $this->hasMany(Comment::class);
    }

    public function post_user_relation()
    {
        return $this->belongsTo(Post::class, 'author');
    }
}
