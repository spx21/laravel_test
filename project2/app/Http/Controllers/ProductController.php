<?php


namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product');
    }

    public function getAll()
    {
        return response()->json([
            'products' => Product::all(),
        ], 200);
    }

    public function create(Request $request)
    {
        //'id','Title', 'Description', 'Image','Category','SubCategory','Price','Quantity'
        //$Product = Product::create($request->all());
        $product = new Product;
        $product->Title = $request->input('Title');
        $product->Description = $request->input('Description');
        $product->Image = $request->input('Image');
        $product->Category = $request->input('Category');
        $product->SubCategory = $request->input('SubCategory');
        $product->Price = $request->input('Price');
        $product->Quantity = $request->input('Quantity');
        $product->save();

        return response()->json([
            'message' => 'Great success! New Product created',
            'Product' => $product
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
