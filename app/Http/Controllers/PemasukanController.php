<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Exports\PemasukanExport;
use Maatwebsite\Excel\Facades\Excel;

class PemasukanController extends Controller
{
    // Main function return ke Index
    public function index(Request $request)
    {
        // Fungsi untuk mencari suatu data dan paginatornya
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = pemasukan::where('npm', 'like', "%$katakunci%")
                                ->orWhere('nama','like',"%$katakunci%")
                                ->orWhere('alamat','like',"%$katakunci%")
                                ->paginate($jumlahbaris);
            
        }else{
            // Sorting data dan paginasi
            $data = pemasukan::orderBy('tanggalKas','desc')->paginate($jumlahbaris);
            // Menghitung total nominalKas Pemasukan
            $totalPemasukan = pemasukan::select('nominalKas')->sum('nominalKas');
            
        }

        // Mengembalikan data dari database
        return view('pemasukan.index', [
            'data' => $data,
            'totalPemasukan' => $totalPemasukan
        ]);
    }

    // Fungsi untuk create data
    public function create()
    {
        return view('pemasukan');
    }

    // Fungsi untuk menyimpan data yang telah diinputkan
    public function store(Request $request)
    {
        // Membuat session yang nantinya akan mengambil data
        Session::flash('npm', $request->npm);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        Session::flash('nominalKas', $request->nominalKas);
        Session::flash('tanggalKas', $request->tanggalKas);

        // Proses validasi data
        $request->validate([
            'npm'=>'required|numeric|unique:pemasukan,npm',
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
            'alamat' => $request->alamat,
            'nominalKas' => $request->nominalKas,
            'tanggalKas' => $request->tanggalKas
        ];
        pemasukan::create($data);
        // Melakukan redirect Kembali ke halaman utama dan menambahkan pesan success
        return redirect()->to('/pemasukan')->with('success','Berhasil menambahkan data');
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
        $data = pemasukan::where('npm', $id)->first();
        return view('pemasukan.modal.edit')->with('data', $data);
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
            'alamat' => $request->alamat,
            'nominalKas' => $request->nominalKas,
            'tanggalKas' => $request->tanggalKas
        ];
        pemasukan::where('npm', $id)->update($data);
        // Melakukan redirect Kembali ke halaman utama dan menambahkan pesan success
        return redirect()->to('/pemasukan')->with('success','Berhasil melakukan update data');
    }

    // Fungsi untuk menghapus data
    public function destroy($id)
    {
        pemasukan::where('npm', $id)->delete();
        return redirect()->to('pemasukan')->with('success','Berhasil menghapus data');
    }
    // Fungsi untuk export ke excel
    public function exportexcel()
    {
        return Excel::download(new PemasukanExport, 'data-pemasukan.xlsx');
    }

}
