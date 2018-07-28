<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InvestasiKategori extends Model
{
    use SoftDeletes;
    protected $table = "investasi_kategori";

    protected $fillable = [ 'keterangan','flag','kategori', 'slug' ,'created_at','updated_at','deleted_at'];
}
