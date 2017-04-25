<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::orderBy('created_at','desc')->get();
        return view('form',compact('products'));
    }

    public function submitForm(Request $request){
        $product=new Product();
        $product->product_name=$request->product_name;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->total=$request->total;
        if($product->save()){
            $message="Product Saved";
            return redirect('/')->with(compact('message'));
        }else{
            $err_message="Unable to Save product. Please check DB connection";
            return redirect('/')->with(compact('err_message'));
        }
    }
}
