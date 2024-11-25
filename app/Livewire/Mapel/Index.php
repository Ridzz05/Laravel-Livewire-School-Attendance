<?php

namespace App\Livewire\Mapel;

use App\Models\Mapel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    
    public function render()
    {
        $mapels = Mapel::query()
            ->when($this->search, function($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                      ->orWhere('kode', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.mapel.index', [
            'mapels' => $mapels
        ])->layout('livewire.layouts.app');
    }

    public function delete($id)
    {
        Mapel::find($id)->delete();
        session()->flash('message', 'Mata pelajaran berhasil dihapus.');
    }
}