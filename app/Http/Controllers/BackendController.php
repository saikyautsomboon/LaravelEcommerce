<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashboard(){
        return view('backend.dashboardpage');
    }

}
