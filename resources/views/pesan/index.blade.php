@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/home" class="btn btn-primary">Kembali</a>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{asset('uploads')}}/{{$barang->gambar}}" class="rounded mx-auto d-block" width="100%">    
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{$barang->nama_barang}}</h2>
                            <table class="table">
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>Rp. {{$barang->harga}}</td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td>{{number_format($barang->stock)}}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{$barang->keterangan}}</td>
                                </tr>
                               
                                    <tr>
                                        <td>Jumlah Pesanan</td>
                                        <td>:</td>
                                        <td>
                                            <form action="/pesan/{{$barang->id}}" method="post">
                                                {{ csrf_field() }}
                                            <input type="text" name="jumlah_pesanan" class="form-control mb-2" required>
                                            <button type="submit" class="btn btn-primary">Masukan keranjang</button>
                                            </form>
                                        </td>
                                    </tr>
                               
                              
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
