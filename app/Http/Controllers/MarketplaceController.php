<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    //
    
    public function show() {
        $list = [
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank',
                'pengambilan' => 'Bebas Pengambilan',
                'delivery' => 'Gratis',
                'price' => 'Rp, 350000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank1',
                'pengambilan' => 'Bebas Pefsangambilan',
                'delivery' => 'Gratis',
                'price' => 'Rp, 35000000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank2',
                'pengambilan' => 'Bebas Pefsangambilan',
                'delivery' => 'Gratifsafss',
                'price' => 'Rp, 350000000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank',
                'pengambilan' => 'Bebas Pengambilan',
                'delivery' => 'Gratis',
                'price' => 'Rp, 350000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank1',
                'pengambilan' => 'Bebas Pefsangambilan',
                'delivery' => 'Gratis',
                'price' => 'Rp, 35000000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank2',
                'pengambilan' => 'Bebas Pefsangambilan',
                'delivery' => 'Gratifsafss',
                'price' => 'Rp, 350000000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank',
                'pengambilan' => 'Bebas Pengambilan',
                'delivery' => 'Gratis',
                'price' => 'Rp, 350000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank1',
                'pengambilan' => 'Bebas Pefsangambilan',
                'delivery' => 'Gratis',
                'price' => 'Rp, 35000000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank2',
                'pengambilan' => 'Bebas Pefsangambilan',
                'delivery' => 'Gratifsafss',
                'price' => 'Rp, 350000000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank',
                'pengambilan' => 'Bebas Pengambilan',
                'delivery' => 'Gratis',
                'price' => 'Rp, 350000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank1',
                'pengambilan' => 'Bebas Pefsangambilan',
                'delivery' => 'Gratis',
                'price' => 'Rp, 35000000',
                'sold' => 1
            ],
            [
                'status' => 'READY',
                'name' => 'DIY Piggy Bank2',
                'pengambilan' => 'Bebas Pefsangambilan',
                'delivery' => 'Gratifsafss',
                'price' => 'Rp, 350000000',
                'sold' => 1
            ]
        ];

        return view('pages.marketplace', compact('list'));
    }
}
