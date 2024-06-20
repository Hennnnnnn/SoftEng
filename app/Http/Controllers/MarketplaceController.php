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
    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required|max:255|string',
            'productDescription' => 'required|max:3000|string',
            'productPrice' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'delivery' => 'sometimes',
            'pengambilan' => 'sometimes'
        ]);

        $filename = null;
        $path = null;

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'upload/products/';
            $file->move($path, $filename);
        }

        Product::create([
            'productName' => $request->productName,
            'productDescription' => $request->productDescription,
            'productPrice' => $request->productPrice,
            'image' => $path . $filename,
            'delivery' => $request->has('delivery') ? 1 : 0,
            'pengambilan' => $request->has('pengambilan') ? 1 : 0,
            'user_id' => auth()->id(), // Assign the current user's id
        ]);

        return redirect('/marketplace')->with('status', 'Product Created');
    }
}
