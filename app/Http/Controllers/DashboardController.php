<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('products.index', ['products' => Product::all()]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
            //dd($request);
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        $product = new Product;
        $product_image = $request->image;
        $product_image_new_name = time().$product_image->getClientOriginalName();
        $product_image->move('uploads/products', $product_image_new_name);
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->photo = 'uploads/products/' . $product_image_new_name;

        $product->save();

        Session::flash('success', 'Pizza added Successfully...');

        return redirect()->route('dashboard.index');
    }

    // show the form for editing the pizza info
    public function edit($id){
        return view('products.edit', ['product' => Product::find($id)]);
    }

    //update the info of the pizza
    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);

        if($request->hasFile('image')){

            $product_image = $request->image;

            $product_image_new_name = time() . $product_image->getClientOriginalName();

            $product_image->move('uploads/products', $product_image_new_name);

            $product->photo = 'uploads/products/' . $product_image_new_name;

            $product->save();
        }

        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        

        $product->save();

        Session::flash('success', 'Product updated.');

        return redirect()->route('dashboard.index');
    }

    public function destroy($id){

        $product = Product::find($id);

        if(file_exists($product->photo)){
            unlink($product->photo);
        }

        $product->delete();

        Session::flash('success', 'Product deleted.');

        return redirect()->back();
    }

}