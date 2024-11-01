<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function product (Request $request) {
       $products=Product::latest()->paginate(3);
       return view('product',compact('products'));
   }

   public function add_product(Request $request) {
      $request->validate(
        [
            'name' => 'required|unique:products',
            'price' => 'required',

        ],[
            'name.required' => 'Name is required',
            'name.unique' => 'Name already exists',
            'price.required'=>'Price is required',
        ]
    );
  $product=new Product();
  $product->name=$request->name;
  $product->price=$request->price;
  $product->save();

  return response()->json([
       "status"=>"success",
  ]);

   }

}
