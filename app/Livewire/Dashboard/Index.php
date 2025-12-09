<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Jemaat;
use App\Models\Persembahan;
use App\Models\JadwalIbadah;
use App\Models\Komsel;
use App\Models\Pelayanan;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        $stats = [
            'total_jemaat' => Jemaat::count(),
            'jemaat_aktif' => Jemaat::where('is_active', true)->count(),
            'jemaat_tidak_aktif' => Jemaat::where('is_active', false)->count(),
            'persembahan_bulan_ini' => Persembahan::whereMonth('tanggal_persembahan', now()->month)
                ->whereYear('tanggal_persembahan', now()->year)
                ->sum('nominal'),
            'jadwal_minggu_ini' => JadwalIbadah::whereBetween('tanggal_waktu', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])->count(),
            'komsel_aktif' => Komsel::where('is_active', true)->count(),
            'pelayanan_aktif' => Pelayanan::where('is_active', true)->count(),
        ];

        // Recent activity
        $recentJemaats = Jemaat::latest()->take(5)->get();
        $upcomingSchedules = JadwalIbadah::where('tanggal_waktu', '>=', now())
            ->orderBy('tanggal_waktu')
            ->take(5)
            ->get();

        return view('livewire.dashboard.index', [
            'stats' => $stats,
            'recentJemaats' => $recentJemaats,
            'upcomingSchedules' => $upcomingSchedules,
        ])->layout('layouts.app');
    }
}
