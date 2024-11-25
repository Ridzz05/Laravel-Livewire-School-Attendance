<?php

namespace App\Livewire\Jadwal;

use App\Models\Jadwal;
use App\Models\Kelas;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedKelas = '';
    public $hari = '';
    
    public function render()
    {
        $jadwals = Jadwal::query()
            ->with(['kelas', 'mapel', 'guru'])
            ->when($this->selectedKelas, function($query) {
                $query->where('kelas_id', $this->selectedKelas);
            })
            ->when($this->hari, function($query) {
                $query->where('hari', $this->hari);
            })
            ->when($this->search, function($query) {
                $query->whereHas('mapel', function($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                })->orWhereHas('guru', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->paginate(10);

        return view('livewire.jadwal.index', [
            'jadwals' => $jadwals,
            'kelasList' => Kelas::all()
        ])->layout('livewire.layouts.app');
    }

    public function delete($id)
    {
        Jadwal::find($id)->delete();
        session()->flash('message', 'Jadwal berhasil dihapus.');
    }
}