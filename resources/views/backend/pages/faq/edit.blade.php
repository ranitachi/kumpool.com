@extends('backend.layouts.master')

@section('title')
    <style>
        .stream-img {
            margin: 10px 0 15px;
        }
    </style>
    <title>Edit FAQ</title>
@endsection

@section('content')
	<div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Formulir Ubah FAQ</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="{{ route('faq.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul FAQ</label>
                        <input type="text" class="form-control" name="judul" value="{{ $data->judul }}">
                    </div>
                    <div class="form-group">
                        <label>Kategori FAQ</label>
                        <select name="kategori_id" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $item)
                                @if ($data->kategori_id==$item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->kategori }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <textarea name="pertanyaan" id="ckeditor" cols="30" rows="10">{{$data->pertanyaan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Jawaban</label>
                        <textarea name="jawaban" id="ckeditor2" cols="30" rows="10">{{$data->jawaban}}</textarea>
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

    <script>
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
        CKEDITOR.replace( 'ckeditor2', options);
        CKEDITOR.config.extraPlugins = 'justify';
    </script>
@endsection