<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $pesanans = \App\Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('history.index',compact('pesanans'));
    }
    public function details($id){
        $pesanan = \App\Pesanan::find($id);
        $pesanandetails = \App\Pesanandetails::where('pesanan_id', $pesanan->id)->get();
        return view('history.details',compact('pesanan','pesanandetails'));                                                                                                                                     
    }
}
