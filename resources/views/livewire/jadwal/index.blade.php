<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Jadwal Pelajaran</h2>
        <a href="{{ route('jadwal.create') }}" 
           class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Tambah Jadwal
        </a>
    </div>

    <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-4">
        <select wire:model.live="selectedKelas" class="rounded-lg border-gray-300">
            <option value="">Semua Kelas</option>
            @foreach($kelasList as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
            @endforeach
        </select>

        <select wire:model.live="hari" class="rounded-lg border-gray-300">
            <option value="">Semua Hari</option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
        </select>

        <input type="text" 
               wire:model.live.debounce.300ms="search"
               placeholder="Cari mapel atau guru..."
               class="rounded-lg border-gray-300">
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mata Pelajaran</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Guru</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($jadwals as $jadwal)
                <tr>
                    <td class="px-6 py-4">{{ $jadwal->hari }}</td>
                    <td class="px-6 py-4">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                    <td class="px-6 py-4">{{ $jadwal->kelas->nama }}</td>
                    <td class="px-6 py-4">{{ $jadwal->mapel->nama }}</td>
                    <td class="px-6 py-4">{{ $jadwal->guru->name }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('jadwal.edit', $jadwal) }}" 
                           class="text-blue-600 hover:text-blue-800">Edit</a>
                        <button wire:click="delete({{ $jadwal->id }})"
                                class="text-red-600 hover:text-red-800"
                                onclick="return confirm('Yakin ingin menghapus?')">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="px-6 py-4">
            {{ $jadwals->links() }}
        </div>
    </div>
</div>