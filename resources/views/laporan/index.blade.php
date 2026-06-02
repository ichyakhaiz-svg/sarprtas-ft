@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <!-- HEADER -->

    <div
        class="
            flex
            justify-between
            items-center
            flex-wrap
            gap-4
        "
    >

        <div>

            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Laporan Inventaris
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                    mt-1
                "
            >
                Data laporan seluruh inventaris barang
            </p>

        </div>

        <!-- BUTTON EXPORT -->

        <a
            href="/barang/pdf"
            target="_blank"
            class="
                bg-red-600
                hover:bg-red-700
                dark:bg-red-500/20
                dark:hover:bg-red-500/40
                dark:border
                dark:border-red-500/30
                text-white
                dark:text-red-400
                px-5
                py-3
                rounded-xl
                shadow-lg
                duration-200
            "
        >

            <i class="fa-solid fa-file-pdf mr-2"></i>

            Export PDF

        </a>

    </div>

    <!-- CARD -->

    <div
        class="
            grid
            grid-cols-1
            md:grid-cols-2
            xl:grid-cols-4
            gap-6
        "
    >

        <!-- TOTAL -->

        <div
            class="
                bg-white
                dark:bg-[#111827]
                rounded-2xl
                shadow-lg
                p-6
                border
                border-gray-200
                dark:border-cyan-500/10
            "
        >

            <p class="text-gray-500 dark:text-gray-400">
                Total Barang
            </p>

            <h1
                class="
                    text-4xl
                    font-bold
                    mt-2
                    text-cyan-500
                "
            >
                {{ $totalBarang }}
            </h1>

        </div>

        <!-- DIPINJAM -->

        <div
            class="
                bg-white
                dark:bg-[#111827]
                rounded-2xl
                shadow-lg
                p-6
                border
                border-gray-200
                dark:border-cyan-500/10
            "
        >

            <p class="text-gray-500 dark:text-gray-400">
                Barang Dipinjam
            </p>

            <h1
                class="
                    text-4xl
                    font-bold
                    mt-2
                    text-red-500
                "
            >
                {{ $barangDipinjam }}
            </h1>

        </div>

        <!-- TERSEDIA -->

        <div
            class="
                bg-white
                dark:bg-[#111827]
                rounded-2xl
                shadow-lg
                p-6
                border
                border-gray-200
                dark:border-cyan-500/10
            "
        >

            <p class="text-gray-500 dark:text-gray-400">
                Barang Tersedia
            </p>

            <h1
                class="
                    text-4xl
                    font-bold
                    mt-2
                    text-green-500
                "
            >
                {{ $barangTersedia }}
            </h1>

        </div>

        <!-- USER -->

        <div
            class="
                bg-white
                dark:bg-[#111827]
                rounded-2xl
                shadow-lg
                p-6
                border
                border-gray-200
                dark:border-cyan-500/10
            "
        >

            <p class="text-gray-500 dark:text-gray-400">
                Total User
            </p>

            <h1
                class="
                    text-4xl
                    font-bold
                    mt-2
                    text-yellow-500
                "
            >
                {{ $totalUser }}
            </h1>

        </div>

    </div>

    <!-- TABEL LAPORAN -->

    <div
        class="
            bg-white
            dark:bg-[#111827]
            rounded-2xl
            shadow-lg
            border
            border-gray-200
            dark:border-cyan-500/10
            overflow-hidden
        "
    >

        <!-- TITLE -->

        <div
            class="
                px-6
                py-5
                border-b
                border-gray-200
                dark:border-cyan-500/10
            "
        >

            <h2
                class="
                    text-xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Data Peminjaman Terbaru
            </h2>

        </div>

        <!-- TABLE -->

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr
                        class="
                            bg-blue-600
                            dark:bg-cyan-500/20
                            text-white
                        "
                    >

                        <th class="p-4 text-left">
                            Barang
                        </th>

                        <th class="p-4 text-left">
                            Peminjam
                        </th>

                        <th class="p-4 text-left">
                            Tanggal Pinjam
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

</div>

@endsection