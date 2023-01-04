<!-- Modal -->
<div class="modal fade" id="TambahDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action='{{ url('pemasukan') }}' method='POST'>
                @csrf
				<div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">NPM</label>
                            <input type="number" class="form-control" name='npm' id="npm" placeholder="Masukkan NPM anda.." value="{{ Session::get('npm') }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name='nama' id="nama" placeholder="Masukkan nama anda.." value="{{ Session::get('nama') }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name='alamat' id="alamat" placeholder="Masukkan alamat anda.." value="{{ Session::get('alamat') }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nominal Kas</label>
                            <input type="text" class="form-control" name='nominalKas' id="nominalKas" placeholder="Masukkan nominal kas.." value="{{ Session::get('nominalKas') }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tanggal Kas</label>
                            <input type="text" class="form-control" name='tanggalKas' id="tanggalKas" placeholder="YY-MM-DD" value="{{ Session::get('tanggalKas') }}">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                </div>
            </form>
          
        </div>
      </div>
    </div>
  </div>