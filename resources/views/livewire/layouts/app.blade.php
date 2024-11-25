<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Admin Panel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body x-data="{ sidebarOpen: false }" 
      class="bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Overlay untuk mobile -->
        <div x-show="sidebarOpen" 
             class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false">
        </div>

        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-30 flex flex-col flex-shrink-0 w-64 bg-white border-r border-gray-200 transition-all duration-300 ease-in-out transform lg:transform-none lg:translate-x-0"
               :class="{'translate-x-0 shadow-lg': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            <livewire:components.sidebar />
        </aside>

        <!-- Content area -->
        <div class="lg:pl-64 flex flex-col flex-1">
            <livewire:components.navbar />
            <livewire:components.breadcrumbs />
            <main class="flex-1 p-4 md:p-6">
                {{ $slot }}
            </main>
            <livewire:components.footer />
        </div>
    </div>

    @livewireScripts
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function notify(message, type = 'success') {
            window.dispatchEvent(new CustomEvent('notify', {
                detail: { message, type }
            }));
        }
    </script>
</body>
</html>