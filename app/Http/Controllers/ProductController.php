<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use function Termwind\render;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::latest() -> paginate(5);
        return view('product',compact('products'));
    }
    //add product
    public function addProduct(Request $request){
        $request->validate(
            [
                'name'=>'required|unique:products',
                'price' => 'required',
            ],

            [
                'name.required' => 'Name is Required',
                'name.unique' => 'Product Already Exists',
                'price.required' => 'Price is Required',
            ]
        );
    
        $product = new Product();
        $product -> name = $request->name;
        $product -> price = $request ->price;
        $product->save();

        return response()->json([
            'status'=>'success',
        ]);
    }

    //update product
    public function updateProduct(Request $request){
        $request->validate(
            [
                'up_name'=>'required|unique:products,name,'.$request->up_id,
                'up_price' => 'required',
            ],

            [
                'up_name.required' => 'Name is Required',
                'up_price.unique' => 'Product Already Exists',
                'up_price.required' => 'Price is Required',
            ]
        );
    
        Product::where('id',$request->up_id)->update([
            'name' => $request -> up_name,
            'price' => $request -> up_price,
        ]);

        return response()->json([
            'status'=>'success',
        ]);
    }

    public function deleteProduct(Request $request){
        Product::find($request->product_id)->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }

    public function pagination(Request $request){
        $products = Product::latest()->paginate(5);
        return view('pagination_products',compact('products'))->render();
    }

    //search product
    public function searchProduct(Request $request){
        $products = Product::where('name' , 'like' , '%' .$request->search_string.'%')
        ->orWhere('price' , 'like' , '%' .$request->search_string.'%')
        ->orderBy('id' ,'desc')
        ->paginate(5);

        if($products->count() >= 1){
            return view('pagination_products',compact('products'))->render();
        }
        else{
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }
}