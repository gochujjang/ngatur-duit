<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemasukanController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     * Fungsi untuk menampilkan semua data
     */
    public function index(Request $request)
    {
        // Fungsi untuk fitur search mencari data
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = mahasiswa::where('npm', 'like', "%$katakunci%")
                                ->orWhere('nama','like',"%$katakunci%")
                                ->orWhere('alamat','like',"%$katakunci%")
                                ->paginate($jumlahbaris);
        }else{
           
            $data = mahasiswa::orderBy('tanggalKas','desc')->paginate($jumlahbaris);
            
        }
        // Mengambil data dari form create
        return view('pemasukan.index')->with('data', $data);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     * Menampilkan Form untuk memasukan data
     */
    public function create()
    {
        return view('pemasukan.create');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Fungsi untuk memasukan data yang baru ke database
     */
    public function store(Request $request)
    {
        Session::flash('npm', $request->npm);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        Session::flash('nominalKas', $request->nominalKas);
        Session::flash('tanggalKas', $request->tanggalKas);

        // Proses validasi data
        $request->validate([
            'npm'=>'required|numeric|unique:mahasiswa,npm',
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
        mahasiswa::create($data);
        // Melakukan redirect Kembali ke halaman utama dan menambahkan pesan success
        return redirect()->to('/pemasukan')->with('success','Berhasil menambahkan data');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Fungsi untuk menampilkan detail data
     */
    public function show($id)
    {
        //
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Fungsi untuk menampilkan form untuk proses edit data
     */
    public function edit($id)
    {
        $data = mahasiswa::where('npm', $id)->first();
        return view('pemasukan.edit')->with('data', $data);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Fungsi update untuk menyimpan update data
     */
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
        mahasiswa::where('npm', $id)->update($data);
        // Melakukan redirect Kembali ke halaman utama dan menambahkan pesan success
        return redirect()->to('/pemasukan')->with('success','Berhasil melakukan update data');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Fungsi untuk penghapusan data
     */
    public function destroy($id)
    {
        mahasiswa::where('npm', $id)->delete();
        return redirect()->to('pemasukan')->with('success','Berhasil menghapus data');
    }
}
