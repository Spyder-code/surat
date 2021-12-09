<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $fillable = [
        'no_surat',
        'pemohon',
        'tipe_surat',
        'perihal',
        'tujuan',
        'nama_mitra',
        'alamat_mitra',
        'nama_kegiatan',
        'lokasi_kegiatan',
        'tgl_pelaksanaan_kegiatan',
        'keterangan',
        'file',
        'status',
        'nama_ttd',
        'nik_ttd',
        'ttd_sebagai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'pemohon');
    }

    public function jenis()
    {
        return $this->belongsTo(SuratType::class,'tipe_surat');
    }
}
