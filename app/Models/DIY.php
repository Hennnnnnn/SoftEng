<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DIY extends Model
{
    use HasFactory;

    protected $table = 'diy';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
