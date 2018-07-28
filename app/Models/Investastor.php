<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investastor extends Model
{
    use SoftDeletes;
    protected $table='investastor';
    protected $fillable = ['user_id','nama','email','telp','alamat','propinsi','kota_kab','kecamatan','kelurahan','kode_pos','ktp','npwp','no_ktp','no_npwp','pekerjaan','sumber_dana','informasi_bank','flag','created_at','updated_at','deleted_at'];

    function user()
    {
        return $this->belongsTo('App\Users','user_id');
    }
    function propinsi()
    {
        return $this->belongsTo('App\Models\Propinsi','propinsi');
    }
    function kota_kab()
    {
        return $this->belongsTo('App\Models\KotaKab','kota_kab');
    }
    function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','kecamatan');
    }
    function kelurahan()
    {
        return $this->belongsTo('App\Models\Kelurahan','kelurahan');
    }
}
