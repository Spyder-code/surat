<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas</title>
</head>
<body style="font-family: 'Times New Roman', Times, serif;">
    <h2 style="text-align: center;"><u>Surat Tugas</u></h2>
    <p style="position: relative; top: -15px ;text-align: center;"><i>{{ $surat->no_surat }}</i></p>
    <div style="margin: 0 20px; position: relative; top: -10px">
        <p style="text-align: justify;">Sehubung permintaan dari {{ $surat->nama_mitra }}, untuk ini Dekan Fakultas Teknologi Informasi Universitas Kristen Duta Wacana Yogyakarta memberikan tugas kepada dosen tersebut dibawah ini:</p>
        <table style="border: none; margin: 0 auto; width: 50%;">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $surat->user->name }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $surat->user->username }}</td>
            </tr>
        </table>
        <p style="text-align: justify;">Untuk bertugas sebagai narasumber dalam pembekalan Alumni Evangelisasi pribadi Surabaya, yang diselenggarakan pada:</p>
        <table style="border: none; margin: 0 auto; width: 50%;">
            <tr>
                <td>Hari/tanggal</td>
                <td>:</td>
                <td>{{ date('d F Y', strtotime($surat->tgl_pelaksanaan_kegiatan)) }}</td>
            </tr>
            <tr>
                <td>Tema</td>
                <td>:</td>
                <td>{{ $surat->tujuan }}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{ $surat->lokasi_kegiatan }}</td>
            </tr>
        </table>
        <p style="text-align: justify;">Demikian Surat Tugas ini dibuat dengan sebenarnya, untuk dapat dipergunakan sebagaimana mestinya.</p>
        <div style="display: flex; justify-content: space-between;">
            <div style="text-align: center;">
                <p>Yogyakarta, {{ date('d F Y', strtotime($surat->updated_at)) }}</p>
                <p>{{ $surat->ttd_sebagai }}</p><br><br><br>
                <p>({{ $surat->nama_ttd }})</p>
            </div>
        </div>
    </div>
</body>
</html>