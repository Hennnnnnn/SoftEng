<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'likes_count',
        'liked_by_users'
    ];

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'discussion_user_likes', 'discussion_id', 'user_id');
    }
    // Relasi ke User
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
