<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Models\FaqKategori;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $data = Faq::with('kategori')->orderBy('kategori_id')->get();

        return view('backend.pages.faq.index')
            ->with('data', $data);
    }
    
    public function create()
    {
        $kategori = FaqKategori::all();

        return view('backend.pages.faq.create')
            ->with('kategori', $kategori);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'kategori_id' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ])->validate();

        $insert = new Faq;
        $insert->kategori_id = $request->kategori_id;
        $insert->pertanyaan = $request->pertanyaan;
        $insert->jawaban = $request->jawaban;
        $insert->judul = $request->judul;
        $insert->flag_faq = 1;
       
        $insert->save();

        return redirect()->route('faq.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }

    public function edit($id)
    {
        $data = Faq::find($id);
        $kategori = FaqKategori::all();

        return view('backend.pages.faq.edit')
            ->with('kategori', $kategori)
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'kategori_id' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ])->validate();

        $insert = Faq::find($id);
        $insert->kategori_id = $request->kategori_id;
        $insert->pertanyaan = $request->pertanyaan;
        $insert->jawaban = $request->jawaban;
        $insert->judul = $request->judul;
        $insert->flag_faq = 1;
        $insert->save();

        return redirect()->route('faq.index')
            ->with('success', 'Anda telah mengedit data FAQ.');
    }

    public function destroy($id)
    {
        Faq::destroy($id);

        return redirect()->route('faq.index')
            ->with('success', 'Anda telah menghapus data FAQ.');
    }
}
