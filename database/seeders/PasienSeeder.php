<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pasiens')->truncate();

        // Data pasien dummy
        $data = [
            [
                'nik' => '1234567890123456',
                'nama_lengkap' => 'Budi Santoso',
                'alamat' => 'Jl. Merdeka No. 1',
                'jenis_kelamin' => 'laki-laki',
            ],
            [
                'nik' => '7890123456789012',
                'nama_lengkap' => 'Ana Sulistyaningsih',
                'alamat' => 'Jl. Sudirman No. 2',
                'jenis_kelamin' => 'perempuan',
            ],
            // Tambahkan data dummy lainnya di sini...
        ];

        // Memasukkan data ke tabel
        DB::table('pasiens')->insert($data);

    }
}
