<?php

namespace App\Http\Controllers;

use App\Models\Product; // Ensure correct case for models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketplaceController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
        $list = $query ? Product::where('productName', 'like', '%' . $query . '%')->get() : Product::all();
        return view('pages.marketplace.marketplace', compact('list', 'query')); // Pass $query to the view
    }

    public function view()
    {
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

        if ($request->hasFile('image')) { // Check for file existence using hasFile
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'upload/products/';
            $file->move($path, $filename);
        }

        $product = Product::create([
            'productName' => $request->productName,
            'productDescription' => $request->productDescription,
            'productPrice' => $request->productPrice,
            'image' => $path . $filename,
            'delivery' => $request->has('delivery') ? 1 : 0,
            'pengambilan' => $request->has('pengambilan') ? 1 : 0,
            'user_id' => auth()->id(), // Assign the current user's id
        ]);

        if ($product) {
            return redirect('/marketplace')->with('status', 'Product Created');
        } else {
            return back()->withErrors('Failed to create product');
        }
    }
}
