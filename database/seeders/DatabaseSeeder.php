<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // SchoolClassSeeder::class,
            // SchoolMajorSeeder::class,
            // StudentSeeder::class,
            AdministratorSeeder::class,
            PemasukanSeeder::class,
            PengeluaranSeeder::class,
            // CashTransactionSeeder::class,
        ]);
    }
}
