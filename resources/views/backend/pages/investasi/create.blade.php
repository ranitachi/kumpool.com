@extends('backend.layouts.master')
@section('title')
    <title>Tambah Investasi</title>
@endsection
@section('content')
	<div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Formulir Tambah Investasi</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="{{ route('investasi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Investasi</label>
                                <input type="text" class="form-control" name="nama_investasi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori Investasi</label>
                                <select name="kategori_id" class="form-control">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Investasi</label>
                                <select name="jenis" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" class="form-control" name="lokasi">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="text" class="form-control" name="nominal">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah Unit</label>
                                <input type="text" class="form-control" name="jumlah_unit">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Persentase Kembali (%)</label>
                                <input type="text" class="form-control" name="return">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Periode (Bulan)</label>
                                <input type="text" class="form-control" name="periode">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleTextInput1" class="col-sm-12 control-label">Tanggal Berakhir Registrasi</label>
                                <div class="col-sm-12">
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="end_date">
                                        <span class="input-group-addon bg-info text-white">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Foto Utama</label>
                                <input type="file" class="form-control" name="foto_utama">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Foto Lain</label>
                                <input type="file" class="form-control" name="foto_lain[]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <input type="file" class="form-control" name="foto_lain[]">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <input type="file" class="form-control" name="foto_lain[]">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" >
                        <label>Konten Investasi</label>
                        <textarea name="konten" id="ckeditor" cols="30" rows="10"></textarea>
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

@section('footscript')
    <script src="{{ url('/') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="{{ asset('theme/backend') }}/libs/bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose:true
        });
        var APP_URL = "{{ url('/') }}"

        var options = {
            filebrowserImageBrowseUrl: APP_URL + '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: APP_URL + '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: APP_URL + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: APP_URL + '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>

    <script>
        CKEDITOR.replace( 'ckeditor', options);
        CKEDITOR.config.extraPlugins = 'justify';
    </script>
@endsection