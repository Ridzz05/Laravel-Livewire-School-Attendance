<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Kelas</h2>
        <a href="{{ route('kelas.create') }}" 
           class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Tambah Kelas
        </a>
    </div>

    <div class="mb-4">
        <input type="text" 
               wire:model.live.debounce.300ms="search"
               placeholder="Cari kelas..."
               class="w-full rounded-lg border-gray-300">
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tingkat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tahun Ajaran</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Wali Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($kelas as $k)
                <tr>
                    <td class="px-6 py-4">{{ $k->nama }}</td>
                    <td class="px-6 py-4">{{ $k->tingkat }}</td>
                    <td class="px-6 py-4">{{ $k->tahun_ajaran }}</td>
                    <td class="px-6 py-4">{{ $k->waliKelas->name }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('kelas.edit', $k) }}" 
                           class="text-blue-600 hover:text-blue-800">Edit</a>
                        <button wire:click="delete({{ $k->id }})"
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
            {{ $kelas->links() }}
        </div>
    </div>
</div>