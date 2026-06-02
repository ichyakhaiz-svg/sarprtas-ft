@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <!-- HEADER -->

   
    <div
    class="
        relative
        overflow-hidden
        rounded-3xl
        bg-gradient-to-r
        from-cyan-500
        via-blue-600
        to-indigo-700
        p-8
        shadow-2xl
        text-white
    "
>

    <div class="relative z-10">

        <h1 class="text-4xl font-bold">

            Selamat Datang,
            {{ auth()->user()->username }}

        </h1>

        <p class="mt-3 text-cyan-100">

            Sistem Inventaris Sarana dan Prasarana
            Fakultas Teknik Universitas Kadiri

        </p>

        <div class="mt-6 flex gap-3 flex-wrap">

            <a
                href="/barang"
                class="
                    px-5
                    py-3
                    rounded-xl
                    bg-white/20
                    hover:bg-white/30
                "
            >
                Data Barang
            </a>

            <a
                href="/peminjaman"
                class="
                    px-5
                    py-3
                    rounded-xl
                    bg-white/20
                    hover:bg-white/30
                "
            >
                Peminjaman
            </a>

            <a
                href="/pemeliharaan"
                class="
                    px-5
                    py-3
                    rounded-xl
                    bg-white/20
                    hover:bg-white/30
                "
            >
                Maintenance
            </a>

        </div>

    </div>

    <i
        class="
            fa-solid
            fa-building-columns
            absolute
            right-8
            bottom-0
            text-[120px]
            text-white/10
        "
    ></i>

