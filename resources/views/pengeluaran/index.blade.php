@extends('layouts.main', ['title' => 'Pengeluaran', 'page_heading' => 'Pengeluaran'])

@section('content')
@include('utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">
		<!-- FORM PENCARIAN -->
		<div class="pb-3">
		  <form class="d-flex" action="{{ url('pengeluaran') }}" method="get">
			  <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
			  <button class="btn btn-primary" type="submit">Cari</button>
		  </form>
		</div>
		
		<!-- TOMBOL TAMBAH DATA -->
		<div class="pb-3 d-flex justify-content-end">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success me-2 py-2" data-bs-toggle="modal" data-bs-target="#TambahDataModal">
				+ Tambah Data
			</button>
			<a href='/exportexcel' class="btn btn-secondary py-2" role="button">
				<i class="bi bi-file-earmark-spreadsheet-fill"></i>
				<span>Export</span>
			</a>
		</div>
		<!-- Table untuk memanggil data dari database -->
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="col-md-auto">No</th>
					<th class="col-md-2">NPM</th>
					<th class="col-md-2">Nama</th>
					<th class="col-md-2">Keterangan</th>
					<th class="col-md-2">Nominal Kas</th>
					<th class="col-md-2">Tanggal Kas</th>
					<th class="col-md-3">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!-- Incremental nomor jumlah data -->
				<?php $i = $data->firstItem() ?>
				<!-- membuat perulangan untuk list data -->
				@foreach ($data as $item)
					
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $item->npm }}</td>
					<td>{{ $item->nama }}</td>
					<td>{{ $item->keterangan }}</td>
					<td>Rp. {{ $item->nominalKas }}</td>
					<td>{{ $item->tanggalKas }}</td>
					<td>
						{{-- <a href='{{ url('pengeluaran/'.$item->npm.'/edit') }}' class="btn btn-warning btn-sm">Edit</a> --}}
						<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#EditDataModal">
							Edit
						</button>
						<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("pengeluaran/".$item->npm) }}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
					</td>
				</tr>
				<?php $i++ ?>
				@endforeach
			</tbody>
		</table>
		{{-- Menampilkan total pengeluaran --}}
		<div class="d-flex align-items-end flex-column p-2 mb-2">
			<p class="h4 p-3 rounded fw-bolder">Total Pengeluaran : Rp. {{ $totalPengeluaran }}</p>
		</div>
		{{-- Paginator --}}
	   {{ $data->withQueryString()->links() }}
  </div>
</div>

</section>
@endsection
{{-- Import modal form tambah data --}}
@push('modal')
@include('pengeluaran.modal.create')
{{-- @include('pengeluaran.modal.edit') --}}
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
