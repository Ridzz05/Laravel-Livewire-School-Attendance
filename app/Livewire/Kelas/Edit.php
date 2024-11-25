<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public Kelas $kelas;
    public $nama;
    public $tingkat;
    public $tahun_ajaran;
    public $wali_kelas_id;

    public function mount(Kelas $kelas)
    {
        $this->kelas = $kelas;
        $this->nama = $kelas->nama;
        $this->tingkat = $kelas->tingkat;
        $this->tahun_ajaran = $kelas->tahun_ajaran;
        $this->wali_kelas_id = $kelas->wali_kelas_id;
    }

    protected function rules()
    {
        return [
            'nama' => ['required', 'min:3', Rule::unique('kelas', 'nama')->ignore($this->kelas->id)],
            'tingkat' => 'required|in:X,XI,XII',
            'tahun_ajaran' => 'required|numeric|min:2020|max:2099',
            'wali_kelas_id' => 'required|exists:users,id'
        ];
    }

    public function update()
    {
        $this->validate();

        $this->kelas->update([
            'nama' => $this->nama,
            'tingkat' => $this->tingkat,
            'tahun_ajaran' => $this->tahun_ajaran,
            'wali_kelas_id' => $this->wali_kelas_id
        ]);

        session()->flash('message', 'Kelas berhasil diperbarui.');
        return $this->redirect(route('kelas.index'));
    }

    public function render()
    {
        return view('livewire.kelas.edit', [
            'guru_list' => User::where('role', 'guru')->get()
        ])->layout('livewire.layouts.app');
    }
}
