<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sewakost extends Model
{
    //
    protected $table='kamar';
    protected $primaryKey='id_kamar';
    protected $fillable=['fasilitas','status','harga_sewa'];
}
