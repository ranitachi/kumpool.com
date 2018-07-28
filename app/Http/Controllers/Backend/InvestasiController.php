<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\InvestasiKategori;
use App\Models\Investasi;
use App\Models\GambarInvestasi;
use Validator;
use Image;
use Input;
use Auth;
use File;

class InvestasiController extends Controller
{
    public function index()
    {
        $data = Investasi::with('kategori')->get();

        return view('backend.pages.investasi.index')
            ->with('data', $data);
    }
    
    public function create()
    {
        $kategori = InvestasiKategori::all();
        $jenis = array('Short Run','Long Run','High Return','Best For Trial');
        return view('backend.pages.investasi.create')
            ->with('kategori', $kategori)->with('jenis',$jenis);
    }

    public function store(Request $request)
    {

        // dd($request->all());
        Validator::make($request->all(), [
            'kategori_id' => 'required',
            'nama_investasi' => 'required',
            'lokasi' => 'required',
            'nominal' => 'required',
            'jumlah_unit' => 'required',
        ])->validate();

        $insert = new Investasi;
        $insert->kategori_id = $request->kategori_id;
        $insert->nama_investasi = $request->nama_investasi;
        $insert->jenis = $request->jenis;
        $insert->lokasi = $request->lokasi;
        $insert->nominal = str_replace(array(',','.'),'',$request->nominal);
        $insert->jumlah_unit = str_replace(array(',','.'),'',$request->jumlah_unit);
        $insert->periode = $request->periode;
        $insert->keterangan = $request->konten;
        $insert->return = $request->return;
        $insert->end_date = date('Y-m-d',strtotime($request->end_date));
        
        $insert->save();
        $investasi_id=$insert->id;
        // $investasi_id=1;
        if ($request->hasFile('foto_utama')) {
                $file = $request->file('foto_utama');
                $path = public_path().'/images/';
                $filename = time()."_investasi_".$investasi_id."_".strtolower($file->getClientOriginalName());
                $file->move($path, $filename);

                $gbr=new GambarInvestasi;
                $gbr->investasi_id=$investasi_id;
                $gbr->gambar=$filename;
                $gbr->utama=1;
                $gbr->flag=1;
                $gbr->save();
        }

        if ($request->hasFile('foto_lain')) {
                $file = $request->file('foto_lain');
                foreach($file as $k => $v)
                {
                    if($v->getClientOriginalName()!='')
                    {
                        $path = public_path().'/images/';
                        $filename = time()."_investasi_".$investasi_id."_".strtolower($v->getClientOriginalName());
                        $v->move($path, $filename);
                        
                        $gbr=new GambarInvestasi;
                        $gbr->investasi_id=$investasi_id;
                        $gbr->gambar=$filename;
                        $gbr->utama=0;
                        $gbr->flag=1;
                        $gbr->save();
                    }
                }
        }

        return redirect()->route('investasi.index')
            ->with('success', 'Anda telah memasukkan data Investasi baru.');
    }

    public function edit($id)
    {
        $data = Investasi::find($id);
        $kategori = InvestasiKategori::all();
        $gb=GambarInvestasi::where('investasi_id',$id)->where('flag',1)->get();
        $gbr=array();
        $jenis = array('Short Run','Long Run','High Return','Best For Trial');
        foreach($gb as $k=>$v)
        {
            $gbr[$v->utama][]=$v;
        }
        // dd($gbr);
        return view('backend.pages.investasi.edit')
            ->with('kategori', $kategori)
            ->with('gbr', $gbr)
            ->with('jenis', $jenis)
            ->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'kategori_id' => 'required',
            'nama_investasi' => 'required',
            'lokasi' => 'required',
            'nominal' => 'required',
            'jumlah_unit' => 'required',
        ])->validate();

        $insert = Investasi::find($id);
        $insert->kategori_id = $request->kategori_id;
        $insert->nama_investasi = $request->nama_investasi;
        $insert->lokasi = $request->lokasi;
        $insert->jenis = $request->jenis;
        $insert->nominal = str_replace(array(',','.'),'',$request->nominal);
        $insert->jumlah_unit = str_replace(array(',','.'),'',$request->jumlah_unit);
        $insert->periode = $request->periode;
        $insert->keterangan = $request->konten;
        $insert->return = $request->return;
        $insert->flag = $request->flag;
        $insert->end_date = date('Y-m-d',strtotime($request->end_date));
        
        $insert->save();
        $investasi_id=$id;

        
        // foreach($gb as $kb=>$vb)
        // {
        //     $file=public_path().'images/'.$vb->gambar;
        //     File::delete($fil);
        //     $vb->delete();
        // }
        // $investasi_id=1;
        if ($request->hasFile('foto_utama')) {
            if($request->file('foto_utama')!='')
            {
                $gb=GambarInvestasi::where('investasi_id',$id)->where('utama',1)->delete();
                $file = $request->file('foto_utama');
                $path = public_path().'/images/';
                $filename = time()."_investasi_".$investasi_id."_".strtolower($file->getClientOriginalName());
                $file->move($path, $filename);
                
                $gbr=new GambarInvestasi;
                $gbr->investasi_id=$investasi_id;
                $gbr->gambar=$filename;
                $gbr->utama=1;
                $gbr->flag=1;
                $gbr->save();
            }
        }

        if ($request->hasFile('foto_lain')) {
                $file = $request->file('foto_lain');
                foreach($file as $k => $v)
                {
                    if($v->getClientOriginalName()!='')
                    {
                        // $gb=GambarInvestasi::where('investasi_id',$id)->where('utama',0)->delete();
                        $path = public_path().'/images/';
                        $filename = time()."_investasi_".$investasi_id."_".strtolower($v->getClientOriginalName());
                        $v->move($path, $filename);
                        
                        $gbr=new GambarInvestasi;
                        $gbr->investasi_id=$investasi_id;
                        $gbr->gambar=$filename;
                        $gbr->utama=0;
                        $gbr->flag=1;
                        $gbr->save();
                    }
                }
        }

        return redirect()->route('investasi.index')
            ->with('success', 'Anda telah Mengedit data Investasi.');
    }

    public function destroy($id)
    {
        Investasi::destroy($id);

        return redirect()->route('investasi.index')
            ->with('success', 'Anda telah menghapus data investasi.');
    }
}
