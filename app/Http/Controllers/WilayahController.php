<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propinsi;
use App\Models\KotaKab;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
class WilayahController extends Controller
{
    public function wilayah_by_id($jns,$id)
    {   
        if($jns=='kab')
        {   
            $kab=KotaKab::where('province_id',$id)->get();                      
            echo '<select name="kota_kab" class="form-control select2"  onchange="wilayah(\'kec\',this.value)">
                    <option value="">-- Pilih --</option>';
            foreach($kab as $k=>$v)
            {
                echo '<option value="'.$v->id.'">'.$v->name.'</option>';
            }
            echo  '</select>';
        }
        elseif($jns=='kec')
        {
            $kec=Kecamatan::where('regency_id',$id)->get();                      
            echo '<select name="kecamatan" class="form-control select2"  onchange="wilayah(\'kel\',this.value)">
                    <option value="">-- Pilih --</option>';
            foreach($kec as $k=>$v)
            {
                echo '<option value="'.$v->id.'">'.$v->name.'</option>';
            }
            echo  '</select>';
        }
        elseif($jns=='kel')
        {
            $kel=Kelurahan::where('district_id',$id)->get();                      
            echo '<select name="kelurahan" class="form-control select2" >
                    <option value="">-- Pilih --</option>';
            foreach($kel as $k=>$v)
            {
                echo '<option value="'.$v->id.'">'.$v->name.'</option>';
            }
            echo  '</select>';
        }
    }
}
