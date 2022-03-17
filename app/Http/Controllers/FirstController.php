<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index(){
        $items=Item::all();
        return view('frontend.index', compact('items'));
    }

}
