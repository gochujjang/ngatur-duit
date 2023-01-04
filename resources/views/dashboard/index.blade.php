@extends('layouts.main', ['title' => 'Dashboard', 'page_heading' => 'Dashboard'])
@section('content')
{{-- Section Pemasukan Terakhir --}}
<section class="row">
    <div class="d-flex gap-3">
        <div class="col-6 col-lg-6 col-md-6">
            <div class="card card-stat">
                <div class="card-body px-4 py-4-5">
                    
                        <h3 class="ps-2">Total Pemasukan</h3>
                        <div class="d-flex align-items-start flex-column p-2 mb-2">
                            <p class="fs-1 p-3 rounded fw-bolder text-success">Rp. {{ $totalPemasukan }}</p>
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6 col-md-6">
            <div class="card card-stat">
                <div class="card-body px-4 py-4-5">
                    
                        <h3 class="ps-2">Total Pengeluaran</h3>
                        <div class="d-flex align-items-start flex-column p-2 mb-2">
                            <p class="fs-1 p-3 rounded fw-bolder text-danger">Rp. {{ $totalPengeluaran }}</p>
                        </div>
                    
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="row">
	<div class="col card px-3 py-3">

		<div class="my-3 p-3 rounded">
			<div class="mb-3">
				<h2>Pemasukan Terakhir</h2>
			</div>
			
			
			<!-- Table untuk memanggil data dari database -->
			<table class="table">
				<thead>
					<tr>
						<th class="col-md-auto">No</th>
						<th class="col-md-2">NPM</th>
						<th class="col-md-2">Nama</th>
						<th class="col-md-2">Alamat</th>
						<th class="col-md-2">Nominal Kas</th>
						<th class="col-md-2">Tanggal Kas</th>
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
						<td>{{ $item->alamat }}</td>
						<td>Rp. {{ $item->nominalKas }}</td>
						<td>{{ $item->tanggalKas }}</td>
						
					</tr>
					<?php $i++ ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
{{-- Section Pengeluaran Terakhir --}}
<section class="row">
	<div class="col card px-3 py-3">
		<div class="my-3 p-3 rounded">
			<div class="mb-3">
				<h2>Pengeluaran Terakhir</h2>
			</div>
			
			
			<!-- Table untuk memanggil data dari database -->
			<table class="table">
				<thead>
					<tr>
						<th class="col-md-auto">No</th>
						<th class="col-md-2">NPM</th>
						<th class="col-md-2">Nama</th>
						<th class="col-md-2">Keterangan</th>
						<th class="col-md-2">Nominal Kas</th>
						<th class="col-md-2">Tanggal Kas</th>
					</tr>
				</thead>
				<tbody>
					<!-- Incremental nomor jumlah data -->
					<?php $i = $data2->firstItem() ?>
					<!-- membuat perulangan untuk list data -->
					@foreach ($data2 as $item)
						
					<tr>
						<td>{{ $i }}</td>
						<td>{{ $item->npm }}</td>
						<td>{{ $item->nama }}</td>
						<td>{{ $item->keterangan }}</td>
						<td>Rp. {{ $item->nominalKas }}</td>
						<td>{{ $item->tanggalKas }}</td>
						
					</tr>
					<?php $i++ ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection
{{-- Import modal form --}}
@push('modal')
{{-- @include('dashboard.modal.show') --}}
@endpush

@push('js')
@include('dashboard.script')
@endpush
