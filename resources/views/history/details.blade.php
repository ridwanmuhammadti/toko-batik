@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-5">
            <a href="/home" class="btn btn-primary">Kembali</a>
            <div class="card mt-3">
                
                <div class="card-header">
                    
                    <h3><i class="fas fa-shopping-cart"></i>Sukses Checkout</h3>
                    <h5>Pesanan anda sudah sukses dicheckout selanjutnya silahkan transfer di <b>Rekening Bank BRI No Rekening : 3232-83443-343452 </b> dengan Nominal : <b>Rp. {{number_format($pesanan->kode+$pesanan->jumlah_harga)}}</b></h5>
                </div>
                <div class="card-body">

            
                    <div class="row">
                        <table class="table table-striped">
                            <tr>
                                <td>NO</td>
                                <td>NAMA BARANG</td>
                                <td>JUMLAH</td>
                                <td>HARGA</td>
                                <td>TOTAL HARGA</td>

                            </tr>
                            @foreach ($pesanandetails as $item)
                            <tr>
                               
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->barang->nama_barang}}</td>
                                <td>{{$item->jumlah}} kain</td>
                                <td>Rp. {{number_format($item->barang->harga)}}</td>
                                <td>
                                  Rp. {{number_format($item->jumlah_harga)}}
                                </td>
                            </tr>
                           
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                            
                                <td><strong>Rp. {{number_format($item->jumlah_harga)}}</strong></td>
                            </tr>
                            
                            <tr>
                                <td colspan="4" align="right"><strong>Biaya Admin :</strong></td>
                            
                                <td><strong>Rp. {{number_format($item->pesanan->kode)}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><strong>Total yang harus dibayar :</strong></td>
                            
                                <td><strong>Rp. {{number_format($item->pesanan->kode+$item->jumlah_harga)}}</strong></td>
                            </tr>
                            @endforeach
                        </table>
                      
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
