<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasukanSeeder extends Seeder
{
    
    // Memasukkan sekumpulan data seeds kedalam table
    public function run()
    {
        DB::table('pemasukan')->insert([
            'npm' => '11121130',
            'nama' => 'Ani',
            'alamat' => 'Depok',
            'nominalKas' => '10000',
            'tanggalKas' => '22-12-05'
        ]);
        DB::table('pemasukan')->insert([
            'npm' => '11121131',
            'nama' => 'Budi',
            'alamat' => 'Depok',
            'nominalKas' => '25000',
            'tanggalKas' => '22-12-05'
        ]);
        DB::table('pemasukan')->insert([
            'npm' => '11121132',
            'nama' => 'Dito',
            'alamat' => 'Jakarta',
            'nominalKas' => '100000',
            'tanggalKas' => '22-12-06'
        ]);
        DB::table('pemasukan')->insert([
            'npm' => '11121133',
            'nama' => 'Diko',
            'alamat' => 'Depok',
            'nominalKas' => '2000',
            'tanggalKas' => '22-12-06'
        ]);
        DB::table('pemasukan')->insert([
            'npm' => '11121134',
            'nama' => 'Jino',
            'alamat' => 'Bekasi',
            'nominalKas' => '5000',
            'tanggalKas' => '22-12-06'
        ]);
        DB::table('pemasukan')->insert([
            'npm' => '11121135',
            'nama' => 'Jake',
            'alamat' => 'Bogor',
            'nominalKas' => '14000',
            'tanggalKas' => '22-12-06'
        ]);
        DB::table('pemasukan')->insert([
            'npm' => '11121136',
            'nama' => 'Bake',
            'alamat' => 'Bogor',
            'nominalKas' => '21000',
            'tanggalKas' => '22-12-08'
        ]);
    }
}
