<?php

namespace App\Livewire\Jadwal;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Jadwal $jadwal;
    public $kelas_id;
    public $mapel_id;
    public $guru_id;
    public $hari;
    public $jam_mulai;
    public $jam_selesai;

    public function mount(Jadwal $jadwal)
    {
        $this->jadwal = $jadwal;
        $this->kelas_id = $jadwal->kelas_id;
        $this->mapel_id = $jadwal->mapel_id;
        $this->guru_id = $jadwal->guru_id;
        $this->hari = $jadwal->hari;
        $this->jam_mulai = $jadwal->jam_mulai->format('H:i');
        $this->jam_selesai = $jadwal->jam_selesai->format('H:i');
    }

    protected function rules()
    {
        return [
            'kelas_id' => 'required|exists:kelas,id',
            'mapel_id' => 'required|exists:mapels,id',
            'guru_id' => 'required|exists:users,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai'
        ];
    }

    public function update()
    {
        $this->validate();

        $this->jadwal->update([
            'kelas_id' => $this->kelas_id,
            'mapel_id' => $this->mapel_id,
            'guru_id' => $this->guru_id,
            'hari' => $this->hari,
            'jam_mulai' => $this->jam_mulai,
            'jam_selesai' => $this->jam_selesai
        ]);

        session()->flash('message', 'Jadwal berhasil diperbarui.');
        return $this->redirect(route('jadwal.index'));
    }

    public function render()
    {
        return view('livewire.jadwal.edit', [
            'kelasList' => Kelas::all(),
            'mapelList' => Mapel::all(),
            'guruList' => User::where('role', 'guru')->get()
        ])->layout('livewire.layouts.app');
    }
}
