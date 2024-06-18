<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    //

    public function show(Request $request) {
        $query = $request->input('query');

        $list = $query ? product::where('productName', 'like', '%'.$query.'%')->get() : product::all();
        return view('pages.marketplace.marketplace', compact('list'));
    }

    public function view() {
        return view('pages.marketplace.create');
    }

    public function store(Request $request) {
        $request->validate([
            'productName' => 'required|max:255|string',
            'productDescription' => 'required|max:3000|string',
            'productPrice' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'delivery' => 'sometimes',
            'pengambilan' => 'sometimes'
        ],
        [
            'productName.required' => 'The product name is required.',
            'productName.string' => 'The product name must be a string.',
            'productName.max' => 'The product name must not exceed 255 characters.',
            'productDescription.required' => 'The product description is required.',
            'productDescription.string' => 'The product description must be a string.',
            'productDescription.max' => 'The product description must not exceed 3000 characters.',
            'productPrice.required' => 'The product price is required.',
            'productPrice.numeric' => 'The product price must be a number.',
            'image.required' => 'Please upload an image.',
            'image.mimes' => 'Uploaded file must be an image (png, jpg, jpeg, webp).'
        ]
        );

        $filename = NULL;
        $path = NULL;

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $path = 'upload/products/';
            $file->move($path, $filename);
        }

        Product::create([
            'productName' => $request->productName,
            'productDescription' => $request->productDescription,
            'productPrice' => $request->productPrice,
            'image' => $path . $filename,
            'delivery' => $request->delivery == true ? 1 : 0,
            'pengambilan' => $request->pengambilan == true ? 1 : 0
        ]);

        return redirect('/marketplace')->with('status', 'Product Created');
    }
}
