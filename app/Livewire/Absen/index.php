<?php

namespace App\Livewire\Absen;

use Livewire\Component;
use App\Models\Absen;
use App\Models\Siswa;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $date;
    public $search = '';
    
    public function mount()
    {
        $this->date = now()->format('Y-m-d');
    }

    public function render()
    {
        $siswas = Siswa::query()
            ->when($this->search, function($query) {
                $query->where('nama', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.absen.index', [
            'siswas' => $siswas
        ])->layout('livewire.layouts.app');
    }

    public function markAttendance($studentId, $status)
    {
        Absen::updateOrCreate(
            [
                'siswa_id' => $studentId,
                'date' => $this->date
            ],
            ['status' => $status]
        );

        $this->emit('attendanceMarked');
    }
}