</div>

    <!-- CARD -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

        <!-- TOTAL BARANG -->

        <div
            class="
                bg-white
                dark:bg-[#111827]
                border
                border-gray-200
                dark:border-cyan-500/20
                rounded-2xl
                shadow-lg
                dark:shadow-[0_0_25px_rgba(0,255,255,0.08)]
                p-6
                border-l-4
                border-blue-500
                duration-300
            "
        >

            <div class="flex justify-between items-center">

                <div>

                    <p
                        class="
                            text-gray-500
                            dark:text-gray-400
                        "
                    >
                        Total Barang
                    </p>

                    <h1
                        class="
                            text-4xl
                            font-bold
                            mt-2
                            text-gray-800
                            dark:text-cyan-400
                        "
                    >
                        {{ $totalBarang }}
                    </h1>

                </div>

                <div
                    class="
                        bg-blue-100
                        dark:bg-cyan-500/20
                        text-blue-600
                        dark:text-cyan-400
                        p-4
                        rounded-xl
                    "
                >

                    <i class="fa-solid fa-box text-2xl"></i>

                </div>

            </div>

        </div>

        <!-- DIPINJAM -->

        <div
            class="
                bg-white
                dark:bg-[#111827]
                border
                border-gray-200
                dark:border-cyan-500/20
                rounded-2xl
                shadow-lg
                dark:shadow-[0_0_25px_rgba(0,255,255,0.08)]
                p-6
                border-l-4
                border-red-500
                duration-300
            "
        >

            <div class="flex justify-between items-center">

                <div>

                    <p
                        class="
                            text-gray-500
                            dark:text-gray-400
                        "
                    >
                        Barang Dipinjam
                    </p>

                    <h1
                        class="
                            text-4xl
                            font-bold
                            mt-2
                            text-gray-800
                            dark:text-red-400
                        "
                    >
                        {{ $barangDipinjam }}
                    </h1>

                </div>

                <div
                    class="
                        bg-red-100
                        dark:bg-red-500/20
                        text-red-600
                        dark:text-red-400
                        p-4
                        rounded-xl
                    "
                >

                    <i class="fa-solid fa-right-left text-2xl"></i>

                </div>

            </div>

        </div>

        <!-- TERSEDIA -->

        <div
            class="
                bg-white
                dark:bg-[#111827]
                border
                border-gray-200
                dark:border-cyan-500/20
                rounded-2xl
                shadow-lg
                dark:shadow-[0_0_25px_rgba(0,255,255,0.08)]
                p-6
                border-l-4
                border-green-500
                duration-300
            "
        >

            <div class="flex justify-between items-center">

                <div>

                    <p
                        class="
                            text-gray-500
                            dark:text-gray-400
                        "
                    >
                        Barang Tersedia
                    </p>

                    <h1
                        class="
                            text-4xl
                            font-bold
                            mt-2
                            text-gray-800
                            dark:text-green-400
                        "
                    >
                        {{ $barangTersedia }}
                    </h1>

                </div>

                <div
                    class="
                        bg-green-100
                        dark:bg-green-500/20
                        text-green-600
                        dark:text-green-400
                        p-4
                        rounded-xl
                    "
                >

                    <i class="fa-solid fa-check text-2xl"></i>

                </div>

            </div>

        </div>

        

        <div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-2xl
        shadow-lg
        p-6
        border
        border-orange-500/20
    "
    >

    <div class="flex justify-between">

        <div>

            <p class="text-gray-500 dark:text-gray-400">
                Maintenance
            </p>

            <h1
                class="
                    text-4xl
                    font-bold
                    text-orange-500
                    mt-2
                "
            >
                {{ $totalMaintenance }}
            </h1>

        </div>

        <div
            class="
                bg-orange-100
                dark:bg-orange-500/20
                p-4
                rounded-xl
            "
        >
            <i
                class="
                    fa-solid
                    fa-screwdriver-wrench
                    text-2xl
                    text-orange-500
                "
            ></i>
        </div>

    </div>

    </div>

    <div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-2xl
        shadow-lg
        p-6
        border
        border-red-500/20
    "
    >

    <div class="flex justify-between">

        <div>

            <p class="text-gray-500 dark:text-gray-400">
                Barang Rusak
            </p>

            <h1
                class="
                    text-4xl
                    font-bold
                    text-red-500
                    mt-2
                "
            >
                {{ $barangRusak }}
            </h1>

        </div>

        <div
            class="
                bg-red-100
                dark:bg-red-500/20
                p-4
                rounded-xl
            "
        >
            <i
                class="
                    fa-solid
                    fa-triangle-exclamation
                    text-2xl
                    text-red-500
                "
            ></i>
        </div>

    </div>

    </div>

    </div>

    <!-- TABEL -->

    <div
        class="
            bg-white
            dark:bg-[#111827]
            border
            border-gray-200
            dark:border-cyan-500/20
            rounded-2xl
            shadow-lg
            dark:shadow-[0_0_25px_rgba(0,255,255,0.08)]
            p-6
            duration-300
        "
    >

        <div class="flex justify-between items-center mb-6">

            <h2
                class="
                    text-xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Peminjaman Terbaru
            </h2>

            <a
                href="/peminjaman"
                class="
                    text-blue-600
                    dark:text-cyan-400
                    hover:text-blue-800
                    dark:hover:text-cyan-300
                    font-medium
                "
            >
                Lihat Semua
            </a>

        </div>

        <div class="overflow-x-auto rounded-xl">

            <table class="w-full">

                <thead>

                    <tr
                        class="
                            bg-blue-600
                            dark:bg-cyan-500/20
                            text-white
                            dark:text-cyan-300
                        "
                    >

                        <th class="p-4 text-left">
                            Barang
                        </th>

                        <th class="p-4 text-left">
                            Peminjam
                        </th>

                        <th class="p-4 text-left">
                            Tanggal
                        </th>

                        <th class="p-4 text-left">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($peminjamanTerbaru as $item)

                    <tr
                        class="
                            border-b
                            border-gray-200
                            dark:border-cyan-500/10
                            hover:bg-gray-50
                            dark:hover:bg-cyan-500/5
                            duration-200
                        "
                    >

                        <td
                            class="
                                p-4
                                text-gray-700
                                dark:text-gray-200
                            "
                        >
                            {{ $item->nama_barang }}
                        </td>

                        <td
                            class="
                                p-4
                                text-gray-700
                                dark:text-gray-200
                            "
                        >
                            {{ $item->peminjam }}
                        </td>

                        <td
                            class="
                                p-4
                                text-gray-700
                                dark:text-gray-200
                            "
                        >
                            {{ $item->tanggal_pinjam }}
                        </td>

                        <td class="p-4">

                            @if($item->status == 'Dipinjam')

                            <span
                                class="
                                    bg-red-100
                                    dark:bg-red-500/20
                                    text-red-700
                                    dark:text-red-400
                                    px-3
                                    py-1
                                    rounded-full
                                    text-sm
                                "
                            >
                                Dipinjam
                            </span>

                            @else

                            <span
                                class="
                                    bg-green-100
                                    dark:bg-green-500/20
                                    text-green-700
                                    dark:text-green-400
                                    px-3
                                    py-1
                                    rounded-full
                                    text-sm
                                "
                            >
                                Dikembalikan
                            </span>

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <!-- GRAFIK -->

    <div
        class="
            bg-white
            dark:bg-[#111827]
            border
            border-gray-200
            dark:border-cyan-500/20
            rounded-2xl
            shadow-lg
            dark:shadow-[0_0_25px_rgba(0,255,255,0.08)]
            p-6
            duration-300
        "
    >

        <h2
            class="
                text-xl
                font-bold
                mb-6
                text-gray-800
                dark:text-cyan-400
            "
        >
            Statistik Barang
        </h2>

        <div class="w-full max-w-md">

            <canvas id="barangChart"></canvas>

        </div>

    </div>

    <div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-2xl
        shadow-lg
        p-6
        mt-6
    "
>

    <h2
        class="
            text-xl
            font-bold
            mb-6
            dark:text-cyan-400
        "
    >
        Aktivitas Terbaru
    </h2>

    @foreach($logs as $log)

    <div
        class="
            flex
            gap-3
            py-3
            border-b
            border-gray-100
            dark:border-cyan-500/10
        "
    >

        <div
            class="
                w-10
                h-10
                rounded-full
                bg-cyan-500/20
                flex
                items-center
                justify-center
                text-cyan-400
            "
        >
            <i class="fa-solid fa-clock-rotate-left"></i>
        </div>

        <div>

            <p
                class="
                    font-medium
                    dark:text-white
                "
            >
                {{ $log->username }}
            </p>

            <p
                class="
                    text-sm
                    text-gray-500
                "
            >
                {{ $log->aktivitas }}
            </p>

        </div>

    </div>

    @endforeach

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx =
    document.getElementById('barangChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Dipinjam',
            'Tersedia'
        ],

        datasets: [{

            data: [
                {{ $chartDipinjam }},
                {{ $chartTersedia }}
            ],

            backgroundColor: [
                '#ef4444',
                '#22c55e'
            ],

            borderRadius: 10,
            borderWidth: 0

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                position: 'bottom',

                labels: {

                    color:
                        document.documentElement.classList.contains('dark')
                        ? '#cbd5e1'
                        : '#374151'

                }

            }

        },

        scales: {

            x: {

                ticks: {

                    color:
                        document.documentElement.classList.contains('dark')
                        ? '#cbd5e1'
                        : '#374151'

                },

                grid: {

                    color:
                        document.documentElement.classList.contains('dark')
                        ? 'rgba(255,255,255,0.05)'
                        : '#e5e7eb'

                }

            },

            y: {

                ticks: {

                    color:
                        document.documentElement.classList.contains('dark')
                        ? '#cbd5e1'
                        : '#374151'

                },

                grid: {

                    color:
                        document.documentElement.classList.contains('dark')
                        ? 'rgba(255,255,255,0.05)'
                        : '#e5e7eb'

                }

            }

        }

    }

});

</script>

@endsection