<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Search;
use App\Models\Region;
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
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login yoki parol noto\'g\'ri'
            ], 401);
        }
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Foydalanuvchi muvaffaqiyatli chiqib ketdi'
        ], 200);
    }

    public function search(){
        //$Search = Search::join('regions','regions.id','=','searches.region_id')->Select('searches.id','searches.fio','searches.adress','searches.photo','searches.birthday','searches.substance','searches.qyj','searches.type','regions.name')->where('searches.id',$id)->first();
        $Search = Search::join('regions','regions.id','=','searches.region_id')
            ->Select('searches.id','searches.fio','searches.adress','searches.photo','searches.birthday','searches.substance','searches.qyj','searches.type','regions.name')->get();
        
        return response()->json([
            'search' => $Search
        ], 200);
    }
    public function search_show($id){
        //$Search = Search::join('regions','regions.id','=','searches.region_id')->Select('searches.id','searches.fio','searches.adress','searches.photo','searches.birthday','searches.substance','searches.qyj','searches.type','regions.name')->where('searches.id',$id)->first();
        $Search = Search::join('regions','regions.id','=','searches.region_id')
            ->Select('searches.id','searches.fio','searches.adress','searches.photo','searches.birthday','searches.substance','searches.qyj','searches.type','regions.name')->where('searches.id',$id)->first();
        
        return response()->json([
            'search' => $Search
        ], 200);
    }
    public function charts(){
        $Region = Region::get();
        $coato = array();
        $count_rasmiy = 0;
        $count_pedding = 0;
        foreach ($Region as $key => $value) {
            $rasmiy = 0;
            $pedding = 0;
            $Search = Search::where('region_id',$value['id'])->get();
            foreach ($Search as $key2 => $value1) {
                if($value1['type']==1){
                    $rasmiy = $rasmiy + 1;
                    $count_rasmiy = $count_rasmiy + 1;
                }else{
                    $pedding = $pedding+1;
                    $count_pedding = $count_pedding + 1;
                }
            }
            $coato[$key]['name'] = $value['name'];
            $coato[$key]['rasmiy'] = $rasmiy;
            $coato[$key]['pedding'] = $pedding;
        }
        return response()->json([
            'search' => $coato,
            'count_rasmiy' => $count_rasmiy,
            'count_pedding' => $count_pedding,
        ], 200);
    }
}
