<div class="p-6">
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Edit Mata Pelajaran</h2>
            <a href="{{ route('mapel.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form wire:submit="update">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kode Mata Pelajaran</label>
                        <input type="text" wire:model="kode" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('kode') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Mata Pelajaran</label>
                        <input type="text" wire:model="nama" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea wire:model="deskripsi" rows="3" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        @error('deskripsi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>