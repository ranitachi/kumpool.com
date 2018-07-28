<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use App\User;
use Validator;
use App\Models\Ventura;
use App\Models\Investastor;
use App\Models\Propinsi;
use App\Models\KotaKab;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class InvestastorController extends Controller
{
    public function index()
    {
        $users = User::where('level',4)->get();
        $investor=Investastor::all();
        $invs=array();
        foreach($investor as $k=>$v)
        {
            $invs[$v->user_id]=$v;
        }
        return view('backend.pages.investor.index')
            ->with('investor', $invs)
            ->with('users', $users);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ])->validate();
   
        $insert = new User;
        $insert->name = $request->nama;
        $insert->email = $request->email;
        $insert->password = Hash::make($request->password);
        $insert->level = 4;
        $insert->save();

        $user_id=$insert->id;

        $invs=new Investastor;
        $invs->user_id=$user_id;
        $invs->nama=$request->nama;
        $invs->email=$request->email;
        $invs->telp=$request->telp;
        $invs->alamat=$request->alamat;
        $invs->propinsi=$request->propinsi;
        $invs->kota_kab=$request->kota_kab;
        $invs->kecamatan=$request->kecamatan;
        $invs->kelurahan=$request->kelurahan;
        $invs->kode_pos=$request->kode_pos;
        $invs->ktp=$request->ktp;
        $invs->npwp=$request->npwp;
        $invs->no_ktp=$request->no_ktp;
        $invs->no_npwp=$request->no_npwp;
        $invs->pekerjaan=$request->pekerjaan;
        $invs->sumber_dana=$request->sumber_dana;
        $invs->informasi_bank=$request->informasi_bank;
        $invs->flag=1;
        $invs->save();

        return redirect()->route('investor.index')
            ->with('success', 'Anda telah memasukkan data baru.');
    }
    public function create()
    {
        $propinsi=Propinsi::all();
        return view('backend.pages.investor.create')->with('propinsi', $propinsi);
    }
    public function edit($id)
    {
        // return User::find($id);
        $propinsi=Propinsi::all();
        $investor=Investastor::where('user_id',$id)->with('propinsi')->with('kota_kab')->with('kecamatan')->with('kelurahan')->first();
        $kabupaten=KotaKab::where('province_id',$investor->propinsi)->get();
        $kecamatan=Kecamatan::where('regency_id',$investor->kota_kab)->get();
        $kelurahan=Kelurahan::where('district_id',$investor->kecamatan)->get();

        return view('backend.pages.investor.edit')
                ->with('propinsi', $propinsi)
                ->with('kabupaten', $kabupaten)
                ->with('kecamatan', $kecamatan)
                ->with('kelurahan', $kelurahan)
                ->with('investor',$investor);
    }

    public function update(Request $request, $id)
    {
        if (!is_null($request->password)) {
            $pass=$request->password;
        }
        
        Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
        ])->validate();
   
        $insert = User::find($id);

        $pass=(is_null($request->password) ? $insert->password : $pass);

        $insert->name = $request->nama;
        $insert->email = $request->email;
        $insert->password = $pass;
        $insert->level = 4;
        $insert->save();

        $user_id=$id;

        $invs=Investastor::where('user_id',$id)->first();
        $invs->user_id=$user_id;
        $invs->nama=$request->nama;
        $invs->email=$request->email;
        $invs->telp=$request->telp;
        $invs->alamat=$request->alamat;
        $invs->propinsi=$request->propinsi;
        $invs->kota_kab=$request->kota_kab;
        $invs->kecamatan=$request->kecamatan;
        $invs->kelurahan=$request->kelurahan;
        $invs->kode_pos=$request->kode_pos;
        $invs->ktp=$request->ktp;
        $invs->npwp=$request->npwp;
        $invs->no_ktp=$request->no_ktp;
        $invs->no_npwp=$request->no_npwp;
        $invs->pekerjaan=$request->pekerjaan;
        $invs->sumber_dana=$request->sumber_dana;
        $invs->informasi_bank=$request->informasi_bank;
        $invs->flag=1;
        $invs->save();

        return redirect()->route('investor.index')
            ->with('success', 'Anda telah Mengubah data Investor.');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('investor.index')
            ->with('success', 'Anda telah menghapus data Investor.');
    }
}
