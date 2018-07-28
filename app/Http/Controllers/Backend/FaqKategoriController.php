<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Models\FaqKategori;

class FaqKategoriController extends Controller
{
    public function index()
    {
        $kategori = FaqKategori::all();

        return view('backend.pages.faq-kategori.index')->with('kategori', $kategori);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'kategori' => 'required',
        ])->validate();

        $request->merge(['slug' => str_slug($request->kategori)]);        
        $insert = FaqKategori::create($request->all());

        return redirect()->route('faq-kategori.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return FaqKategori::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'kategori' => 'required',
        ])->validate();

        $request->merge(['slug' => str_slug($request->kategori)]);
        $update = FaqKategori::find($id)->update($request->all());

        return redirect()->route('faq-kategori.index')
            ->with('success', 'Anda telah mengubah data kategori.');
    }

    public function destroy($id)
    {
        FaqKategori::destroy($id);

        return redirect()->route('faq-kategori.index')
            ->with('success', 'Anda telah menghapus data kategori.');
    }
}
