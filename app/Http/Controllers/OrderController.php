<?php

namespace App\Http\Controllers;

// use App\Models\Order;
// use App\Models\Orders;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Orders;
use App\Models\Order;

class OrderController extends Controller
{

    public function __construct()
    {
        //To make the website secure
        $this->middleware('auth');
    }

    public function index()
    {
        $Order = Orders::all();
        return view('orders.index')->with('Order', $Order);
        // return view('orders.index');
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required',
            'medicine_name' => 'required',
            // 'price' => 'required',
            'address' => 'required',
            'quantity' => 'required',
            'phone_number' => 'required',
        ]);

        $Order = Orders::create([
            'user_id' => auth()->id(),
            'medicine_name' => $request->medicine_name,
            'customer_name' => $request->customer_name,
            // 'medicine_name' => $request->medicine_name,
            'phone_number' => $request->phone_number,

            // 'price' => $request->price,
            'address' => $request->address,
            'quantity' => $request->quantity,
        ]);

        return redirect()->back();
    }


    public function show(Orders $order)
    {
        return view('orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'medicine_name' => 'required|string',
            'quantity' => 'required|numeric',
            'customer_name' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        $order = Orders::findOrFail($id);
        $order->update($validatedData);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();
        return redirect()->back();
    }
}
