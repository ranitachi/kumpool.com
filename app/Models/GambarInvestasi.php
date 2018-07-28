<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GambarInvestasi extends Model
{
    use SoftDeletes;
    protected $table='gambar_investasi';
    protected $fillable = ['gambar','investasi_id','utama','flag','created_at','updated_at','deleted_at'];

    function investasi()
    {
        return belongsTo('App\Models\Investasi','investasi_id');
    }
}
