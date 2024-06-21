<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'likes_count'
    ];

    // Relasi ke User
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
