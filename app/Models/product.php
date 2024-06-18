<?php

namespace App\Models;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'productName',
        'productPrice',
        'productDescription',
        'image',
        'pengambilan',
        'delivery',
        'sold'
    ];

    public function purchases() {
        return $this->hasMany(Purchase::class);
    }
}
