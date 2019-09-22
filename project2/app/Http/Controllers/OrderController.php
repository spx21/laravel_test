<?php


namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order');
    }

    public function getAll()
    {
        return response()->json([
            'orders' => Order::all(),
        ], 200);
    }

    public function create(Request $request)
    {
        //'id','Title', 'Description', 'Image','Category','SubCategory','Price','Quantity'
        //$Order = Order::create($request->all());
        $order = new Order;

        $order->ProductID = $request->input('ProductID');
        $order->Title = $request->input('Title');
        $order->Description = $request->input('Description');
        $order->Category = $request->input('Category');
        $order->SubCategory = $request->input('SubCategory');
        $order->Price = $request->input('Price');
        $order->Quantity = $request->input('Quantity');
        $order->QuantityPurchase = $request->input('QuantityPurchase');
        $order->TimePurchase = $request->input('TimePurchase');
        $order->save();

        return response()->json([
            'message' => 'Great success! New Order created',
            'Order' => $order
        ]);
    }

    public function show(Order $Order)
    {
        return $Order;
    }

    public function update(Request $request, Order $Order)
    {
       
        $Order->update($request->all());

        return response()->json([
            'message' => 'Great success! Order updated',
            'Order' => $Order
        ]);
    }

    public function destroy(Order $Order)
    {
        $Order->delete();

        return response()->json([
            'message' => 'Successfully deleted Order!'
        ]);
    }
}
