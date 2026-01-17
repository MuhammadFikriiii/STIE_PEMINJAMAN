<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Surat Peminjaman Ruangan</title>

    <style>
        @page {
            size: A4;
            margin: 1cm 2.5cm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            color: #000;
            line-height: 1.3;
        }

        .bg-layout {
            background-image: url("{{ public_path('img/logo-layout.png') }}");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 80%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            vertical-align: top;
        }

        .text-justify {
            text-align: justify;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        .mb-1 {
            margin-bottom: 5px;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .mt-2 {
            margin-top: 10px;
        }

        .mt-4 {
            margin-top: 20px;
        }

        .pl-custom {
            padding-left: 2.5cm;
        }

        .meta-table td {
            padding-bottom: 2px;
        }

        .content-table td {
            padding: 3px 0;
        }

        .signature-section {
            float: right;
            width: 45%;
            text-align: left;
            margin-top: 20px;
        }

        .footer-info {
            position: fixed;
            bottom: 0;
            left: 0;
            font-size: 10pt;
        }
    </style>
</head>

<body class="bg-layout">

    <div style="width: 100%; margin-bottom: 2px;">
        <img src="{{ public_path('image/head.png') }}" style="width: 100%; height: auto;">
    </div>

    <table class="meta-table">
        @php
            $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
            $bulanRomawi = $romawi[$data->created_at->format('n') - 1];
        @endphp

        <tr>
            <td width="13%">Nomor</td>
            <td width="2%">:</td>
            <td width="45%">
                {{ str_pad($data->id, 3, '0', STR_PAD_LEFT) }}/PR/{{ $data->created_at->format('d') }}/{{ $bulanRomawi }}/{{ $data->created_at->format('Y') }}
            </td>
            <td width="40%" class="text-right">
                Banjarmasin, {{ $data->created_at->translatedFormat('d F Y') }}
            </td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>-</td>
            <td></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td class="font-bold">Permohonan Izin Peminjaman Ruangan</td>
            <td></td>
        </tr>
    </table>

    <br>

    <div>
        <b>Kepada Yth.</b><br>
        Ketua STIE Pancasetia<br>
        di -<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Tempat</b>
    </div>

    <br>

    <div class="text-justify">
        Dengan hormat,<br>
        Sehubungan dengan adanya permohonan peminjaman ruangan, bersama ini kami sampaikan
        bahwa pemohon di bawah ini :
    </div>

    <br>

    <div class="pl-custom">
        <table class="content-table">
            <tr>
                <td width="30%">Nama Peminjam</td>
                <td width="5%">:</td>
                <td width="65%" class="font-bold">{{ $data->user->name }}</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td>{{ $data->no_hp }}</td>
            </tr>
            <tr>
                <td>Ruangan</td>
                <td>:</td>
                <td>{{ $data->room->nama_ruangan }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($data->tgl_pinjam)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{ substr($data->waktu_mulai, 0, 5) }} - {{ substr($data->waktu_selesai, 0, 5) }}</td>
            </tr>
        </table>
    </div>

    <br>

    <div class="text-justify">
        Bermaksud meminjam fasilitas kampus untuk kegiatan tersebut.
    </div>

    <div class="text-justify mt-2">
        Dengan ini permohonan peminjaman ruangan tersebut
        <b>{{ $data->status === 'diterima' ? 'TELAH DISETUJUI' : 'SEDANG DALAM PROSES' }}</b>
        sesuai ketentuan yang berlaku.
    </div>

    <div class="text-justify mt-2">
        Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.
        Atas perhatian dan kerjasamanya kami ucapkan terima kasih.
    </div>

    <div class="signature-section">
        Ketua STIE Pancasetia,<br>

        @if($data->status === 'diterima')
            <img src="{{ public_path('img/ttd-ketua.png') }}" width="150" style="margin: 10px 0;">
        @else
            <br><br><br><br>
        @endif

        <br>
        <b><u>Dr. Sutrisno, S.E., M.M</u></b><br>
        NIK. 19670512 200501 1 001
    </div>

    <div class="footer-info">
        Contact Person : {{ $data->user->name }}<br>
        HP : {{ $data->no_hp }}
    </div>

</body>

</html>