<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Search;
use App\Models\Child;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;

class ChildController extends Controller
{
    public function child(){
        $Region = Region::get();
        $Child = Child::join('regions','regions.id','=','children.region_id')->Select('children.fio','children.id','children.photo','children.birthday','children.about','regions.name')->get();
        return view('child',compact('Region','Child'));
    }
    public function child_create(Request $request){
        $request->validate([
            'photo' => 'required|mimes:jpg',
            'region_id' => 'required',
            'fio' => 'required',
            'birthday' => 'required',
            'about' => 'required',
        ]);
        $imageName = "child_".$request->number." ".time().'.'.$request->photo->extension();
        $request->photo->move(public_path('photo'), $imageName);
        Child::create([
            'photo' => $imageName,
            'region_id' => $request->region_id,
            'fio' => $request->fio,
            'birthday' => $request->birthday,
            'about' => $request->about,
        ]);
        return redirect()->back()->with('success', "Create new children success");
    }
    public function child_delete(Request $request){
        $request->validate([
            'id' => 'required',
        ]);
        $Search = Child::find($request->id);
        $Search->delete();
        return redirect()->back()->with('success', "Deleted success");
    }
}
