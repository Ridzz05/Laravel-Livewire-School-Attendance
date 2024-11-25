<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Mata Pelajaran</h2>
        <a href="{{ route('mapel.create') }}" 
           class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Tambah Mata Pelajaran
        </a>
    </div>

    <div class="mb-4">
        <input type="text" 
               wire:model.live.debounce.300ms="search"
               placeholder="Cari mata pelajaran..."
               class="w-full rounded-lg border-gray-300">
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($mapels as $mapel)
                <tr>
                    <td class="px-6 py-4">{{ $mapel->kode }}</td>
                    <td class="px-6 py-4">{{ $mapel->nama }}</td>
                    <td class="px-6 py-4">{{ $mapel->deskripsi }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('mapel.edit', $mapel) }}" 
                           class="text-blue-600 hover:text-blue-800">Edit</a>
                        <button wire:click="delete({{ $mapel->id }})"
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
            {{ $mapels->links() }}
        </div>
    </div>
</div>