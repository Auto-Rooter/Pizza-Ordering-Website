<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{

    public function index()
    {
        return view('orders.index', ['orders' => Order::all()]);
    }


    public function create()
    {
        return view('orders.index', ['orders' => Order::all()]);
    }

    public function show($id)
    {
        $elements = Order::find($id)->products()->get();
        return view('orders.show', compact('elements'));
    }

    public function 

    // $product->save();

    // $category = Category::find([3, 4]);
    // $product->categories()->attach($category);
    //======================================================

    // Unnecessary complexity
    // $ups = User::find(Auth::user()->id)->products()->get();

    // // Should be the same
    // $ups = Auth::user()->products;
}
