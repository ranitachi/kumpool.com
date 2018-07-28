@extends('backend.layouts.master')
@section('title')
	<title>FAQ</title>
@endsection
@section('modal')
	<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Konfirmasi Hapus Data FAQ</h4>
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
				<span class="widget-title">Data Seluruh FAQ</span>
				<a href="{{ route('faq.create') }}" class="btn btn-sm btn-success pull-right">+ Tambah Data</a>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
				<div class="table-responsive">
					<table id="table" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:15px;">#</th>
								<th>Kategori</th>
								<th>Judul</th>
								<th>Pertanyaan</th>
								<th>Jawaban</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $key => $item)
								<tr>
									<td>{{ $key = $key + 1 }}</td>
									<td>{{ $item->kategori->kategori }}</td>
									<td>{{ $item->judul }}</td>
									<td>{{ strip_tags($item->pertanyaan) }}</td>
									<td>{{ strip_tags($item->jawaban) }}</td>
									<td>
										@if ($item->flag_faq==1)
											<span class="label bg-success">Aktif</span>
										@else
											<span class="label bg-danger">Non Aktif</span>
										@endif
										</td>
									<td>
										<a href="{{ route('faq.edit', $item->id) }}" class="btn btn-xs btn-warning btn-edit"><i class="fa fa-edit"></i></a>
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


		// delete action
        $('#table').on('click', '.btn-delete', function(){
            var id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('backend/faq') }}/"+id)			
        })
	</script>
@endsection