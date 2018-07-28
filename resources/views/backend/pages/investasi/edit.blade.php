@extends('backend.layouts.master')

@section('title')
    <style>
        .stream-img {
            margin: 10px 0 15px;
        }
    </style>
    <title>Edit Investasi</title>
@endsection

@section('content')
	<div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Formulir Edit Investasi</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="{{ route('investasi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Investasi</label>
                                <input type="text" class="form-control" name="nama_investasi" value="{{$data->nama_investasi}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori Investasi</label>
                                <select name="kategori_id" class="form-control">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $item)
                                        @if ($item->id==$data->kategori_id)
                                            <option value="{{ $item->id }}" selected="selected">{{ $item->kategori }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                        @endif
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
                                    <option value="">-- Pilih --</option>
                                    @foreach ($jenis as $item)
                                        @if ($item==$data->jenis)
                                            <option value="{{ $item }}" selected="selected">{{ $item }}</option>
                                        @else
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" class="form-control" name="lokasi" value="{{$data->lokasi}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="text" class="form-control" name="nominal" value="{{number_format($data->nominal,0,',','.')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jumlah Unit</label>
                                <input type="text" class="form-control" name="jumlah_unit" value="{{number_format($data->jumlah_unit,0,',','.')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Persentase Kembali (%)</label>
                                <input type="text" class="form-control" name="return" value="{{$data->return}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Periode (Bulan)</label>
                                <input type="text" class="form-control" name="periode" value="{{$data->periode}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleTextInput1" class="col-sm-12 control-label">Tanggal Berakhir Registrasi</label>
                                <div class="col-sm-12">
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="end_date" value="{{date('d-m-Y',strtotime($data->end_date))}}">
                                        <span class="input-group-addon bg-info text-white">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status Investasi</label>
                                <select name="flag" class="form-control">
                                    <option value="-1">-- Status --</option>
                                    <option value="0" {{$data->flag==0 ? 'selected="selected"' : ''}}>Tidak Aktif</option>
                                    <option value="1" {{$data->flag==1 ? 'selected="selected"' : ''}}>Aktif</option>
                                    <option value="2" {{$data->flag==2 ? 'selected="selected"' : ''}}>Sudah Selesai</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Foto Utama <br><small><i>*Kosongkan Jika Tidak Diganti</i></small></label>
                                <input type="file" class="form-control" name="foto_utama">
                                @if (isset($gbr[1]))
                                    @if (count($gbr[1])!=0)
                                        <img src="{{asset('images/'.$gbr[1][0]->gambar)}}">
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Foto Lain<br><small><i>*Kosongkan Jika Tidak Diganti</i></small></label>
                                <input type="file" class="form-control" name="foto_lain[]">
                                @if (isset($gbr[0][0]))
                                    @if (count($gbr[0][0])!=0)
                                        <img src="{{asset('images/'.$gbr[0][0]->gambar)}}">
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp;<br><small><i>*Kosongkan Jika Tidak Diganti</i></small></label>
                                <input type="file" class="form-control" name="foto_lain[]">
                                @if (isset($gbr[0][1]))
                                    @if (count($gbr[0][1])!=0)
                                        <img src="{{asset('images/'.$gbr[0][1]->gambar)}}">
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp;<br><small><i>*Kosongkan Jika Tidak Diganti</i></small></label>
                                <input type="file" class="form-control" name="foto_lain[]">
                                @if (isset($gbr[0][2]))
                                    @if (count($gbr[0][2])!=0)
                                        <img src="{{asset('images/'.$gbr[0][2]->gambar)}}">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" >
                        <label>Konten Investasi</label>
                        <textarea name="konten" id="ckeditor" cols="30" rows="10">{{$data->keterangan}}</textarea>
                    </div>
                    <br>
                    <div class="user-card p-md">
                        <div class="media">
                            <div class="media-body">
                                <input type="submit" class="btn btn-success" value="Simpan Perubahan">
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
<style>
    small{
        font-size:10px !important;
    }
</style>