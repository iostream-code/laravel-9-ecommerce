<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

use App\Models\Product;

class ProductController extends Controller
{
    public function createProduct()
    {
        return view('product_create');
    }

    public function storeProduct(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $file = $req->file('image');
        $path = time() . '_' . $req->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Product::create([
            'name' => $req->name,
            'price' => $req->price,
            'stock' => $req->stock,
            'description' => $req->description,
            'image' => $path,
        ]);

        return Redirect::route('products');
    }

    public function showProducts()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    public function detailProduct(Product $product)
    {
        return view('product_detail', compact('product'));
    }

    public function editProduct(Product $product)
    {
        return view('product_edit', compact('product'));
    }
}
