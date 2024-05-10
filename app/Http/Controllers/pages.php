<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class pages extends Controller
{
    
    // public function userpage(){
       
    //     return view('home.userpage');
    // }

    // public function adminpage(){
    //     return view('');
    // }

    public function redirect() {

        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            return view('adminpage.home');
        }
       
        else{
            
            $product=Product::paginate('9');

        return view('home.userpage',compact('product'));
          
         
        }
    }

    public function homepage(){

        $product=Product::paginate('9');

        return view('home.userpage',compact('product'));
    }

    public function product_details($id){

        $product=Product::find($id);
         
        return view('home.product_details',compact('product'));
    }

    public function view_all_products(){

        $product=Product::all();
        return view('home.view_all_products',compact('product'));
    }

    public function add_to_cart(Request $request,$id){

        if(Auth::id()){

            $product=Product::find($id);
            $user=Auth::user();
            $cart= new Cart;

            $cart->quantity=$request->quantity;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->user_id=$user->id;
            $cart->phone=$user->phone;
            $cart->product_id=$product->id;
            $cart->product_title=$product->title;
            $cart->image=$product->image;
            
            $cart->price=$product->discount_price * $request->quantity;

            // find the remaining quantity
            $quantityBfr=$product->quantity;
            $quantitynow=$request->quantity;
            $remainigquantiy=$quantityBfr-$quantitynow;

            $product->quantity=$remainigquantiy;

            $cart->save();
            $product->save();
            return redirect()->back();
        }
        else{

            return redirect('login');
        }

    }
}
