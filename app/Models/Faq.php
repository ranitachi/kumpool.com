<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;
    protected $table = 'faq';
    protected $fillable = ['kategori_id','pertanyaan','jawaban','judul','flag_faq','created_at','updated_at','deleted_at'];

    function kategori()
    {
        return $this->belongsTo('App\Models\FaqKategori','kategori_id');
    }
}
