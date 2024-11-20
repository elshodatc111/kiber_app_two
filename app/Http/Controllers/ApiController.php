<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Search;
use App\Models\Region;
use App\Models\Child;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status' => 200,
                'name' => $user->name,
                'number' => $user->email,
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login yoki parol noto\'g\'ri'
            ], 401);
        }
    }

    public function search(){
        $Search = Search::join('regions','regions.id','=','searches.region_id')->where('type','!=','3')
        ->Select('searches.id','searches.fio','searches.adress','searches.photo','searches.birthday','searches.substance','searches.qyj','searches.type','regions.name')->get();
        return response()->json([
            'search' => $Search
        ], 200);
    }

    public function search_show($id){
        $Search = Search::join('regions','regions.id','=','searches.region_id')
            ->Select('searches.id','searches.fio','searches.adress','searches.photo','searches.birthday','searches.substance','searches.qyj','searches.type','regions.name')->where('searches.id',$id)->first();
        return response()->json([
            'search' => $Search
        ], 200);
    }

    
    public function child(){
        $Child = Child::join('regions','regions.id','=','children.region_id')
            ->Select('children.id','children.fio','children.photo','children.birthday','children.about','regions.name')->get();
        return response()->json([
            'child' => $Child
        ], 200);
    }

    public function child_show($id){
        $Child = Child::find($id);
        $Region = Region::find($Child->region_id)->name;
        return response()->json([
            'id'=>$Child->id,
            'fio'=>$Child->fio,
            'photo'=>$Child->photo,
            'birthday'=>$Child->birthday,
            'about'=>$Child->birthday,
            'created_at'=>$Child->birthday,
            'updated_at'=>$Child->birthday,
            'region'=>$Region,
        ], 200);
    }

    public function search_post(Request $request){
        Message::create([
            'search_id'=>$request->search_id,
            'user_id'=>$request->user_id,
            'text'=>$request->text,
            'phone'=>$request->phone,
        ]);
        return response()->json([
            'status'=>'success'
        ], 200);
    }
}
