<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \App\User;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.index',compact('user'));
    }
    public function update(Request $request){

        $this->validate($request,[
            'password' => 'confirmed',
        ]);
      
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;

        // validasi jiika password kosong tidak kosong
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
       $user->update();
       return redirect()->back();

        
    }
}
