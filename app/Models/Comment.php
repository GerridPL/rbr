<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(int $id)
 */
class Comment extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'content',
        'post_id',
        'author'
    ];

    public function comment_post_relation()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function comment_user_relation()
    {
        return $this->belongsTo(Post::class, 'author');
    }
}
