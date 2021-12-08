<?php

use App\SuratType;
use Illuminate\Database\Seeder;

class SuratTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuratType::insert([
            ['nama'=>'Surat Personalia & SK'],
            ['nama'=>'Surat Kegiatan Mahasiswa'],
            ['nama'=>'Surat Undagan/Daftar Hadir Kegiatan'],
            ['nama'=>'Surat Tugas'],
            ['nama'=>'Surat Berita Acara'],
        ]);
    }
}
