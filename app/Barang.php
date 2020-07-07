<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    
    protected $table = 'barang';
    protected $fillable = ['nama_barang','harga','harga','stock','gambar'];

    public function pesanandetails(){
        return $this->hasMany(Pesanandetails::class);
    }


}
