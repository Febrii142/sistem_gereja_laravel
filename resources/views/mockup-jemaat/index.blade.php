@extends('layouts.mockup')

@section('page-title', 'Manajemen Data Jemaat')

@section('content')
<div class="card">
    <h3>Data Jemaat</h3>
    <div style="margin-bottom: 20px;">
        <button class="btn btn-primary">+ Tambah Jemaat Baru</button>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Budi Santoso</td>
                    <td>Laki-laki</td>
                    <td>15/03/1985</td>
                    <td>Jl. Merdeka No. 123</td>
                    <td>081234567890</td>
                    <td>Aktif</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Siti Aminah</td>
                    <td>Perempuan</td>
                    <td>22/07/1990</td>
                    <td>Jl. Sudirman No. 45</td>
                    <td>081298765432</td>
                    <td>Aktif</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Ahmad Wijaya</td>
                    <td>Laki-laki</td>
                    <td>10/11/1978</td>
                    <td>Jl. Gatot Subroto No. 78</td>
                    <td>081356789012</td>
                    <td>Aktif</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
