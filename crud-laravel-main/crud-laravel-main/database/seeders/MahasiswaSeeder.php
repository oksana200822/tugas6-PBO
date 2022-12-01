<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'nama' => 'Febri Tri Prasetyo',
            'nim' => '20051214096',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => 'Jenggolo Permai',
            'kota' => 'Tuban',
            'email'  => 'febri@gmail.com',
            'foto' => 'test',
        ]);
    }
}
