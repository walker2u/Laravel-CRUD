<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        return view('welcome');
    }
    function viewProduct()
    {
        return view('product.index', ['products' => Product::latest()->paginate(3)]);
    }
    function createProduct()
    {
        return view('product.createProduct');
    }
    function saveProduct(Request $req)
    {

        //validate data
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,gif | max:10000'
        ]);

        //upload image
        $image = time() . '.' . $req->image->extension();
        $req->image->move(public_path('products'), $image);
        $product = new Product;
        $product->image = $image;
        $product->name = $req->name;
        $product->description = $req->description;
        $product->save();
        return back()->withSuccess('Prodcut Created Successfully!!');
    }
    function editProduct($id)
    {
        $product = Product::where('id', $id)->first();
        return view('product/editProduct', ['product' => $product]);
    }
    function deleteProduct($id)
    {
        $product = Product::where('id', $id)->delete();
        return redirect(route('product'));
    }
    function updateProduct($id, Request $req)
    {
        //validate data
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable | mimes:jpeg,jpg,png,gif | max:10000'
        ]);
        $product = Product::where('id',$id)->first();
        //upload image
        if (isset($req->image)) {
            $image = time() . '.' . $req->image->extension();
            $req->image->move(public_path('products'), $image);
            $product->image = $image;
        }
        $product->name = $req->name;
        $product->description = $req->description;
        $product->save();
        return back()->withSuccess('Prodcut Upated Successfully!!');
    }
}