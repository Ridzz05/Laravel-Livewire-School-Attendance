<?php

namespace App\Livewire\Mapel;

use App\Models\Mapel;
use Livewire\Component;

class Create extends Component
{
    public $nama = '';
    public $kode = '';
    public $deskripsi = '';

    protected $rules = [
        'nama' => 'required|min:3',
        'kode' => 'required|unique:mapels,kode',
        'deskripsi' => 'nullable'
    ];

    public function save()
    {
        $this->validate();

        Mapel::create([
            'nama' => $this->nama,
            'kode' => $this->kode,
            'deskripsi' => $this->deskripsi
        ]);

        session()->flash('message', 'Mata pelajaran berhasil ditambahkan.');
        return $this->redirect(route('mapel.index'));
    }

    public function render()
    {
        return view('livewire.mapel.create')
            ->layout('livewire.layouts.app');
    }
}