<?php

namespace App\Livewire\Dashboard;

use App\Models\Siswa;
use App\Models\Absen;
use Livewire\Component;

class Overview extends Component
{
    public function render()
    {
        $today = now()->format('Y-m-d');
        
        return view('livewire.dashboard.overview', [
            'totalSiswa' => Siswa::count(),
            'hadirHariIni' => Absen::where('date', $today)
                                  ->where('status', 'Hadir')
                                  ->count(),
            'izinHariIni' => Absen::where('date', $today)
                                  ->where('status', 'Izin')
                                  ->count(),
            'alphaHariIni' => Absen::where('date', $today)
                                   ->where('status', 'Alpha')
                                   ->count(),
            'recentAttendances' => Absen::with('siswa')
                                       ->latest()
                                       ->take(5)
                                       ->get()
        ])->layout('livewire.layouts.app');
    }
}