<div class="p-6">
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Edit Jadwal Pelajaran</h2>
            <a href="{{ route('jadwal.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form wire:submit="update">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kelas</label>
                        <select wire:model="kelas_id" class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">Pilih Kelas</option>
                            @foreach($kelasList as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Sama seperti form create, hanya judul yang berbeda -->
                    <!-- ... field lainnya sama ... -->

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