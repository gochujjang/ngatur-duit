<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PengeluaranSeeder extends Seeder
{

    // Memasukkan sekumpulan data seeds kedalam table
    public function run()
    {
        DB::table('pengeluaran')->insert([
            'npm' => '11121130',
            'nama' => 'Ani',
            'keterangan' => 'Uang Makan',
            'nominalKas' => '10000',
            'tanggalKas' => '22-12-05'
        ]);
        DB::table('pengeluaran')->insert([
            'npm' => '11121131',
            'nama' => 'Budi',
            'keterangan' => 'Jajan',
            'nominalKas' => '25000',
            'tanggalKas' => '22-12-05'
        ]);
        DB::table('pengeluaran')->insert([
            'npm' => '11121132',
            'nama' => 'Dito',
            'keterangan' => 'Ongkos',
            'nominalKas' => '50000',
            'tanggalKas' => '22-12-06'
        ]);
        DB::table('pengeluaran')->insert([
            'npm' => '11121133',
            'nama' => 'Diko',
            'keterangan' => 'Minjem',
            'nominalKas' => '2000',
            'tanggalKas' => '22-12-06'
        ]);
        DB::table('pengeluaran')->insert([
            'npm' => '11121134',
            'nama' => 'Jino',
            'keterangan' => 'Jalan-jalan',
            'nominalKas' => '5000',
            'tanggalKas' => '22-12-06'
        ]);
        DB::table('pengeluaran')->insert([
            'npm' => '11121135',
            'nama' => 'Jake',
            'keterangan' => 'Ongkos',
            'nominalKas' => '14000',
            'tanggalKas' => '22-12-06'
        ]);
        DB::table('pengeluaran')->insert([
            'npm' => '11121136',
            'nama' => 'Bake',
            'keterangan' => 'Uang makan',
            'nominalKas' => '21000',
            'tanggalKas' => '22-12-08'
        ]);
    }
}
