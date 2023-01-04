<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{

    //  Handle the incoming request.
    //  @return \Illuminate\View\View

    public function __invoke(Request $request): View
    {
        // Fungsi untuk mencari suatu data dan paginatornya
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = pemasukan::where('npm', 'like', "%$katakunci%")
                                ->orWhere('nama','like',"%$katakunci%")
                                ->orWhere('alamat','like',"%$katakunci%")
                                ->paginate($jumlahbaris);
            $data2 = pengeluaran::where('npm', 'like', "%$katakunci%")
                                ->orWhere('nama','like',"%$katakunci%")
                                ->orWhere('keterangan','like',"%$katakunci%")
                                ->paginate($jumlahbaris);
        }else{
            // Sorting data dan paginasi
            $data = pemasukan::orderBy('tanggalKas','desc')->paginate($jumlahbaris);
            $data2 = pengeluaran::orderBy('tanggalKas','desc')->paginate($jumlahbaris);
            // Menghitung total nominalKas
            $totalPemasukan = pemasukan::select('nominalKas')->sum('nominalKas');
            $totalPengeluaran = pengeluaran::select('nominalKas')->sum('nominalKas');
        }
        // Passing data ke dashboard.index
        return view('dashboard.index', [
            'data' => $data,
            'data2' => $data2,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran
        ]);
    }
}
