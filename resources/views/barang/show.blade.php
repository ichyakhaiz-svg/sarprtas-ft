@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- HEADER -->

    <div
        class="
            bg-white
            dark:bg-[#111827]
            rounded-2xl
            shadow-lg
            p-8
            mb-6
        "
    >

        <div class="flex gap-6">

            <!-- FOTO -->

            <div>

                @if($barang->gambar)

                <img
                    src="{{ asset('storage/' . $barang->gambar) }}"
                    class="
                        w-56
                        h-56
                        object-cover
                        rounded-2xl
                        border
                        border-gray-200
                        dark:border-cyan-500/20
                    "
                >

                @else

                <div
                    class="
                        w-56
                        h-56
                        rounded-2xl
                        bg-gray-200
                        dark:bg-[#1e293b]
                        flex
                        items-center
                        justify-center
                    "
                >

                    <i
                        class="
                            fa-solid
                            fa-box
                            text-5xl
                            text-gray-400
                        "
                    ></i>

                </div>

                @endif

            </div>

            <!-- DETAIL -->

            <div class="flex-1">

                <h1
                    class="
                        text-3xl
                        font-bold
                        mb-3
                        text-gray-800
                        dark:text-cyan-400
                    "
                >
                    {{ $barang->nama }}
                </h1>

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <p class="text-gray-500 text-sm">
                            Kode Barang
                        </p>

                        <p class="font-semibold">
                            {{ $barang->kode }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">
                            Jumlah
                        </p>

                        <p class="font-semibold">
                            {{ $barang->jumlah }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">
                            Kategori
                        </p>

                        <p class="font-semibold">
                            {{ $barang->kategori->nama ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">
                            Lokasi
                        </p>

                        <p class="font-semibold">
                            {{ $barang->lokasi->nama ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">
                            Merk
                        </p>

                        <p class="font-semibold">
                            {{ $barang->merk->nama ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">
                            Kondisi
                        </p>

                        <p class="font-semibold">
                            {{ $barang->kondisi }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- RIWAYAT PEMINJAMAN -->

    <div
        class="
            bg-white
            dark:bg-[#111827]
            rounded-2xl
            shadow-lg
            p-6
            mb-6
        "
    >

        <h2
            class="
                text-xl
                font-bold
                mb-5
                dark:text-cyan-400
            "
        >
            Riwayat Peminjaman
        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr
                        class="
                            bg-blue-600
                            text-white
                        "
                    >

                        <th class="p-3 text-left">
                            Peminjam
                        </th>

                        <th class="p-3 text-left">
                            Tanggal Pinjam
                        </th>

                        <th class="p-3 text-left">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($peminjaman as $item)

                    <tr
                        class="
                            border-b
                            border-gray-200
                            dark:border-cyan-500/10
                        "
                    >

                        <td class="p-3">
                            {{ $item->peminjam }}
                        </td>

                        <td class="p-3">
                            {{ $item->tanggal_pinjam }}
                        </td>

                        <td class="p-3">
                            {{ $item->status }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="3"
                            class="
                                p-5
                                text-center
                                text-gray-500
                            "
                        >
                            Belum ada riwayat
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- RIWAYAT MAINTENANCE -->

<div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-2xl
        shadow-lg
        p-6
        mb-6
    "
>

    <h2
        class="
            text-xl
            font-bold
            mb-5
            dark:text-cyan-400
        "
    >
        Riwayat Maintenance
    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-cyan-600 text-white">

                    <th class="p-3 text-left">
                        Jenis
                    </th>

                    <th class="p-3 text-left">
                        Jadwal
                    </th>

                    <th class="p-3 text-left">
                        Status
                    </th>

                    <th class="p-3 text-left">
                        Keterangan
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($pemeliharaan as $item)

                <tr
                    class="
                        border-b
                        border-gray-200
                        dark:border-cyan-500/10
                    "
                >

                    <td class="p-3">
                        {{ $item->jenis }}
                    </td>

                    <td class="p-3">
                        {{ $item->jadwal }}
                    </td>

                    <td class="p-3">
                        {{ $item->status }}
                    </td>

                    <td class="p-3">
                        {{ $item->keterangan }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="4"
                        class="
                            p-5
                            text-center
                            text-gray-500
                        "
                    >
                        Belum ada maintenance
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- CHECKLIST -->

<div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-2xl
        shadow-lg
        p-6
    "
>

    <h2
        class="
            text-xl
            font-bold
            mb-5
            dark:text-cyan-400
        "
    >
        Checklist Maintenance
    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-blue-600 text-white">

                    <th class="p-3 text-left">
                        Kegiatan
                    </th>

                    <th class="p-3 text-left">
                        Frekuensi
                    </th>

                    <th class="p-3 text-left">
                        Petugas
                    </th>

                    <th class="p-3 text-center">
                        Tahun
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($checklist as $item)

                <tr
                    class="
                        border-b
                        border-gray-200
                        dark:border-cyan-500/10
                    "
                >

                    <td class="p-3">
                        {{ $item->kegiatan }}
                    </td>

                    <td class="p-3">
                        {{ $item->frekuensi }}
                    </td>

                    <td class="p-3">
                        {{ $item->petugas }}
                    </td>

                    <td class="p-3 text-center">
                        {{ $item->tahun }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="4"
                        class="
                            p-5
                            text-center
                            text-gray-500
                        "
                    >
                        Checklist belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection