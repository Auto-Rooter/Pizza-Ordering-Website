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
        
        $elements = [];
        $items = Order::find($id)->products()->get();

        if($items->count() >0){
            $timestampFromCreatedAt = Order::find($id)->created_at;
            $pivot_items = Order::find($id)->products->find(1)->pivot->get();

            $items->map(function ($element) use ($id,$pivot_items) {

                foreach($pivot_items  as $pivot_one){
                    if($pivot_one->product_id == $element->id){
                        $element['quantity'] = Order::find($id)->products->find($element->id)->pivot->find($pivot_one->id)->quantity;
                    }
                };
                return $element;
            });
        
            $count = 0;
            foreach($items as $i){
                $count += $i['quantity'];
            }

            $elements = [
                'items' => $items,
                'count' =>  $count,
                'username' => Order::find($id)->name,
                'date' => $timestampFromCreatedAt->toDateString()." , ".$timestampFromCreatedAt->toTimeString(),
                'payment' => Order::find($id)->payment
            ];
        }

        return view('orders.show', compact('elements'));
    }

}

