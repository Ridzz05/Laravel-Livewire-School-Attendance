<div class="p-6">
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Tambah Kelas Baru</h2>
            <a href="{{ route('kelas.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form wire:submit="save">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                        <input type="text" wire:model="nama" 
                               class="mt-1 block w-full rounded-md border-gray-300"
                               placeholder="Contoh: X IPA 1">
                        @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tingkat</label>
                        <select wire:model="tingkat" class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">Pilih Tingkat</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        @error('tingkat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tahun Ajaran</label>
                        <input type="number" wire:model="tahun_ajaran" 
                               class="mt-1 block w-full rounded-md border-gray-300"
                               min="2020" max="2099">
                        @error('tahun_ajaran') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Wali Kelas</label>
                        <select wire:model="wali_kelas_id" class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">Pilih Wali Kelas</option>
                            @foreach($guru_list as $guru)
                                <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                            @endforeach
                        </select>
                        @error('wali_kelas_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>