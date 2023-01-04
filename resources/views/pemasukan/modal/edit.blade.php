<!-- Modal -->
<div class="modal fade" id="EditDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action='{{ route('pemasukan/'.$item->npm) }}' method='post'>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 row">
                        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-10">
                            {{ $item->npm }}
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama' id="nama" placeholder="Masukkan nama anda.." value="{{ $item->nama }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='alamat' id="alamat" placeholder="Masukkan alamat anda.." value="{{ $item->alamat }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nominalKas" class="col-sm-2 col-form-label">Nominal Kas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nominalKas' id="nominalKas" placeholder="Masukkan nominal Kas.." value="{{ $item->nominalKas }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggalKas" class="col-sm-2 col-form-label">Tanggal Kas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='tanggalKas' id="tanggalKas" placeholder="yy-mm-dd" value="{{ $item->tanggalKas }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit">Simpan</button></div>
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