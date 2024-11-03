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
// product add---------------------
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

// product update----------------
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



   // product delete----------------

   public function delete_product(Request $request) {
     Product::find($request->product_id)->delete();
     return response()->json([
        "status"=>"success",
   ]);

   }

 // product pagination----------------

 public function paginationData(Request $request) {
    $products=Product::latest()->paginate(3);
    return view('product_pagination',compact('products'))->render();

  }

// search product----------------

public function searchProduct(Request $request) {
    $products=Product::where('name','like','%'.$request->search_string.'%')
    ->orWhere('price','like','%'.$request->search_string.'%')
     ->orderBy('id','desc')
     ->paginate(3);

     if($products->count()>=1) {
        return view('product_pagination',compact('products'))->render();
     }else{
        return response()->json([
            "status"=>"Nothing Found",

        ]);
     }

}


}
