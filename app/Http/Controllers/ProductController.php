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


   public function update_product(Request $request) {
    $request->validate(
        [
            'up_name' => 'required|unique:products,name,'.$request->up_id,
            'up_price' => 'required',

        ],[
            'up_name.required' => 'Name is required',
            'up_name.unique' => 'Name already exists',
            'up_price.required'=>'Price is required',
        ]
    );
    Product::where('id',$request->up_id)->update([
       'name'=>$request->up_name,
       'price'=>$request->up_price
    ]);
  return response()->json([
       "status"=>"success",
  ]);

   }

}
