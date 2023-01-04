<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Exports\PengeluaranExport;
use Maatwebsite\Excel\Facades\Excel;

class PengeluaranController extends Controller
{

    // Main function return ke Index
    public function index(Request $request)
    {
        // Fungsi untuk mencari suatu data dan paginatornya
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = pengeluaran::where('npm', 'like', "%$katakunci%")
                                ->orWhere('nama','like',"%$katakunci%")
                                ->orWhere('keterangan','like',"%$katakunci%")
                                ->paginate($jumlahbaris);
        }else{

            // Sorting data dan paginasi
            $data = pengeluaran::orderBy('tanggalKas','desc')->paginate($jumlahbaris);
            // Menghitung total nominalKas Pengeluaran
            $totalPengeluaran = pengeluaran::select('nominalKas')->sum('nominalKas');
            
        }
        // Mengembalikan data dari database
        return view('pengeluaran.index', [
            'data' => $data,
            'totalPengeluaran' => $totalPengeluaran
        ]);
    }

    // Fungsi untuk create data
    public function create()
    {
        return view('pengeluaran');
    }

    // Fungsi untuk menyimpan data yang telah diinputkan
    public function store(Request $request)
    {
        // Membuat session yang nantinya akan mengambil data
        Session::flash('npm', $request->npm);
        Session::flash('nama', $request->nama);
        Session::flash('keterangan', $request->keterangan);
        Session::flash('nominalKas', $request->nominalKas);
        Session::flash('tanggalKas', $request->tanggalKas);

        // Proses validasi data
        $request->validate([
            'npm'=>'required|numeric|unique:pengeluaran,npm',
            'nama'=>'required',
            'nominalKas'=>'required|numeric',
            'tanggalKas'=>'required|date',
        ],[
            'npm.required'=>'NPM wajib diisi',
            'npm.numeric'=>'NPM dalam bantuk angka',
            'npm.unique'=>'NPM yang diisi sudah terdaftar didalam database',
            'nama.required'=>'Nama wajib diisi',
            'nominalKas.required'=>'Nominal Kas wajib diisi',
            'tanggalKas.required'=>'Tanggal Kas wajib diisi',
            'tanggalKas.date'=>'Tanggal Kas diisi sesuai format tanggal',
        ]);
        // Proses mengumpulkan data
        $data = [
            'npm' => $request->npm,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'nominalKas' => $request->nominalKas,
            'tanggalKas' => $request->tanggalKas
        ];
        pengeluaran::create($data);
        // Melakukan redirect Kembali ke halaman utama dan menambahkan pesan success
        return redirect()->to('/pengeluaran')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    // Fungsi untuk menampilkan form data yang nantinya akan 
    // digunakan untuk mengedit suatu data
    public function edit($id)
    {
        $data = pengeluaran::where('npm', $id)->first();
        return view('pengeluaran.modal.edit')->with('data', $data);
    }

    // Fungsi untuk proses update setelah pengeditan
    public function update(Request $request, $id)
    {
        // Proses validasi data
        $request->validate([
            'nama'=>'required',
            'nominalKas'=>'required|numeric',
            'tanggalKas'=>'required|date',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'nominalKas.required'=>'Nominal Kas wajib diisi',
            'tanggalKas.required'=>'Tanggal Kas wajib diisi',
            'tanggalKas.date'=>'Tanggal Kas diisi sesuai format tanggal',
        ]);
        // Proses mengumpulkan data
        $data = [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'nominalKas' => $request->nominalKas,
            'tanggalKas' => $request->tanggalKas
        ];
        pengeluaran::where('npm', $id)->update($data);
        // Melakukan redirect Kembali ke halaman utama dan menambahkan pesan success
        return redirect()->to('/pengeluaran')->with('success','Berhasil melakukan update data');
    }

    // Fungsi untuk menghapus data
    public function destroy($id)
    {
        pengeluaran::where('npm', $id)->delete();
        return redirect()->to('pengeluaran')->with('success','Berhasil menghapus data');
    }

    // Fungsi untuk export ke excel
    public function exportexcel()
    {
        return Excel::download(new PengeluaranExport, 'data-pengeluaran.xlsx');
    }
}
