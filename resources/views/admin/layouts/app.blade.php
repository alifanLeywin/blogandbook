<!DOCTYPE html>
<html lang="en" id="htmlRoot">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name') }}</title>
    <script>
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css " />
</head>
<body class="bg-gray-100 dark:bg-gray-800 min-h-screen flex text-gray-800">

<!-- Sidebar -->
@include('admin.layouts.sidebar')

<!-- Content -->
<div id="mainContent" class="flex-1 flex flex-col transition-all duration-300">
    <!-- Navbar -->
    @include('admin.layouts.topbar')

    <!-- Main Content -->
    <main class="p-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>
</div>
    {{-- BUAT SIDEBAR TOGGLE --}}
<script>
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');

    // Cek status awal dari localStorage
    if (localStorage.getItem('sidebar-collapsed') === 'true') {
        sidebar.classList.add('sidebar-collapsed');
    }

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('sidebar-collapsed');
        const isCollapsed = sidebar.classList.contains('sidebar-collapsed');
        localStorage.setItem('sidebar-collapsed', isCollapsed);
    });
</script>

    {{-- BUAT DROPDOWN TOPBAR --}}
<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
        dropdown.classList.toggle('opacity-0');
        dropdown.classList.toggle('scale-95');
    }

    // Tutup dropdown kalau klik di luar
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('userDropdown');
        const button = event.target.closest('[onclick*="toggleDropdown"]');

        if (!dropdown.contains(event.target) && !button) {
            if (!dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden', 'opacity-0', 'scale-95');
            }
        }
    });
</script>

    {{-- DARKMODE --}}
<script>
    const htmlEl = document.getElementById('htmlRoot');
    const darkModeIcon = document.getElementById('darkModeIcon');

   function setDarkMode(enabled) {
        if (enabled) {
            htmlEl.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            if (darkModeIcon) {
                darkModeIcon.classList.remove('fa-moon');
                darkModeIcon.classList.add('fa-sun');
            }
        } else {
            htmlEl.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            if (darkModeIcon) {
                darkModeIcon.classList.remove('fa-sun');
                darkModeIcon.classList.add('fa-moon');
            }
        }
    }

    function toggleDarkMode() {
        const isDark = htmlEl.classList.contains('dark');
        setDarkMode(!isDark);
    }

    // Inisialisasi dari localStorage
    document.addEventListener('DOMContentLoaded', () => {
        const storedTheme = localStorage.getItem('theme');
        setDarkMode(storedTheme === 'dark');
    });
</script>

</body>
</html>