<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqKategori extends Model
{
    use SoftDeletes;
    protected $table = 'faq_kategori';
    protected $fillable = ['kategori','slug','flag','created_at','updated_at','deleted_at'];

}
