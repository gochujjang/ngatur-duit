@extends('layouts.main')
        
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('pemasukan') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-primary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('pemasukan/create') }}' class="btn btn-success">+ Tambah Data</a>
                </div>
                <!-- Table untuk memanggil data dari database -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">NPM</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-2">Alamat</th>
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
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->nominalKas }}</td>
                            <td>{{ $item->tanggalKas }}</td>
                            <td>
                                <a href='{{ url('pemasukan/'.$item->npm.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("pemasukan/".$item->npm) }}" method="post">
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
               {{ $data->withQueryString()->links() }}
          </div>
          
          <!-- AKHIR DATA -->
          @endsection
 