<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use DB;
use Artisan;

class ProductsController extends Controller
{
   public function index(){
       $products = Product::all();
       return view('products', compact('products'));
   }

   public function cart(){
       $this->update_currency_rate();
       return view('cart');
   }

   
   public function checkout(){
    session()->put('totalp', $this->getCartTotal());
    //dd($this->getCartTotal());
    return view('checkout');
    }

    public function update_currency_rate(){
        // First of all we need to add currencies to the table only for the first time by excuting the command: php artisan currency:manage add usd,eur
        if(DB::select('select updated_at from currencies where name= "Euro"')){
            $lastUpdateTimeForEuro = strtotime(explode(" ", DB::select('select updated_at from currencies where name= "Euro"')[0]->updated_at)[1]); // strtotime parses the time if it is not a timestamp, if it already is just use as is, i.e. without strtotime()
            $currentTime = strtotime("now");
            $diffTime = abs($currentTime - $lastUpdateTimeForEuro); 
    
            // I am using OPEN EXCHANGE RATE API (the free account ) so i update the table every 2 hours (deppend on the customer request)
            if($diffTime >=  2 * 60 * 60){ 
                Artisan::call("currency:update -o");
               // dd(Artisan::output());
            } 
        }

    }

    public function confirm(Request $request){

        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'payment' => 'required',
            'phonenumber' => 'required',
            'email' => 'required'
        ]);


        $order = new Order;

        $order->name = $request->firstName." ".$request->lastName;
        $order->address = $request->address;
        $order->total = $this->getCartTotal();
        $order->email = $request->email;
        $order->payment = $request->payment;
        $order->phone = $request->phonenumber;

        $order->save();

        $product = Product::find(array_keys(session()->get('cart')));
        foreach ($product as $prod)  {
            $order->products()->attach($prod->id, ['quantity' => session()->get('cart')[$prod->id]['quantity']]);
        };

        session()->flush();
        session()->put('order_sent', "Your order on it`s way to you ....");
        return redirect('/');

    }

   public function update(Request $request){
    if($request->id ){
            $cart = session()->get('cart');
            $subTotal = 0 ;
            if( $request->quantity <= 0){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }else{
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                $subTotal = $cart[$request->id]["quantity"] * $cart[$request->id]['price'];
            }
            

            $total = $this->getCartTotal();
            $qnt = 0;
            foreach ($cart as $el)  {
                $qnt +=$el['quantity'];
            };
            session()->put('qnt', $qnt);
            $htmlCart = view('cartView')->render();
            return response()->json(['msg' => 'Cart updated successfully',
                                                     'data' => $htmlCart,
                                                      'total' => $total,
                                                      'total_EU' => currency($total, 'USD', 'EUR'),
                                                       'subTotal' => $subTotal,
                                                       'subTotal_EU' => currency($subTotal, 'USD', 'EUR'),
                                                        'qnt'=> $qnt]);

            //session()->flash('success', 'Cart updated successfully...');

   }}



   public function remove(Request $request){
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                $qnt = 0;
                foreach ($cart as $el)  {
                    $qnt +=$el['quantity'];
                };
                session()->put('qnt', $qnt);
            }
            
            $total = $this->getCartTotal();

            $htmlCart = view('cartView')->render();
            

            return response()->json(['msg' => 'Product removed successfully',
                                     'data' => $htmlCart, 'total' => $total,'total_EU' => currency($total, 'USD', 'EUR'), 'qnt'=> $qnt]);

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


   public function addToCart(Request $request){

        session()->forget('order_sent');
        
       //store the cart item using laravel session.
       if($request->id){
        $id = $request->id;
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
            $qnt = 0;
            foreach ($cart as $el)  {
                $qnt +=$el['quantity'];
            };
            session()->put('qnt', $qnt);

            $htmlCart = view('cartView')->render();

            return response()->json(['msg' => 'Product added successfully...', 'data'=> $htmlCart, 'qnt'=> $qnt]);
            //return redirect()->back->with('success', 'Product added successfully...');
       }
       
       // if the cart not empty add the new product (if the product already in the cart)
       if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            $qnt = 0;
            foreach ($cart as $el)  {
                $qnt +=$el['quantity'];
            };
            session()->put('qnt', $qnt);
            //return redirect()->back()->with('success', 'Product added successfully...');
            $htmlCart = view('cartView')->render();

            return response()->json(['msg' => 'Product added successfully...', 'data'=> $htmlCart, 'qnt'=> $qnt]);
          
        }

       // if the item not in the cart but the cart not empty
       $cart[$id] = [
        "name" => $product->name,
        "quantity" => 1,
        "price" => $product->price,
        "photo" => $product->photo
       ];

       session()->put('cart', $cart);
       $qnt = 0;
       foreach ($cart as $el)  {
           $qnt +=$el['quantity'];
       };
       session()->put('qnt', $qnt);
       $htmlCart = view('cartView')->render();

       return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart, 'qnt'=> $qnt]);
    }
       //return redirect()->back()->with('success', 'Product added successfully...');
   }
   public function edit($id){
    return view('products.edit', ['product' => Product::find($id)]);
}
}

// php artisan make:migration create_order_product_table --create=order_product
