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
                    <h1><i class="fas fa-shopping-cart"></i> Out</h1>
                    @if (!empty($pesanan))
                        
                   
                    <h5 align="right">Tanggal : {{$pesanan->tanggal}}</h5>
                    <div class="row">
                        <table class="table table-striped">
                            <tr>
                                <td>NO</td>
                                <td>GAMBAR</td>
                                <td>NAMA BARANG</td>
                                <td>JUMLAH</td>
                                <td>HARGA</td>
                                <td>TOTAL BARANG</td>
                                <td>AKSI</td>

                            </tr>
                            @foreach ($pesanandetails as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td> <img src="{{asset('uploads')}}/{{$item->barang->gambar}}" class="rounded mx-auto d-block" width="20%">  </td>
                                <td>{{$item->barang->nama_barang}}</td>
                                <td>{{$item->jumlah}} kain</td>
                                <td>Rp. {{number_format($item->barang->harga)}}</td>
                                <td>Rp. {{number_format($item->jumlah_harga)}}</td>
                                <td>
                                    <a href="/check_out/{{$item->id}}/delete" class="btn btn-danger" onclick="return confirm('Apakah Yakin ingin menghapus ?') ">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                              
                                <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                                <td><strong>Rp. {{number_format($pesanan->jumlah_harga)}}</strong></td>
                                <td><a href="/check_out/konfirmasi" class="btn btn-success" onclick="return confirm('Apakah Yakin ingin checkout ?') ">Check Out</a></td>
                            </tr>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
