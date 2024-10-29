<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $User = User::where('type','user')->get();
        return view('home',compact('User'));
    }
    public function create_user(Request $request){
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => 'user',
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->with('success', "Create user success");
    }
    public function create_user_deleted(Request $request){
        $validate = $request->validate([
            'id' => ['required'],
        ]);
        $User = User::find($request->id);
        $User->delete();
        return redirect()->back()->with('success', "User deleted success");
    }
    public function region(){
        return view('region');
    }
    public function substance(){
        return view('substance');
    }
    public function search(){
        return view('search');
    }
    public function chart(){
        return view("chart");
    }
}
