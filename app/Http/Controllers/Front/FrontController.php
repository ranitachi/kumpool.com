<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\InvestasiKategori;

class FrontController extends Controller
{
    public function index()
    {
        $slider = Slider::orderby('id', 'desc')->limit(4)->get();

        $berita = Berita::with('kategori')
            ->with('user')
            ->where('flag', 1) // active
            ->orderby('id', 'desc')
            ->limit(2)
            ->get();

        $video = Galeri::where('type', 2)->latest()->first();
        $inves_kat=InvestasiKategori::all();
        return view('front.pages.index')
            ->with('video', $video)
            ->with('inves_kat', $inves_kat)
            ->with('berita', $berita)
            ->with('slider', $slider);
    }

    public function coming_soon()
    {
        return view('front.pages.coming-soon');
    }
}
