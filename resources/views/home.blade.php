@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5 mt-3">
            <img src="{{asset('/images/logo.png')}}" class="rounded mx-auto d-block" width="500" alt="">
        </div>
       
        @foreach ($barang as $item)
        <div class="col-md-4">
         
            <div class="card" style="width: 18rem;">
                <img src="{{url('/uploads')}}/{{$item->gambar}}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$item->nama_barang}}</h5>
                    <p class="card-text">
                        <strong>Harga : </strong> Rp. {{number_format($item->harga)}}<br>
                        <strong>Stock : </strong> {{$item->stock}}<br><hr>
                        <strong>Keterangan : </strong><br>
                        {{$item->keterangan}}
                    </p>
                    <a href="/pesan/{{$item->id}}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Order</a>
                </div>
            </div>
            
        </div>
           
        @endforeach
    </div>
</div>
@endsection
