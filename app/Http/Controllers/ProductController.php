<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static  $products,$product;

    public function addProduct(){
        return view('admin.product.add-product');

    }
    public function manageProduct(){
        self::$products=Product::all();
        return view('admin.product.manage-product',[
            'products'=>self::$products

        ]);

    }
    public function saveProduct(Request $request){

        Product::saveProduct($request);
        return back()->with('message', 'Info saved');

    }

    public function productDelete(Request $request){
        Product::deleteProduct($request->id);
        return back()->with('message', 'Info deleted');

    }
    public function productEdit($id){
        self::$product=Product::find($id);
        return view('admin.product.product-edit',[
            'product'=>self::$product
        ]);

    }
    public function productUpdate(Request $request){
        Product::productUpdate($request);
        return back()->with('message', 'Info updated');



    }
    public function productStatus($id){
        Product::productStatus($id);
        return back()->with('message', 'Info updated');



    }
}
