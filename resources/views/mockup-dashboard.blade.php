@extends('layouts.mockup')

@section('page-title', 'Dashboard Utama')

@section('content')
<div class="stats-grid">
    <div class="stat-card primary">
        <h3>Total Jemaat</h3>
        <div class="number">1,234</div>
    </div>
    <div class="stat-card success">
        <h3>Hadir Minggu Ini</h3>
        <div class="number">856</div>
    </div>
    <div class="stat-card warning">
        <h3>Kegiatan Bulan Ini</h3>
        <div class="number">12</div>
    </div>
    <div class="stat-card info">
        <h3>Persembahan Bulan Ini</h3>
        <div class="number">Rp 45,5 Jt</div>
    </div>
</div>

<div class="card">
    <h3>Kegiatan Mendatang</h3>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Waktu</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>14 Jan 2026</td>
                <td>Ibadah Minggu</td>
                <td>08:00 - 10:00</td>
                <td>Gedung Utama</td>
            </tr>
            <tr>
                <td>17 Jan 2026</td>
                <td>Persekutuan Pemuda</td>
                <td>19:00 - 21:00</td>
                <td>Ruang Pemuda</td>
            </tr>
            <tr>
                <td>21 Jan 2026</td>
                <td>Ibadah Minggu</td>
                <td>08:00 - 10:00</td>
                <td>Gedung Utama</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
