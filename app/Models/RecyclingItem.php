<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecyclingItem extends Model
{
    use HasFactory;

    protected $table = 'recycle';
    protected $fillable = ['type', 'quantity', 'pick_up_address', 'pick_up_date', 'telephone_number'];
}
