<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
            $total_product=Product::all()->count();
            $total_user=User::all()->count();
            $total_order=Order::all()->count();

            $total_delivered=Order::where("delivery_status","=","delivered")->get()->count();
            $total_processing=Order::where("delivery_status","=","processing")->get()->count();
            return view('adminpage.home',compact('total_product','total_user','total_order','total_delivered','total_processing'));

            
        }
       
        else{
            
            $product=Product::paginate('9');
            //
            $cookie=Cookie::get('recommended');
            $product=Product::all();
            $recommendedproduct=$product->where('category',$cookie);

        //

        return view('home.userpage',compact('product','recommendedproduct'));
          
         
        }
    }

    public function homepage(){

        $product=Product::paginate('9');
        // 
        $cookie=Cookie::get('recommended');
        $product=Product::all();
        $recommendedproduct=$product->where('category',$cookie);
        //
        return view('home.userpage',compact('product','recommendedproduct'));
        
    }

    public function product_details($id){

        $product=Product::find($id);
        $cookie=cookie('recommended',$product->category,5000);
        return response(view('home.product_details',compact('product')))->cookie($cookie);
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
            
            // Start cookies here 
            $cookie=cookie('recommended',$product->category,5000);
            return redirect()->back()->cookie($cookie);
        }
        else{

            return redirect('login');
        }

    }

    public function recommended(){

    $cookie=Cookie::get('recommended');
    $product=Product::where('category',$cookie);

    }

    public function showcart(){

        $id=Auth::user()->id;

        $cart=Cart::where('user_id',$id)->get();

        return view('home.showcart',compact('cart'));
    }

    public function delete_cart($id){
        $cart=Cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;

        $data=Cart::where('user_id','=',$userid)->get();

        foreach($data as $data){
            $order=new Order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);

            $cart->delete();
        }

        return redirect()->back()->with('message','we recived your order .We will connect with you soon...');
    }
}
