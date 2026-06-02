@extends('layouts.app')

@section('content')

<div
    class="
        bg-white
        dark:bg-[#111827]
        border
        border-transparent
        dark:border-cyan-500/20
        rounded-2xl
        shadow-lg
        dark:shadow-2xl
        p-6
        duration-300
    "
>

    <!-- HEADER -->

    <div
        class="
            flex
            flex-col
            lg:flex-row
            lg:justify-between
            lg:items-center
            gap-4
            mb-6
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
                Data Barang
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                    mt-1
                "
            >
                Manajemen inventaris barang
            </p>

        </div>

        <!-- ACTION BUTTON -->

        <div class="flex flex-wrap gap-3">

            <!-- EXPORT PDF -->

            <a
                href="/barang/pdf"
                class="
                    inline-flex
                    items-center
                    gap-2
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
                    shadow
                    duration-200
                "
            >

                <i class="fa-solid fa-file-pdf"></i>

                Export PDF

            </a>

            <!-- TAMBAH -->

            <a
                href="/barang/create"
                class="
                    inline-flex
                    items-center
                    gap-2
                    bg-blue-600
                    hover:bg-blue-700
                    dark:bg-cyan-500/20
                    dark:hover:bg-cyan-500/40
                    dark:border
                    dark:border-cyan-500/30
                    text-white
                    dark:text-cyan-400
                    px-5
                    py-3
                    rounded-xl
                    shadow
                    duration-200
                "
            >

                <i class="fa-solid fa-plus"></i>

                Tambah Barang

            </a>

        </div>

    </div>

    <!-- SEARCH + IMPORT -->

    <div
        class="
            flex
            flex-col
            xl:flex-row
            xl:justify-between
            xl:items-center
            gap-4
            mb-6
        "
    >

        <!-- SEARCH -->

        <form method="GET" class="w-full xl:w-auto">

            <div class="relative">

                <i
                    class="
                        fa-solid
                        fa-magnifying-glass
                        absolute
                        left-4
                        top-1/2
                        -translate-y-1/2
                        text-gray-400
                    "
                ></i>

                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama / kode barang..."
                    value="{{ request('search') }}"
                    class="
                        w-full
                        xl:w-96
                        border
                        border-gray-300
                        dark:border-cyan-500/20
                        bg-white
                        dark:bg-[#0f172a]
                        text-gray-800
                        dark:text-gray-200
                        rounded-xl
                        pl-12
                        pr-4
                        py-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-500
                        dark:focus:ring-cyan-400
                    "
                >

            </div>

        </form>

        <!-- IMPORT -->

        <form
            action="/barang/import"
            method="POST"
            enctype="multipart/form-data"
            class="
                flex
                flex-col
                md:flex-row
                items-stretch
                md:items-center
                gap-3
            "
        >

            @csrf

            <input
                type="file"
                name="file"
                required
                class="
                    border
                    border-gray-300
                    dark:border-cyan-500/20
                    bg-white
                    dark:bg-[#0f172a]
                    text-gray-700
                    dark:text-gray-300
                    rounded-xl
                    px-4
                    py-3
                    text-sm
                "
            >

            <button
                class="
                    inline-flex
                    items-center
                    justify-center
                    gap-2
                    bg-green-600
                    hover:bg-green-700
                    dark:bg-green-500/20
                    dark:hover:bg-green-500/40
                    dark:border
                    dark:border-green-500/30
                    text-white
                    dark:text-green-400
                    px-5
                    py-3
                    rounded-xl
                    shadow
                    duration-200
                "
            >

                <i class="fa-solid fa-file-import"></i>

                Import Excel

            </button>

        </form>

    </div>

    <!-- TABLE -->

    <div
        class="
            overflow-x-auto
            rounded-2xl
            border
            border-gray-200
            dark:border-cyan-500/10
        "
    >

        <table
            class="
                w-full
                border-collapse
                bg-white
                dark:bg-[#0f172a]
            "
        >

            <!-- HEAD -->

            <thead>

                <tr
                    class="
                        bg-blue-600
                        dark:bg-cyan-500/20
                        text-white
                        dark:text-cyan-300
                    "
                >

                    <th class="p-4 text-left whitespace-nowrap">
                        No
                    </th>

                    <th class="p-4 text-left whitespace-nowrap">
                        Kode
                    </th>

                    <th class="p-4 text-left whitespace-nowrap">
                        Nama Barang
                    </th>

                    <th class="p-4 text-left whitespace-nowrap">
                        Kategori
                    </th>

                    <th class="p-4 text-left whitespace-nowrap">
                        Jumlah
                    </th>

                    <th class="p-4 text-left whitespace-nowrap">
                        Lokasi
                    </th>

                    <th class="p-4 text-left whitespace-nowrap">
                        Kondisi
                    </th>

                    <th class="p-4 text-left whitespace-nowrap">
                        Status
                    </th>

                    <th class="p-4 text-center whitespace-nowrap">
                        Aksi
                    </th>

                </tr>

            </thead>

            <!-- BODY -->

            <tbody>

                @forelse($barang as $item)

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

                    <!-- NO -->

                    <td class="p-4 text-gray-700 dark:text-gray-200">
                        {{ $loop->iteration }}
                    </td>

                    

                    <!-- KODE -->

                    <td
                        class="
                            p-4
                            font-semibold
                            text-blue-600
                            dark:text-cyan-300
                        "
                    >
                        {{ $item->kode }}
                    </td>

                    <!-- NAMA -->

                    <td class="p-4 text-gray-700 dark:text-gray-200">
                        {{ $item->nama }}
                    </td>

                    <!-- KATEGORI -->

                    <td class="p-4 text-gray-700 dark:text-gray-200">
                        {{ $item->kategori->nama ?? '-' }}
                    </td>

                    <!-- JUMLAH -->

                    <td class="p-4 text-gray-700 dark:text-gray-200">
                        {{ number_format($item->jumlah) }}
                    </td>

                    <!-- LOKASI -->

                    <td class="p-4 text-gray-700 dark:text-gray-200">
                        {{ $item->lokasi->nama ?? '-' }}
                    </td>

                    <!-- KONDISI -->

                    <td class="p-4">

                        <span
                            class="
                                inline-flex
                                items-center
                                bg-green-100
                                dark:bg-green-500/20
                                text-green-700
                                dark:text-green-400
                                px-3
                                py-1
                                rounded-full
                                text-sm
                                font-medium
                            "
                        >
                            {{ $item->kondisi }}
                        </span>

                    </td>

                    <!-- STATUS -->

                    <td class="p-4">

                        @if($item->status == 'Dipinjam')

                        <span
                            class="
                                inline-flex
                                items-center
                                bg-red-100
                                dark:bg-red-500/20
                                text-red-700
                                dark:text-red-400
                                px-3
                                py-1
                                rounded-full
                                text-sm
                                font-medium
                            "
                        >
                            {{ $item->status }}
                        </span>

                        @elseif($item->status == 'Tersedia')

                        <span
                            class="
                                inline-flex
                                items-center
                                bg-green-100
                                dark:bg-green-500/20
                                text-green-700
                                dark:text-green-400
                                px-3
                                py-1
                                rounded-full
                                text-sm
                                font-medium
                            "
                        >
                            {{ $item->status }}
                        </span>

                        @else

                        <span
                            class="
                                inline-flex
                                items-center
                                bg-yellow-100
                                dark:bg-yellow-500/20
                                text-yellow-700
                                dark:text-yellow-400
                                px-3
                                py-1
                                rounded-full
                                text-sm
                                font-medium
                            "
                        >
                            {{ $item->status }}
                        </span>

                        @endif

                    </td>

                    <!-- AKSI -->

                    <td class="p-4">

                        <div
                            class="
                                flex
                                justify-center
                                flex-wrap
                                gap-2
                            "
                        >

                            <!-- KARTU -->

                            <a
                                href="/barang/kartu/{{ $item->id }}"
                                target="_blank"
                                class="
                                    bg-purple-500
                                    hover:bg-purple-600
                                    dark:bg-purple-500/20
                                    dark:hover:bg-purple-500/40
                                    dark:border
                                    dark:border-purple-500/30
                                    text-white
                                    dark:text-purple-400
                                    px-4
                                    py-2
                                    rounded-lg
                                    text-sm
                                    duration-200
                                "
                            >
                                Kartu
                            </a>

                            <!-- QR -->

                            <a
                                href="/barang/qrcode/{{ $item->id }}"
                                class="
                                    bg-blue-500
                                    hover:bg-blue-600
                                    dark:bg-blue-500/20
                                    dark:hover:bg-blue-500/40
                                    dark:border
                                    dark:border-blue-500/30
                                    text-white
                                    dark:text-blue-400
                                    px-4
                                    py-2
                                    rounded-lg
                                    text-sm
                                    duration-200
                                "
                            >
                                QR
                            </a>

                            <!-- DETAIL -->
                             <a
                                href="/barang/{{ $item->id }}"
                                class="
                                bg-cyan-500
                                hover:bg-cyan-600
                                text-white
                                px-4
                                py-2
                                rounded-lg
                                duration-200
                                "
                            >
                                Detail
                            </a>

                            <!-- EDIT -->

                            <a
                                href="/barang/{{ $item->id }}/edit"
                                class="
                                w-10
                                h-10
                                rounded-xl
                                bg-yellow-500/20
                                text-yellow-400
                                flex
                                items-center
                                justify-center
                                hover:bg-yellow-500
                                hover:text-white
                                duration-300
                                "
                            >
                            <i class="fa-solid fa-pen"></i>
                            </a>

                            <!-- HAPUS -->

                            <form
                                action="/barang/{{ $item->id }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin hapus data?')"
                                    class="
                                        bg-red-500
                                        hover:bg-red-600
                                        dark:bg-red-500/20
                                        dark:hover:bg-red-500/40
                                        dark:border
                                        dark:border-red-500/30
                                        text-white
                                        dark:text-red-400
                                        px-4
                                        py-2
                                        rounded-lg
                                        text-sm
                                        duration-200
                                    "
                                >
                                   <i class="fa-solid fa-trash"></i>
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="10"
                        class="
                            p-10
                            text-center
                            text-gray-500
                            dark:text-gray-400
                        "
                    >
                        Data barang tidak ditemukan
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->

    <div class="mt-6">

        {{ $barang->links() }}

    </div>

</div>

@endsection