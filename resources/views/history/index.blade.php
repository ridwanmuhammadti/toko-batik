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
            
                    <div class="row">
                        <table class="table table-striped">
                            <tr>
                                <td>NO</td>
                                <td>TANGGAL</td>
                                <td>STATUS</td>
                                <td>JUMLAH HARGA</td>
                              
                                <td>AKSI</td>

                            </tr>
                            @foreach ($pesanans as $item)
                            <tr>
                               
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->tanggal}}</td>
                                <td>
                                    @if ($item->status == 1)
                                        Sudah pesan & Belum dibayar
                                    @else
                                        Sudah dibayar
                                    @endif
                                       
                                </td>
                                <td>Rp. {{number_format($item->jumlah_harga+$item->kode)}}</td>
                                <td>
                                   <a href="/history/{{$item->id}}" class="btn btn-success">Detail</a>
                                </td>
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
