<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriBerita extends Model
{
    use SoftDeletes;

    protected $table = "kategori_berita";

    protected $fillable = [ 'kategori', 'slug' ];
}
