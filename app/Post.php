<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 07.04.2019
 * Time: 19:54
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
        Comment::create([
           'body' => $body,
           'post_id' => $this->id,
           'user_id' => auth()->id()
        ]);
    }
}