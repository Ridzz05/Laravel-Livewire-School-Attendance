<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    
    public function render()
    {
        $kelas = Kelas::query()
            ->with('waliKelas')
            ->when($this->search, function($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                      ->orWhere('tingkat', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.kelas.index', [
            'kelas' => $kelas
        ])->layout('livewire.layouts.app');
    }

    public function delete($id)
    {
        Kelas::find($id)->delete();
        session()->flash('message', 'Kelas berhasil dihapus.');
    }
}