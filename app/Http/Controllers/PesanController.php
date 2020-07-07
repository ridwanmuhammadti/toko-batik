<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;
use Carbon\Carbon;
use Alert;
class PesanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){
        $barang = \App\Barang::find($id);
        return view('pesan.index',compact('barang'));
    }
    public function pesan(Request $request, $id){
         $barang = \App\Barang::find($id);
         $tanggal = Carbon::now();
        //validasi melebihi angka stock
        if($request->jumlah_pesanan > $barang->stock){
            return redirect()->back();
        }
         //cek validasi 
         $cek_pesanan = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

         if(empty($cek_pesanan)){
                //simpan ke table pesanan
            $pesanan = new \App\Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->jumlah_harga = 0;
        
            $pesanan->save();
         }
         
         //jika pesanan sudah ad tinggal ditambahkan

        //simpan kedetail pesanan
        $pesananbaru = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //cek pesanan detail 
        $cek_pesanan_details = \App\Pesanandetails::where('barang_id', $barang->id)->where('pesanan_id',$pesananbaru->id)->first();

        if(empty($cek_pesanan_details)){
            $pesanandetails = new \App\Pesanandetails;
            $pesanandetails->barang_id = $barang->id;
            $pesanandetails->pesanan_id = $pesananbaru->id;
            $pesanandetails->jumlah = $request->jumlah_pesanan;
            $pesanandetails->jumlah_harga = $barang->harga*$request->jumlah_pesanan;
            $pesanandetails->save();
        }else{
            $pesanandetails = \App\Pesanandetails::where('barang_id', $barang->id)->where('pesanan_id',$pesananbaru->id)->first();
            $pesanandetails->jumlah =  $pesanandetails->jumlah+$request->jumlah_pesanan;
            //harga terbaru nambah pesanan

            $harga_pesanandetails_baru = $barang->harga*$request->jumlah_pesanan;
            $pesanandetails->jumlah_harga = $pesanandetails->jumlah_harga+$harga_pesanandetails_baru;
            $pesanandetails->update();

        }
        
        //jumlah total
        $pesanan = \App\Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesanan;
        $pesanan->update();
        
        Alert::success('Pesan Berhasil');
        return redirect('/home');
    }

    public function check_out(){
        $pesanan = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //validasi buat konfirmasi 
        if(!empty($pesanan)){
            $pesanandetails = \App\Pesanandetails::where('pesanan_id', $pesanan->id)->get();

        }
     
        return view('pesan.check_out',compact('pesanan','pesanandetails'));
    }
    public function delete($id){
        $pesanandetails = \App\Pesanandetails::find($id);
        $pesanan = \App\Pesanan::where('id', $pesanandetails->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanandetails->jumlah_harga;
        $pesanan->update();

        $pesanandetails->delete();

        return redirect()->back();
    }
    public function konfirmasi(){

        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user->alamat)){
            Alert::error('Identitas harus dilengkapi', 'Error');
            return redirect('/profile');
        }

        if(empty($user->nohp)){
            Alert::error('No HP harus dilengkapi', 'Error');
            return redirect('/profile');
        }
        $pesanan = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        //agar stock berkurang saat dicheck out
        $pesanandetails = \App\Pesanandetails::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanandetails as $pesanandetail){
            $barang = \App\Barang::where('id', $pesanandetail->barang_id)->first();
            $barang->stock = $barang->stock-$pesanandetail->jumlah;
            $barang->update();
        }
        return redirect('/history/'.$pesanan->id);
    }
}