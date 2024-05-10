<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class productsApiController extends Controller
{
    //

    public function takeproducts(){

        $products=Product::all();

        $data=[
            'status'=>200,
            'products'=>$products
        ];

        return response()->json($data);
    }

    public function putperson(Request $request){

        $validator =validator::make($request->all(),[
            'name'=>'required|string|max:191',
            'age'=>'required |string|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);

        }else{
            $students=Student::create([
                'name'=>$request->name,
                'age'=>$request->age,
            ]);
            if($students){
                return response()->json([
                    'status'=>200,
                    'message'=>'students created successfully'
                ],200);
            }else{
                return response()->json([
                    'status'=>500,
                    'message'=>'something went wrong ',
                ],500);
            }
        }
    }
}
