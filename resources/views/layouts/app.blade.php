<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Inventaris Sarpras</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body
    class="
        bg-gray-100
        dark:bg-[#0b1120]
        text-gray-800
        dark:text-gray-200
        min-h-screen
        duration-300
        overflow-x-hidden
    "
>

<div class="flex">

    <!-- SIDEBAR -->

    <aside
        class="
            fixed
            top-0
            left-0
            h-screen
            w-64
            bg-white
            dark:bg-[#111827]
            border-r
            border-gray-200
            dark:border-cyan-500/10
            shadow-xl
            z-50
            duration-300
        "
    >

        <!-- LOGO -->
        

        <div class="flex items-center gap-6 pb-1,5">

    <img
        src="{{ asset('Logo_universitas_kadiri.png') }}"
        class="w-14 h-14 object-contain"
    >

    <div>

        <h1
            class="
                text-xl
                font-bold
                text-blue-600
                dark:text-cyan-400
            "
        >
            SARPRAS
        </h1>

        <p
            class="
                text-xs
                text-gray-500
                dark:text-gray-400
            "
        >
            Inventory System
        </p>

    </div>

</div>

<div class="px-6">

    <div class="flex items-center gap-3 py-5">
       
    </div>

    <hr class="border-gray-200 dark:border-cyan-500/10">

</div>


        <!-- MENU -->

<nav class="px-4 py-5 flex flex-col gap-6">

    <a href="/dashboard" class="menu-item">

    <div class="flex items-center gap-4">

        <i class="fa-solid fa-chart-line menu-icon"></i>

        <span>Dashboard</span>

    </div>

    </a>

    <a href="/barang" class="menu-item">

    <div class="flex items-center gap-4">

        <i class="fa-solid fa-box menu-icon"></i>

        <span>Data Barang</span>

    </div>

    </a>

    <a href="/peminjaman" class="menu-item">

    <div class="flex items-center gap-4">
        
        <i class="fa-solid fa-right-left menu-icon"></i>
        <span>Peminjaman</span>
    
    </div>

    </a>

    <details class="group">

   <summary
    class="
        menu-item
        cursor-pointer
        list-none
        w-full
        flex
        items-center
        justify-between
    "
>

    <div class="flex items-center gap-4">

        <i class="fa-solid fa-file-signature menu-icon"></i>

        <span>Surat Permohonan</span>

    </div>

    <i
        class="
            fa-solid
            fa-chevron-down
            text-xs
            transition-transform
            duration-300
            group-open:rotate-180
        "
    ></i>

</summary>

    <div class="mt-2 ml-11 flex flex-col gap-3">

        <a
            href="/buat-surat-permohonan/create"
            class="submenu-item"
        >
            Buat Surat Permohonan
        </a>

        <a
            href="/surat-permohonan"
            class="submenu-item"
        >
            Data Surat Permohonan
        </a>

    </div>

</details>

    <a href="/berita-acara" class="menu-item">

    <div class="flex items-center gap-4">

    <i class="fa-solid fa-file-circle-check menu-icon"></i>
    <span>Berita Acara</span>

    </div>

    </a>

    <a href="/pemeliharaan" class="menu-item">

    <div class="flex items-center gap-4">

        <i class="fa-solid fa-screwdriver-wrench w-5 text-center"></i>
        <span>Maintenance</span>

    </div>

    </a>

    @if(auth()->user()->role == 'Admin')

    <details class="group">

        <summary
    class="
        menu-item
        cursor-pointer
        list-none
        w-full
        flex
        items-center
        justify-between
    "
    >

    <div class="flex items-center gap-4">

        <i class="fa-solid fa-database menu-icon"></i>

        <span>Master Data</span>

    </div>

    <i
        class="
            fa-solid
            fa-chevron-down
            text-xs
            transition-transform
            duration-300
            group-open:rotate-180
        "
    ></i>

</summary>

        <!-- SUBMENU -->

        <div class="mt-2 ml-11 flex flex-col gap-3">

            <a href="/kategori" class="submenu-item">
                Kategori
            </a>

            <a href="/merk" class="submenu-item">
                Merk
            </a>

            <a href="/lokasi" class="submenu-item">
                Lokasi
            </a>

            <a href="/status" class="submenu-item">
                Status
            </a>

            <a href="/user" class="submenu-item">
                User
            </a>

        </div>

    </details>

    <a href="/laporan" class="menu-item">

    <div class="flex items-center gap-4">

        <i class="fa-solid fa-file-pdf menu-icon"></i>
        <span>Laporan</span>

    </div>

    </a>

    @endif

    

</nav>

    </aside>

    <!-- CONTENT -->

    <div class="flex-1 ml-64">

        <!-- TOPBAR -->

        <header
            class="
                sticky
                top-0
                z-40
                bg-white
                dark:bg-[#111827]
                border-b
                border-gray-200
                dark:border-cyan-500/10
                px-6
                py-4
                flex
                justify-between
                items-center
                duration-300
            "
        >

            <h1
                class="
                    text-xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Sistem Inventaris Sarpras
            </h1>

            <div class="flex items-center gap-4">

                <!-- DARKMODE -->

                <button
                    onclick="toggleTheme()"
                    id="themeBtn"
                    class="
                        w-10
                        h-10
                        rounded-xl
                        bg-gray-200
                        dark:bg-cyan-500/20
                        dark:text-cyan-400
                        hover:scale-110
                        duration-200
                    "
                >

                    <i class="fa-solid fa-moon"></i>

                </button>

                <!-- QR QUICK -->

<a
    href="/scan"
    class="
        w-10
        h-10
        rounded-xl
        bg-gray-200
        dark:bg-[#1e293b]
        text-gray-700
        dark:text-cyan-400
        flex
        items-center
        justify-center
        hover:scale-105
        duration-200
    "
>

    <i class="fa-solid fa-qrcode"></i>

</a>

<!-- NOTIF -->

<div class="relative">

    <button
        onclick="toggleNotif()"
        class="
            relative
            w-10
            h-10
            rounded-xl
            bg-gray-200
            dark:bg-[#1e293b]
            text-gray-700
            dark:text-cyan-400
            hover:scale-105
            duration-200
        "
    >

        <i class="fa-solid fa-bell"></i>

        @if(count($logs) > 0)

        <span
            class="
                absolute
                -top-1
                -right-1
                bg-red-500
                text-white
                text-[10px]
                px-1.5
                rounded-full
            "
        >
            {{ count($logs) }}
        </span>

        @endif

    </button>

    <!-- DROPDOWN -->

    <div
        id="notifDropdown"
        class="
            hidden
            absolute
            right-0
            mt-3
            w-96
            bg-white
            dark:bg-[#111827]
            rounded-2xl
            shadow-2xl
            border
            border-gray-200
            dark:border-cyan-500/20
            overflow-hidden
            z-50
        "
    >

        <div
            class="
                px-5
                py-4
                border-b
                border-gray-200
                dark:border-cyan-500/10
            "
        >

            <h2
                class="
                    font-bold
                    text-lg
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Log Aktivitas
            </h2>

        </div>

        <div class="max-h-96 overflow-y-auto">

            @forelse($logs as $log)

            <div
                class="
                    px-5
                    py-4
                    border-b
                    border-gray-100
                    dark:border-cyan-500/5
                    hover:bg-gray-50
                    dark:hover:bg-cyan-500/5
                    duration-200
                "
            >

                <div class="flex gap-3 items-start">

                    <div
                        class="
                            min-w-[42px]
                            h-10
                            rounded-full
                            bg-cyan-500/10
                            flex
                            items-center
                            justify-center
                            text-cyan-400
                        "
                    >

                        <i class="fa-solid fa-clock-rotate-left"></i>

                    </div>

                    <div class="flex-1">

                        <span
                            class="
                                text-sm
                                font-semibold
                                text-cyan-400
                            "
                        >
                            {{ $log->username }}
                        </span>

                        <p
                            class="
                                text-sm
                                text-gray-700
                                dark:text-gray-200
                                leading-relaxed
                                mt-1
                            "
                        >
                            {{ $log->aktivitas }}
                        </p>

                    </div>

                </div>

            </div>

            @empty

            <div class="p-5 text-center text-gray-500">
                Belum ada aktivitas
            </div>

            @endforelse

        </div>

    </div>

</div>
<div class="relative">

    <button
        onclick="toggleUserMenu()"
        class="
            flex
            items-center
            gap-3
            px-3
            py-2
            rounded-xl
            hover:bg-gray-100
            dark:hover:bg-cyan-500/10
            duration-200
        "
    >

        @if(auth()->user()->foto)

                <img
                    src="{{ asset(auth()->user()->foto) }}"
                    class="
                        w-12
                        h-12
                        rounded-full
                        object-cover
                        border-2
                        border-cyan-400
                    "
                >

                @else

                <img
                    src="https://ui-avatars.com/api/?name={{ auth()->user()->username }}"
                    class="
                        w-12
                        h-12
                        rounded-full
                        border-2
                        border-cyan-400
                    "
                >

                @endif

        <div class="text-left">

            <p class="text-sm font-semibold">
                {{ auth()->user()->username }}
            </p>

            <p class="text-xs text-cyan-500">
                {{ auth()->user()->role }}
            </p>

        </div>

        <i class="fa-solid fa-chevron-down text-xs"></i>

    </button>

    <!-- DROPDOWN -->

    <div
        id="userDropdown"
        class="
            hidden
            absolute
            right-0
            mt-3
            w-52
            bg-white
            dark:bg-[#111827]
            border
            border-gray-200
            dark:border-cyan-500/10
            rounded-2xl
            shadow-xl
            overflow-hidden
            z-50
        "
    >

        <a
            href="/profile"
            class="
                flex
                items-center
                gap-3
                px-4
                py-3
                hover:bg-gray-100
                dark:hover:bg-cyan-500/10
                duration-200
            "
        >

            <i class="fa-solid fa-user"></i>

            Profile

        </a>

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                class="
                    w-full
                    flex
                    items-center
                    gap-3
                    px-4
                    py-3
                    hover:bg-red-500/10
                    hover:text-red-400
                    duration-200
                "
            >

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </button>

        </form>

    </div>

</div>

        </header>

        <!-- PAGE -->

        <main
            class="
                p-6
                min-h-screen
            "
        >

            @if(session('success'))

            <div
                class="
                    bg-green-100
                    dark:bg-green-500/20
                    text-green-700
                    dark:text-green-400
                    p-4
                    rounded-xl
                    mb-6
                "
            >
                {{ session('success') }}
            </div>

            @endif

            @if(session('error'))

            <div
                class="
                    bg-red-100
                    dark:bg-red-500/20
                    text-red-700
                    dark:text-red-400
                    p-4
                    rounded-xl
                    mb-6
                "
            >
                {{ session('error') }}
            </div>

            @endif

            @yield('content')

        </main>

    </div>

</div>

<style>

.menu-item{
    @apply flex items-center;
    @apply gap-4;
    @apply px-4 py-3;
    @apply rounded-2xl;
    @apply text-sm font-medium;
    @apply transition-all duration-300;
    @apply text-gray-700 dark:text-gray-300;
}

.menu-item:hover{
    background: #eff6ff;
    color: #2563eb;
    transform: translateX(4px);
}

.dark .menu-item:hover{
    background: rgba(34,211,238,0.10);
    color: #22d3ee;

    box-shadow:
        0 0 10px rgba(34,211,238,0.15),
        0 0 20px rgba(34,211,238,0.08);
}

.menu-icon{
    @apply w-5 text-center;
}

.submenu-item{
    @apply block px-4 py-2.5 rounded-xl;
    @apply text-sm;
    @apply transition-all duration-300;
    @apply text-gray-500 dark:text-gray-400;
}

.submenu-item:hover{
    background: #eff6ff;
    color: #2563eb;
    transform: translateX(4px);
}

.dark .submenu-item:hover{
    background: rgba(34,211,238,0.10);
    color: #22d3ee;

    box-shadow:
        0 0 10px rgba(34,211,238,0.10);
}

</style>

<script>

function applyTheme(theme)
{
    if(theme === 'dark')
    {
        document.documentElement.classList.add('dark');

        document.getElementById('themeBtn').innerHTML =
            '<i class="fa-solid fa-sun"></i>';
    }
    else
    {
        document.documentElement.classList.remove('dark');

        document.getElementById('themeBtn').innerHTML =
            '<i class="fa-solid fa-moon"></i>';
    }
}

function toggleTheme()
{
    const current =
        localStorage.getItem('theme');

    if(current === 'dark')
    {
        localStorage.setItem('theme', 'light');
        applyTheme('light');
    }
    else
    {
        localStorage.setItem('theme', 'dark');
        applyTheme('dark');
    }
}

window.onload = function()
{
    const savedTheme =
        localStorage.getItem('theme') || 'light';

    applyTheme(savedTheme);
}

</script>

<script>

function toggleNotif()
{
    const notif =
        document.getElementById(
            'notifDropdown'
        );

    notif.classList.toggle('hidden');
}

window.addEventListener(
    'click',
    function(e)
    {
        const notif =
            document.getElementById(
                'notifDropdown'
            );

        if(
            !e.target.closest('#notifDropdown')
            &&
            !e.target.closest('button')
        )
        {
            notif.classList.add('hidden');
        }
    }
);

</script>

<script>

function toggleUserMenu()
{
    document
        .getElementById('userDropdown')
        .classList.toggle('hidden');
}

</script>

</body>
</html>