<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DIY extends Model
{
    protected $table = 'diy';

    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    use HasFactory;
}
