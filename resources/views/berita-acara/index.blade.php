@extends('layouts.app')

@section('content')

<div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-3xl
        shadow-xl
        border
        border-gray-200
        dark:border-cyan-500/10
        p-6
        duration-300
    "
>

    <!-- HEADER -->

    <div
    class="
        flex
        flex-col
        md:flex-row
        md:items-center
        justify-between
        w-full
        gap-4
        mb-8
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
                Berita Acara
            </h1>

            <p
                class="
                    mt-2
                    text-gray-500
                    dark:text-gray-400
                "
            >
                Data berita acara inventaris sarpras
            </p>

        </div>

    <a
    href="/berita-acara/create"
    class="
        inline-flex
        items-center
        gap-2
        bg-blue-600
        hover:bg-blue-700
        dark:bg-cyan-500
        dark:hover:bg-cyan-400
        text-white
        dark:text-slate-900
        px-5
        py-3
        rounded-2xl
        font-semibold
        shadow-lg
        hover:scale-105
        duration-300
        md:ml-auto
    "
>

            <i class="fa-solid fa-plus"></i>

            Tambah Berita Acara

    </a>

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

        <table class="w-full min-w-[1100px]">

            <thead>

                <tr
                    class="
                        bg-gray-100
                        dark:bg-[#0f172a]
                        text-gray-700
                        dark:text-cyan-300
                    "
                >

                    <th class="p-4 text-left">
                        No
                    </th>

                    <th class="p-4 text-left">
                        Nomor BA
                    </th>

                    <th class="p-4 text-left">
                        Nama Barang
                    </th>

                    <th class="p-4 text-left">
                        Tanggal
                    </th>

                    <th class="p-4 text-left">
                        Penyerah
                    </th>

                    <th class="p-4 text-left">
                        Penerima
                    </th>

                    <th class="p-4 text-center">
                        File
                    </th>

                    <th class="p-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($berita as $item)

                <tr
                    class="
                        border-t
                        border-gray-100
                        dark:border-cyan-500/5
                        hover:bg-gray-50
                        dark:hover:bg-cyan-500/5
                        duration-200
                    "
                >

                    <td class="p-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-4 font-medium">
                        {{ $item->nomor_ba }}
                    </td>

                    <td class="p-4">
                        {{ $item->nama_barang }}
                    </td>

                    <td class="p-4">
                        {{ $item->tanggal }}
                    </td>

                    <td class="p-4">

                        <div
                            class="
                                max-w-xs
                                truncate
                                text-gray-600
                                dark:text-gray-300
                            "
                        >
                            {{ $item->penyerah }}
                        </div>

                    </td>
                    <td class="p-4">

                        <div
                            class="
                                max-w-xs
                                truncate
                                text-gray-600
                                dark:text-gray-300
                            "
                        >
                            {{ $item->penerima }}
                        </div>

                    </td>

                    <!-- FILE -->

                    <td class="p-4 text-center">

                        @if($item->file_ba)

                        <a
                            href="{{ asset('storage/' . $item->file_ba) }}"
                            target="_blank"
                            class="
                                inline-flex
                                items-center
                                gap-2
                                bg-green-500
                                hover:bg-green-600
                                text-white
                                px-4
                                py-2
                                rounded-xl
                                text-sm
                                shadow
                                duration-200
                            "
                        >

                            <i class="fa-solid fa-file-pdf"></i>

                            Lihat

                        </a>

                        @else

                        <span
                            class="
                                text-sm
                                text-gray-400
                            "
                        >
                            Tidak ada file
                        </span>

                        @endif

                    </td>

                    <!-- AKSI -->

                    <td class="p-4">

                        <div
                            class="
                                flex
                                justify-center
                                gap-2
                            "
                        >

                            <a
                                href="/berita-acara/edit/{{ $item->id }}"
                                class="
                                    w-10
                                    h-10
                                    rounded-xl
                                    bg-yellow-500
                                    hover:bg-yellow-600
                                    text-white
                                    flex
                                    items-center
                                    justify-center
                                    shadow
                                    duration-200
                                "
                            >

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <a
                                href="/berita-acara/delete/{{ $item->id }}"
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                class="
                                    w-10
                                    h-10
                                    rounded-xl
                                    bg-red-500
                                    hover:bg-red-600
                                    text-white
                                    flex
                                    items-center
                                    justify-center
                                    shadow
                                    duration-200
                                "
                            >

                                <i class="fa-solid fa-trash"></i>

                            </a>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="8"
                        class="
                            text-center
                            py-12
                            text-gray-500
                            dark:text-gray-400
                        "
                    >

                        <div
                            class="
                                flex
                                flex-col
                                items-center
                                gap-3
                            "
                        >

                            <i
                                class="
                                    fa-solid
                                    fa-folder-open
                                    text-5xl
                                    text-gray-300
                                    dark:text-cyan-500/20
                                "
                            ></i>

                            <p>
                                Belum ada data berita acara
                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

</div>

<!-- PAGINATION -->

@if(method_exists($berita, 'links'))

<div class="mt-6 flex justify-center">

    {{ $berita->links() }}

</div>

@endif

</div>

@endsection