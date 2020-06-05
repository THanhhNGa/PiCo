<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product,Category,Attribute};
class ProductController extends Controller
{
    public function ListProduct(){
        echo 'Đây là danh sách sản phẩm';
    }
    public function DetailProduct($id){
        $product=Product::find($id);
        // dd($product);
        $data['category']=category::all();
        return view('frontend.product_detail',compact('product'));
    }
    

}
