<?php

namespace App\Livewire\Mapel;

use App\Models\Mapel;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public Mapel $mapel;
    public $nama;
    public $kode;
    public $deskripsi;

    public function mount(Mapel $mapel)
    {
        $this->mapel = $mapel;
        $this->nama = $mapel->nama;
        $this->kode = $mapel->kode;
        $this->deskripsi = $mapel->deskripsi;
    }

    protected function rules()
    {
        return [
            'nama' => 'required|min:3',
            'kode' => ['required', Rule::unique('mapels', 'kode')->ignore($this->mapel->id)],
            'deskripsi' => 'nullable'
        ];
    }

    public function update()
    {
        $this->validate();

        $this->mapel->update([
            'nama' => $this->nama,
            'kode' => $this->kode,
            'deskripsi' => $this->deskripsi
        ]);

        session()->flash('message', 'Mata pelajaran berhasil diperbarui.');
        return $this->redirect(route('mapel.index'));
    }

    public function render()
    {
        return view('livewire.mapel.edit')
            ->layout('livewire.layouts.app');
    }
}