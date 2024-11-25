<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $nama = '';
    public $tingkat = '';
    public $tahun_ajaran = '';
    public $wali_kelas_id = '';

    protected $rules = [
        'nama' => 'required|min:3|unique:kelas,nama',
        'tingkat' => 'required|in:X,XI,XII',
        'tahun_ajaran' => 'required|numeric|min:2020|max:2099',
        'wali_kelas_id' => 'required|exists:users,id'
    ];

    public function mount()
    {
        $this->tahun_ajaran = date('Y');
    }

    public function save()
    {
        $this->validate();

        Kelas::create([
            'nama' => $this->nama,
            'tingkat' => $this->tingkat,
            'tahun_ajaran' => $this->tahun_ajaran,
            'wali_kelas_id' => $this->wali_kelas_id
        ]);

        session()->flash('message', 'Kelas berhasil ditambahkan.');
        return $this->redirect(route('kelas.index'));
    }

    public function render()
    {
        return view('livewire.kelas.create', [
            'guru_list' => User::where('role', 'guru')->get()
        ])->layout('livewire.layouts.app');
    }
}
