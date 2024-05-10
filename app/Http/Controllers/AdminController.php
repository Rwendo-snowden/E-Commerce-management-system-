<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

        return redirect()->back()->with('message','product added Successfully');

    }

    public function show_products(){
        $products=Product::all();

        return view('adminpage.show_product',compact('products'));
    }

   

    public function delete_product($id){

        $product=Product::find($id);
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

        return redirect()->back()->with('message','product updated Successfully');
    }
}
