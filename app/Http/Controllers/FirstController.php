<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class FirstController extends Controller
{
    public function index(){

        return view('frontend.index');
    }
    public function productdetail(){
        return view('frontend.product-detail');
    }
    public function filter($id){
        $category= Category::find($id);
        return view('frontend.filteritem', compact('category'));
    }
    public function shoppingcart(){
        return view('frontend.shoppingcart');
    }
    public function orderhistory(){
        $orders=Order::where('user_id',Auth::id())->orderby('id','desc')->get();
        return view('frontend.orderhistory',compact('orders'))->with('i');
    }
}
