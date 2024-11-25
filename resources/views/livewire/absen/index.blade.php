<div class="p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Absensi Siswa</h2>
    </div>

    <div class="mb-4 flex items-center space-x-4">
        <input type="date" 
               wire:model="date" 
               class="rounded-lg border-gray-300">
               
        <input type="text" 
               wire:model.debounce.300ms="search" 
               placeholder="Cari nama siswa..."
               class="rounded-lg border-gray-300">
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($siswas as $siswa)
                <tr>
                    <td class="px-6 py-4">{{ $siswa->nama }}</td>
                    <td class="px-6 py-4">
                        {{ $student->attendances->where('date', $date)->first()?->status ?? 'Belum Absen' }}
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="markAttendance({{ $student->id }}, 'Hadir')"
                                class="px-3 py-1 bg-green-500 text-white rounded-lg text-sm">
                            Hadir
                        </button>
                        <button wire:click="markAttendance({{ $student->id }}, 'Izin')"
                                class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-sm">
                            Izin
                        </button>
                        <button wire:click="markAttendance({{ $student->id }}, 'Alpha')"
                                class="px-3 py-1 bg-red-500 text-white rounded-lg text-sm">
                            Alpha
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="px-6 py-4">
            {{ $siswas->links() }}
        </div>
    </div>
</div>