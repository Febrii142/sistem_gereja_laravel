@extends('layouts.mockup')

@section('page-title', 'Jadwal Ibadah dan Kegiatan')

@section('content')
<div class="card">
    <h3>Jadwal Kegiatan</h3>
    <div style="margin-bottom: 20px;">
        <button class="btn btn-primary">+ Tambah Jadwal Baru</button>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Hari/Tanggal</th>
                    <th>Jenis Kegiatan</th>
                    <th>Waktu</th>
                    <th>Pembicara/PIC</th>
                    <th>Lokasi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Minggu, 14 Jan 2026</td>
                    <td>Ibadah Minggu</td>
                    <td>08:00 - 10:00</td>
                    <td>Pdt. Yohanes</td>
                    <td>Gedung Utama</td>
                    <td>Tema: Kasih Tuhan</td>
                </tr>
                <tr>
                    <td>Rabu, 17 Jan 2026</td>
                    <td>Persekutuan Pemuda</td>
                    <td>19:00 - 21:00</td>
                    <td>Tim Pemuda</td>
                    <td>Ruang Pemuda</td>
                    <td>Diskusi & Sharing</td>
                </tr>
                <tr>
                    <td>Kamis, 18 Jan 2026</td>
                    <td>Doa Pagi</td>
                    <td>05:30 - 06:30</td>
                    <td>Tim Intercessor</td>
                    <td>Kapel</td>
                    <td>Doa Syafaat</td>
                </tr>
                <tr>
                    <td>Minggu, 21 Jan 2026</td>
                    <td>Ibadah Minggu</td>
                    <td>08:00 - 10:00</td>
                    <td>Pdt. Maria</td>
                    <td>Gedung Utama</td>
                    <td>Tema: Iman Sejati</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
