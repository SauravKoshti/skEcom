<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function index()
    {
        // if (Auth::check()) {
            $data1 = Product::latest()->take(5)->get();
            $data = Product::all()->take(10);
            $category = Category::all();
            $popularCategories = Category::latest()->take(10)->get();
            // $newArriaval = Product::all()->latest()-
            return view('user.index', compact('data','data1','category','popularCategories'));
        // }
        // return redirect("login")->withSuccess('You are not allowed to access');
        // $data = Product::all();

    }


    public function search(Request $request)
    {
        $searchData = Product::where('name' , 'like' , '%' . $request->input('search') . '%')
        ->with('category')->paginate(10);
        return view('user.search', compact('searchData'));
    }
}
