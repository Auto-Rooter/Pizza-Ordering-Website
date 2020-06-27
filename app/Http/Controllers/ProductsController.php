<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
   public function index(){
       $products = Product::all();
       return view('products', compact('products'));
   }

   public function cart(){
       return view('cart');
   }

   public function update(Request $request){
        if($request->id and $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $$request->quantity;
            session()->put('cart', $cart);
            $subTotal = $cart[$request->id]["quantity"] * $cart[$request->id]['price'];
            $total = $this->getCartTotal();
            $htmlCart = view('_header_cart')->render();
            return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully...');
        }
   }

   public function remove(Request $request){
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            
            $total = $this->getCartTotal();

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Product removed successfully', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'product removed from the cart');
        }
   }

   private function getCartTotal(){
       $total = 0;
       $cart = session()->get('cart');
       foreach($cart as $id => $details){
            $total += $details['price'] * $details['quantity'];
       }
       return number_format($total, 2);
   }


   public function addToCart($id){
       //store the cart item using laravel session.

       $product = Product::find($id);
       if(!$product){
            abort(404);
       }

       $cart = session()->get('cart');
       // if the cart is empty then put the product as first item in the cart
       if(!$cart){
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];

            session()->put('cart', $cart);
            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Product added successfully...', 'data'=> $htmlCart]);
            //return redirect()->back->with('success', 'Product added successfully...');
       }
       
       // if the cart not empty add the new product (if the product already in the cart)
       if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            //return redirect()->back()->with('success', 'Product added successfully...');
            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Product added successfully...', 'data'=> $htmlCart]);
          
        }

       // if the item not in the cart but the cart not empty
       $cart[$id] = [
        "name" => $product->name,
        "quantity" => 1,
        "price" => $product->price,
        "photo" => $product->photo
       ];

       session()->put('cart', $cart);

       $htmlCart = view('_header_cart')->render();

       return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

       //return redirect()->back()->with('success', 'Product added successfully...');
   }
}
