<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    //
    protected $table = 'pesanan';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pesanandetails(){
        return $this->hasMany(Pesanandetails::class);
    }
}
