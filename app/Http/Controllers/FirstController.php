<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index(){
        $items=Item::all();
        return view('frontend.index', compact('items'));
    }
    public function productdetail(){
        return view('frontend.product-detail');
    }
    public function filter($id){
        $category= Category::find($id);
        return view('frontend.filteritem', compact('category'));
    }
}
