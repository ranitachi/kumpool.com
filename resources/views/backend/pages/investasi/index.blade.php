@extends('backend.layouts.master')
@section('title')
	<title>Investasi</title>
@endsection
@section('modal')
	<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data Investasi</h4>
				</div>
				<div class="modal-body">
					<h5>Apakah anda yakin akan menghapus data ini?</h5>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form-delete').submit();" style="cursor:pointer;">Ya, Saya Yakin</a>
					<form id="form-delete" method="POST" style="display: none;">
						@csrf
						@method('DELETE')
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="col-md-12">
		<div class="widget">
			<header class="widget-header">
				<span class="widget-title">Data Seluruh Artikel</span>
				<a href="{{ route('investasi.create') }}" class="btn btn-sm btn-success pull-right">+ Tambah Data</a>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<div class="table-responsive">
					<table id="table" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:15px;">#</th>
								<th>Investasi</th>
								<th>Kategori</th>
								<th>Lokasi</th>
								<th>Nominal<br>Jumlah Unit</th>
								<th>Jenis</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $key => $item)
								<tr>
									<td>{{ $key = $key + 1 }}</td>
									<td>{{ $item->nama_investasi }}</td>
									<td>{{ $item->kategori->kategori }}</td>
									<td>{{ $item->lokasi }}</td>
									<td>{{ number_format($item->nominal,0,',','.') }}<br>{{number_format($item->jumlah_unit,0,',','.')}} Unit</td>
									<td>{{ $item->jenis }}</td>
									<td>
										@if ($item->flag==1)
											<span class="label bg-success">Aktif</span>
										@else
											<span class="label bg-danger">Non Aktif</span>
										@endif
										</td>
									<td>
										<a href="{{ route('investasi.edit', $item->id) }}" class="btn btn-xs btn-warning btn-edit"><i class="fa fa-edit"></i></a>
										<a href="#" class="btn btn-xs btn-danger btn-delete" data-toggle="modal" data-target="#modalhapus" data-value="{{ $item->id }}"><i class="fa fa-trash"></i></a>
										
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div><!-- .widget-body -->
		</div><!-- .widget -->
	</div>
@endsection

@section('footscript')
	<script>
		// binding data to modal edit
        // $('#table').on('click', '.btn-edit', function(){
        //     var id = $(this).data('value')
			
        //     $.ajax({
        //         url: "{{ url('backend/kategori-berita') }}/"+id+"/edit",
        //         success: function(res) {
		// 			$('#form-update').attr('action', "{{ url('backend/kategori-berita') }}/"+id)

		// 			$('#kategori').val(res.kategori)
        //         }
        //     })
        // })

		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('backend/investasi') }}/"+id)			
        })
	</script>
@endsection