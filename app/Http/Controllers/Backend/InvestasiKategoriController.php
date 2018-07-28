<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\InvestasiKategori;
class InvestasiKategoriController extends Controller
{
    public function index()
    {
        $kategori = InvestasiKategori::all();

        return view('backend.pages.investasi-kategori.index')->with('kategori', $kategori);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'kategori' => 'required',
        ])->validate();

        $request->merge(['slug' => str_slug($request->kategori)]);        
        $insert = InvestasiKategori::create($request->all());

        return redirect()->route('kategori-investasi.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        return InvestasiKategori::find($id);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'kategori' => 'required',
        ])->validate();

        $request->merge(['slug' => str_slug($request->kategori)]);
        $update = InvestasiKategori::find($id)->update($request->all());

        return redirect()->route('kategori-investasi.index')
            ->with('success', 'Anda telah mengubah data kategori.');
    }

    public function destroy($id)
    {
        InvestasiKategori::destroy($id);

        return redirect()->route('kategori-investasi.index')
            ->with('success', 'Anda telah menghapus data kategori.');
    }
}
