<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    //
    public function login(Request $request)
    {
        return view('user.login');
    }

    public function loginUser(Request $request)
    {
        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return redirect('/login')
                    ->withSuccess('UserName and password not matched');
        } else {
            $request->session()->put('user',$user);
            return redirect('/');
        //         ->withSuccess('You have Successfully loggedin');
        }
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required|min:6',
        // ]);
        // $credentials = $request->only('email', 'password');
        // // dd($credentials);
        // if (Auth::attempt($credentials)) {
        //     // $request->session()->put('user')
        //     return redirect()->intended('/')
        //         ->withSuccess('You have Successfully loggedin');
        // }

        // return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function register(Request $request)
    {
        return view('user.register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        // dd($check);
        return redirect("login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_confirmed' => 0
        ]);
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }


}
