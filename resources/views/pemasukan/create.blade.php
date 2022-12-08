@extends('layouts.main')
<!-- START FORM -->
@section('konten')

<form action='{{ url('pemasukan') }}' method='post'>
@csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('pemasukan') }}" class="btn btn-secondary mb-3"> < Kembali</a>

        <div class="mb-3 row">
            <label for="npm" class="col-sm-2 col-form-label">NPM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='npm' id="npm" placeholder="Masukkan NPM anda.." value="{{ Session::get('npm') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="nama" placeholder="Masukkan nama anda.." value="{{ Session::get('nama') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' id="alamat" placeholder="Masukkan alamat anda.." value="{{ Session::get('alamat') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nominalKas" class="col-sm-2 col-form-label">Nominal Kas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nominalKas' id="nominalKas" placeholder="Masukkan nominal kas.." value="{{ Session::get('nominalKas') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggalKas" class="col-sm-2 col-form-label">Tanggal Kas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tanggalKas' id="tanggalKas" placeholder="yy-mm-dd" value="{{ Session::get('tanggalKas') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit">Simpan</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection
