<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product');
    }

    public function create(Request $request)
    {
    
        $Product = Product::create($request->all());

        return response()->json([
            'message' => 'Great success! New Product created',
            'Product' => $Product
        ]);
    }

    public function show(Product $Product)
    {
        return $Product;
    }

    public function update(Request $request, Product $Product)
    {
       
        $Product->update($request->all());

        return response()->json([
            'message' => 'Great success! Product updated',
            'Product' => $Product
        ]);
    }

    public function destroy(Product $Product)
    {
        $Product->delete();

        return response()->json([
            'message' => 'Successfully deleted Product!'
        ]);
    }
}
