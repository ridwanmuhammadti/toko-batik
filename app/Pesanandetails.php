<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanandetails extends Model
{
    //
    protected $table = 'pesanandetails';

    public function pesanan(){
        return $this->belongsTo(Pesanan::class);
    }
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
