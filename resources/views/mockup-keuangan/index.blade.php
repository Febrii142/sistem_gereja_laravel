@extends('layouts.mockup')

@section('page-title', 'Keuangan dan Persembahan')

@section('content')
<div class="stats-grid">
    <div class="stat-card success">
        <h3>Pemasukan Bulan Ini</h3>
        <div class="number">Rp 45,5 Jt</div>
    </div>
    <div class="stat-card warning">
        <h3>Pengeluaran Bulan Ini</h3>
        <div class="number">Rp 32,8 Jt</div>
    </div>
    <div class="stat-card primary">
        <h3>Saldo</h3>
        <div class="number">Rp 12,7 Jt</div>
    </div>
</div>

<div class="card">
    <h3>Riwayat Transaksi</h3>
    <div style="margin-bottom: 20px;">
        <button class="btn btn-success">+ Catat Pemasukan</button>
        <button class="btn btn-primary" style="margin-left: 10px;">+ Catat Pengeluaran</button>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>14 Jan 2026</td>
                    <td>Pemasukan</td>
                    <td>Persembahan Ibadah</td>
                    <td>Persembahan Minggu</td>
                    <td style="color: #2ecc71;">+ Rp 15,500,000</td>
                </tr>
                <tr>
                    <td>13 Jan 2026</td>
                    <td>Pengeluaran</td>
                    <td>Operasional</td>
                    <td>Listrik & Air</td>
                    <td style="color: #e74c3c;">- Rp 2,500,000</td>
                </tr>
                <tr>
                    <td>12 Jan 2026</td>
                    <td>Pengeluaran</td>
                    <td>Pemeliharaan</td>
                    <td>Perbaikan AC</td>
                    <td style="color: #e74c3c;">- Rp 3,800,000</td>
                </tr>
                <tr>
                    <td>07 Jan 2026</td>
                    <td>Pemasukan</td>
                    <td>Persembahan Ibadah</td>
                    <td>Persembahan Minggu</td>
                    <td style="color: #2ecc71;">+ Rp 14,200,000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
