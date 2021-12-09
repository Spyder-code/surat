<?php

namespace App\Http\Controllers;

use App\DaftarHadir;
use App\Surat;
use App\SuratType;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
   public function suratMasuk()
   {
      $surat = Surat::all();
      return view('surat.index', compact('surat'));
   }

   public function buatSurat()
   {
      $tipeSurat = SuratType::all();
      return view('surat.buat', compact('tipeSurat'));
   }

   public function kirimSurat(Request $request)
   {
      switch ($request->idSurat) {
         case '1':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'nama'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = new Surat();
            $surat->pemohon = Auth::id();
            $surat->tipe_surat = $request->idSurat;
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->nama_mitra = $request->nama;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return back()->with('message', 'Surat Personalia & SK Berhasil Dikirim');
         case '2':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'nama'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = new Surat();
            $surat->pemohon = Auth::id();
            $surat->tipe_surat = $request->idSurat;
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->nama_mitra = $request->nama;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return back()->with('message', 'Surat Kegiatan Mahasiswa Berhasil Dikirim');
         case '3':
            $validate = $request->validate([
               'perihal'   => 'required|max:255',
               'nama_kegiatan' => 'required|max:255',
               'lokasi_kegiatan'  => 'required|max:255',
               'tgl_pelaksanaan_kegiatan'  => 'required|date',
               'nama_mitra'  => 'required|max:255',
               'tipe_surat'  => 'required',
            ]);
            $validate['no_surat'] = 'invalid';
            $validate['pemohon'] =  Auth::id();
            $surat = Surat::create($validate);
            foreach ($request->anggota as $item) {
               DaftarHadir::create([
                  'surat' => $surat->id,
                  'nama_peserta' => $item,
               ]);
            }
            return back()->with('message', 'Surat Undangan/Daftar Hadir Kegiatan Berhasil Dikirim');
         case '4':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'namamitra'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = new Surat();
            $surat->pemohon = Auth::id();
            $surat->tipe_surat = $request->idSurat;
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->tgl_pelaksanaan_kegiatan = $request->tanggal;
            $surat->nama_mitra = $request->namamitra;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return back()->with('message', 'Surat Tugas Berhasil Dikirim');
         case '5':
            $request->validate([
               'perihal'   => 'required|max:255',
               'namakegiatan' => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'namamitra'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = new Surat();
            $surat->pemohon = Auth::id();
            $surat->tipe_surat = $request->idSurat;
            $surat->perihal = $request->perihal;
            $surat->nama_kegiatan = $request->namakegiatan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->tgl_pelaksanaan_kegiatan = $request->tanggal;
            $surat->nama_mitra = $request->namamitra;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return back()->with('message', 'Surat Berita Acara Berhasil Dikirim');
         default:
            return back()->with('message', 'Pastikan Data Terinput Dengan Benar');
      }
   }

   public function validasiSurat(Request $request)
   {
      $request->validate([
         'idSurat'   => 'required',
      ]);
      $no = Surat::all()->where('tipe_surat', $request->idSurat)->where('status', 1)->count();
      Surat::find($request->idSurat)->update(['status' => 1, 'no_surat' => $no.'/C/FTI/'.date('Y')]);
      return back()->with('message', 'Surat Berhasil Divalidasi');
   }
   
   public function hapusSurat(Request $request)
   {
      $request->validate([
         'idSurat'   => 'required',
      ]);
      Surat::find($request->idSurat)->delete();
      return back()->with('message', 'Surat Berhasil Dihapus');
   }
   
   public function editSurat(Request $request)
   {
      $request->validate([
         'idSurat'   => 'required',
      ]);
      $surat = Surat::find($request->idSurat);
      return view('surat.edit_baru', compact('surat'));
   }
   
   public function updateSurat(Request $request)
   {
      switch ($request->tipeSurat) {
         case '1':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'nama'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = Surat::find($request->idSurat);
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->nama_mitra = $request->nama;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect('/surat-masuk')->with('message', 'Surat Personalia & SK Berhasil Diperbarui');
         case '2':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'nama'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = Surat::find($request->idSurat);
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->nama_mitra = $request->nama;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect('/surat-masuk')->with('message', 'Surat Kegiatan Mahasiswa Berhasil Diperbarui');
         case '3':
            # code...
            break;
         case '4':
            $request->validate([
               'perihal'   => 'required|max:255',
               'tujuan' => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'namamitra'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = Surat::find($request->idSurat);
            $surat->perihal = $request->perihal;
            $surat->tujuan = $request->tujuan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->tgl_pelaksanaan_kegiatan = $request->tanggal;
            $surat->nama_mitra = $request->namamitra;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect('/surat-masuk')->with('message', 'Surat Tugas Berhasil Diperbarui');
         case '5':
            $request->validate([
               'perihal'   => 'required|max:255',
               'namakegiatan' => 'required|max:255',
               'lokasi'  => 'required|max:255',
               'tanggal'  => 'required|date',
               'namamitra'  => 'required|max:255',
               'alamat'  => 'required|max:255',
               'keterangan'  => 'required|max:255',
            ]);
            $surat = Surat::find($request->idSurat);
            $surat->perihal = $request->perihal;
            $surat->nama_kegiatan = $request->namakegiatan;
            $surat->lokasi_kegiatan = $request->lokasi;
            $surat->nama_mitra = $request->namamitra;
            $surat->alamat_mitra = $request->alamat;
            $surat->keterangan = $request->keterangan;
            $surat->save();
            return redirect('/surat-masuk')->with('message', 'Surat Berita Acara Berhasil Diperbarui');
         default:
            return redirect('/surat-masuk')->with('message', 'Pastikan Data Terinput Dengan Benar');
      }
   }
   
   public function download(Surat $surat)
   {
      $pdf = Facade::loadView('pdf.surat', compact('surat'));
      return $pdf->download('surat.pdf');
   }

   public function suratKeluar()
   {
      $surat = Surat::all();
      return view('surat.keluar', compact('surat'));
   }



}