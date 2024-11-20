<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Region;
use App\Models\Substance;
use App\Models\Search;
use App\Models\Message;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        if(auth()->user()->type!='admin'){
            Auth::logout();
        }
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
        $Region = Region::get();
        return view('region',compact('Region'));
    }
    public function region_create(Request $request){
        $validate = $request->validate([
            'coato' => ['required'],
            'name' => ['required'],
        ]);
        Region::create([
            'coato'=>$request->coato,
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('success', "Create region success");
    }
    public function region_deleted(Request $request){
        $Region = Region::find($request->id);
        $Region->delete();  
        $Search = Search::where('region_id',$request->id)->get();
        foreach($Search as $item){
            $item->delete();
        }
        return redirect()->back()->with('success', "Delete region success");
    }
    public function substance(){
        $Substance = Substance::get();
        return view('substance',compact('Substance'));
    }
    public function substance_create(Request $request){
        $validate = $request->validate([
            'substance' => ['required'],
        ]);
        Substance::create([
            'substance' => $request->substance,
        ]);
        return redirect()->back()->with('success', "Create substance success");
    }
    public function substance_delete(Request $request){
        $validate = $request->validate([
            'id' => ['required'],
        ]);
        $Substance = Substance::find($request->id);
        $Substance->delete();
        return redirect()->back()->with('success', "Delete substance success");
    }
    public function search(){
        $Substance = Substance::get();
        $Region = Region::get();
        $Search = Search::join('regions','regions.id','=','searches.region_id')->where('searches.type','!=','3')->Select('searches.fio','searches.id','searches.type','searches.substance','regions.name')->get();
        return view('search',compact('Substance','Region','Search'));
    }
    public function search_create(Request $request){
        $request->validate([
            'photo' => 'required|mimes:jpg',
            'region_id' => 'required',
            'fio' => 'required',
            'adress' => 'required',
            'birthday' => 'required',
            'substance' => 'required',
            'qyj' => 'required',
            'type' => 'required',
        ]);
        $imageName = "user_".$request->number." ".time().'.'.$request->photo->extension();
        $request->photo->move(public_path('photo'), $imageName);
        Search::create([
            'photo' => $imageName,
            'region_id' => $request->region_id,
            'fio' => $request->fio,
            'adress' => $request->adress,
            'birthday' => $request->birthday,
            'substance' => $request->substance,
            'qyj' => $request->qyj,
            'type' => $request->type,
        ]);
        return redirect()->back()->with('success', "Create new search success");
    }
    public function search_show($id){
        $Substance = Substance::get();
        $Region = Region::get();
        $Message = Message::where('messages.search_id',$id)->join('users','messages.user_id','=','users.id')->get();
        //dd($Message);
        $Search = Search::join('regions','regions.id','=','searches.region_id')->Select('searches.fio','searches.qyj','searches.birthday','searches.photo','searches.adress','searches.id','searches.type','searches.substance','regions.name')->where('searches.id',$id)->first();
        return view('search_show',compact('Substance','Region','Search','Message'));
    }
    public function message(){
        $Message = Message::join('users','messages.user_id','=','users.id')->join('searches','messages.search_id','=','searches.id')->orderBy('messages.created_at', 'desc')->get();
        //dd($Message);
        return view('message',compact('Message'));
    }
    public function search_update(Request $request){
        $request->validate([
            'id' => 'required',
            'region_id' => 'required',
            'fio' => 'required',
            'adress' => 'required',
            'birthday' => 'required',
            'substance' => 'required',
            'qyj' => 'required',
            'type' => 'required',
        ]);
        $Search = Search::find($request->id);
        $Search->region_id = $request->region_id;
        $Search->fio = $request->fio;
        $Search->adress = $request->adress;
        $Search->birthday = $request->birthday;
        $Search->substance = $request->substance;
        $Search->qyj = $request->qyj;
        $Search->type = $request->type;
        $Search->save();
        return redirect()->back()->with('success', "Update search success");
    }
    public function search_update_image(Request $request){
        $request->validate([
            'photo' => 'required|mimes:jpg',
            'id' => 'required',
        ]);
        $imageName = "user_".$request->number." ".time().'.'.$request->photo->extension();
        $request->photo->move(public_path('photo'), $imageName);
        $Search = Search::find($request->id);
        $Search->photo = $imageName;
        $Search->save();
        return redirect()->back()->with('success', "Update search image success");
    }
    public function search_delete(Request $request){
        $request->validate([
            'id' => 'required',
        ]);
        $Search = Search::find($request->id);
        $Search->delete();
        return redirect()->route('search')->with('success', "Deleted success");
    }
    public function chart(){
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
        return view("chart",compact('coato','count_rasmiy','count_pedding'));
    }
}
