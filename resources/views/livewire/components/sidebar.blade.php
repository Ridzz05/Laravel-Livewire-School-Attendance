<div class="flex flex-col h-full bg-white border-r border-gray-200"
     x-data="{ 
        sidebarOpen: false,
        jadwalOpen: false,
        currentRoute: '{{ request()->route()->getName() }}'
     }">
    <!-- Logo dan Close Button -->
    <div class="flex items-center justify-between flex-shrink-0 px-4 py-4 border-b">
        <a href="{{ route('dashboard') }}" class="text-xl font-semibold text-gray-800">
            Admin Panel
        </a>
        <!-- Close button untuk mobile -->
        <button type="button"
                class="p-2 -mr-2 rounded-md lg:hidden"
                @click="sidebarOpen = false">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 space-y-1 overflow-y-auto">
        <div class="py-4 space-y-1">
            <!-- Dashboard Link -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center px-4 py-2 text-sm {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg group">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard Absensi
            </a>

            <!-- Users Link -->
            <a href="{{ route('users.index') }}" 
               class="flex items-center px-4 py-2 text-sm {{ request()->routeIs('users.*') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg group">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Data Guru
            </a>

            <!-- Menu Absensi Siswa -->
            <a href="{{ route('absen.index') }}" 
               class="flex items-center px-4 py-2 text-sm {{ request()->routeIs('absen.*') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg group">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                Absensi Siswa
            </a>

            <!-- Menu Jadwal Pelajaran -->
            <div class="space-y-1" 
                 x-init="jadwalOpen = currentRoute.startsWith('jadwal.')">
                <button type="button"
                        @click="jadwalOpen = !jadwalOpen"
                        class="flex items-center justify-between w-full px-4 py-2 text-sm rounded-lg group"
                        :class="currentRoute.startsWith('jadwal.') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100'">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Jadwal Pelajaran
                    </div>
                    <svg class="w-4 h-4 transition-transform duration-200" 
                         :class="{ 'rotate-180': jadwalOpen }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <div x-show="jadwalOpen"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="pl-11 space-y-1">
                    <a href="{{ route('jadwal.index') }}" 
                       class="block px-4 py-2 text-sm rounded-lg transition-colors duration-150"
                       :class="currentRoute === 'jadwal.index' ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100'">
                        Daftar Jadwal
                    </a>
                    <a href="{{ route('jadwal.create') }}" 
                       class="block px-4 py-2 text-sm rounded-lg transition-colors duration-150"
                       :class="currentRoute === 'jadwal.create' ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100'">
                        Tambah Jadwal
                    </a>
                </div>
            </div>

            <!-- Menu Mata Pelajaran -->
            <a href="{{ route('mapel.index') }}" 
               class="flex items-center px-4 py-2 text-sm {{ request()->routeIs('mapel.*') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg group">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Mata Pelajaran
            </a>

            <!-- Menu Kelas -->
            <a href="{{ route('kelas.index') }}" 
               class="flex items-center px-4 py-2 text-sm {{ request()->routeIs('kelas.*') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }} rounded-lg group">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                Data Kelas
            </a>
        </div>
    </nav>

    <!-- User profile di sidebar -->
    <div class="flex items-center p-4 border-t">
        <img class="w-8 h-8 rounded-full" 
             src="https://ui-avatars.com/api/?name=Admin+User" 
             alt="User avatar">
        <div class="ml-3">
            <p class="text-sm font-medium text-gray-700">Admin User</p>
            <p class="text-xs text-gray-500">admin@example.com</p>
        </div>
    </div>
</div>