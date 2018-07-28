<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investasi extends Model
{
    use SoftDeletes;
    protected $table='investasi';
    protected $fillable=['kategori_id','nama_investasi','lokasi','nominal','periode','return','jumlah_unit','flag','keterangan','end_date','created_at','updated_at','deleted_at'];
    
    public function kategori()
    {
        return $this->belongsTo('App\Models\InvestasiKategori', 'kategori_id');
    }
}
