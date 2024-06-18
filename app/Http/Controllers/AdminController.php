<?php

namespace App\Http\Controllers;

use App\Mail\ThanksEmail;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    public function showcategory(){
        
        $table= Category::all();
        

        return view('adminpage.category',compact('table'));
    }
    public function add_category(Request $request){
    $category=new Category;

    $category->category_name=$request->name;

    $category->save();

    return redirect()->back()->with('message','Added category added Suceesfully');
    }

    public function delete_category($id){

        $data=Category::find($id);

        $data->delete();

        return redirect()->back();

    }

    // product functions 
    public function add_products(){

        $category=Category::all();

        
        return view('adminpage.add_product',compact('category'));
    }

    public function add_productintable(Request $request){

        $product=new Product;

        $product->title=$request->title;
        $product->description=$request->description;
     
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imagename);

        $product->image=$imagename;
        $product->save();
        Alert::success('Successfully', "Registered $product->title" );

        // return redirect()->back()->with('message','product added Successfully');
        return redirect()->back();

    }

    public function show_products(){
        $products=Product::all();

        return view('adminpage.show_product',compact('products'));
    }

   

    public function delete_product($id){

        $product=Product::find($id);
        // $title = 'Delete User!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        $product->delete();
        
        return redirect()->back();
    }

    public function update_product($id){

        $product=Product::find($id);
        $category=Category::all();


        return view('adminpage.update_page',compact('product','category'));
    }

    public function posted_updated_products(Request $request,$id){

        $product=Product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
     
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;

        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $product->image=$imagename;
        }
       
        $product->save();
        Alert::success('Success', "product updated Successfully" );
        // return redirect()->back()->with('message','product updated Successfully');
        return redirect()->back();
    }

    public function order(){
        $order=Order::all();

        return view('adminpage.order',compact('order'));
    }

    public function delivered($id){
        $order=Order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status='paid'; 
        $order->save();

        $toEmail=$order->email;
        $message="Thank you for Shopping with Us. You delivered  $order->product_title ";
        $subject=" Product delivered successfully ! ";
        

        Mail::to($toEmail)->send(new ThanksEmail($message,$subject));
        Alert::success('Successfully', "Product delivered successfully" );

        return redirect()->back();
    }

    // public function send_email($id){

    //     $order= order::find($id);
    //     return view('adminpage.email_info',compact('order'));

       
    // }

    // this function is unused reseverd for future reference 
    public function send($id){
        $order= order::find($id);

        $toEmail='emmanuelmeltrides@gmail.com';
        $message="Thank you for Shopping with Us $order->product_title  ";
        $subject=" all is well guys ";
        

        Mail::to($toEmail)->send(new ThanksEmail($message,$subject));
    }
    
    public function sentMessages(){
        $sms=Contact::all();

        return view('adminpage.recievedmessages',compact('sms'));
    }

    public function smsdelivered($id){
        $order=Contact::find($id);
        $order->delivery_status="delivered";
        
        $order->save();

        $toEmail=$order->email;
        $message="Thank you for contacting  Us. How can we help you? you can contact us through our mobile 0769002235 ";
        $subject=" Hellow there ! ";
        

        Mail::to($toEmail)->send(new ThanksEmail($message,$subject));
        Alert::success('Successfully', "Product delivered successfully" );

        Alert::success('Success', "sms delivered successfully" );
        return redirect()->back();
}
}