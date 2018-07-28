@extends('backend.layouts.master')
@section('title')
    <title>Tambah Investor</title>
@endsection
@section('content')
	<div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Formulir Tambah Investor</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="{{ route('investor.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Investor</label>
                                <input type="text" class="form-control " name="nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control "></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control " name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Propinsi</label>
                                <select name="propinsi" class="form-control select2" id="propinsi"  onchange="wilayah('kab',this.value)">
                                    <option value="">-- Pilih Propinsi --</option>
                                    @foreach ($propinsi as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>HP/Telp</label>
                                <input type="text" class="form-control " name="telp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <div id="kab">
                                    <select name="kota_kab" class="form-control select2"  onchange="wilayah('kec',this.value)">
                                        <option value="">-- Pilih --</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Identitas</label>
                                <select name="ktp" class="form-control select2">
                                    <option value="">-- Pilih --</option>
                                    @php
                                        $jenis=array('KTP','SIM','KITAS','PASPOR','Lain-lain');
                                    @endphp
                                    @foreach ($jenis as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <div id="kec">
                                    <select name="kecamatan" class="form-control select2"  onchange="wilayah('kel',this.value)">
                                        <option value="">-- Pilih --</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Identitas</label>
                                <input type="text" class="form-control " name="no_ktp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <div id="kel">
                                    <select name="kelurahan" class="form-control select2" >
                                        <option value="">-- Pilih --</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor NPWP</label>
                                <input type="text" class="form-control " name="no_npwp">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" class="form-control " name="kode_pos">
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" class="form-control " name="pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sumber Dana</label>
                                <input type="text" class="form-control " name="sumber_dana">
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control " name="password">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Informasi Bank</label>
                                <input type="text" class="form-control " name="informasi_bank">
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            &nbsp;
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control " name="foto">
                                
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="user-card p-md">
                        <div class="media">
                            <div class="media-body">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
@endsection
{{-- /libs/bower/select2/dist/css/select2.min.css",
/libs/bower/select2/dist/js/select2.full.min.js" --}}
@section('footscript')
    <link rel="stylesheet" href="{{asset('theme/backend/libs/bower/select2/dist/css/select2.min.css')}}">
    <script src="{{ url('/') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="{{ asset('theme/backend/libs/bower/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2();
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose:true
        });
        var APP_URL = "{{ url('/') }}"
        function wilayah(jns,id)
        {
            $('#'+jns).load('{{url("wilayah")}}/'+jns+'/'+id,function(){
                $('.select2').select2();
            });
        }
    </script>
@endsection
<style>
    .form-group
    {
        margin-bottom:5px !important;
    }
</style>