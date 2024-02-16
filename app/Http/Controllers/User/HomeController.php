<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index()
    {
        // $data = Product::all();
        $data1 = Product::latest()->take(5)->get();
        $data = Product::all()->take(5);
        return view('user.index', ['data' => $data,'data1' => $data1]);
    }
}
