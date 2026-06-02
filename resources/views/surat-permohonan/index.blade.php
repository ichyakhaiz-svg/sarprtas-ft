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

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Surat Permohonan
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                    mt-1
                "
            >
                Data surat permohonan sarpras
            </p>

        </div>

        <a
            href="/surat-permohonan/create"
            class="
                px-5
                py-3
                rounded-2xl
                bg-blue-600
                hover:bg-blue-700
                dark:bg-cyan-500/20
                dark:hover:bg-cyan-500/30
                text-white
                dark:text-cyan-400
                font-medium
                shadow-lg
                duration-300
                hover:scale-105
            "
        >
            + Tambah Surat
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

        <table class="w-full">

            <thead>

                <tr
                    class="
                        bg-gray-100
                        dark:bg-cyan-500/10
                        text-gray-700
                        dark:text-cyan-300
                    "
                >

                    <th class="p-4 text-left">No</th>

                    <th class="p-4 text-left">
                        Nomor Surat
                    </th>

                    <th class="p-4 text-left">
                        Kepada
                    </th>

                    <th class="p-4 text-left">
                        Perihal
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

                @forelse($surat as $item)

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
                        {{ $item->nomor_surat }}
                    </td>

                    <td class="p-4">
                        {{ $item->kepada }}
                    </td>

                    <td class="p-4">
                        {{ $item->perihal }}
                    </td>

                    <td class="p-4 text-center">

                        @if($item->file_surat)

                        <a
                            href="{{ asset('storage/' . $item->file_surat) }}"
                            target="_blank"
                            class="
                                inline-flex
                                items-center
                                gap-2
                                px-4
                                py-2
                                rounded-xl
                                bg-green-500/10
                                hover:bg-green-500/20
                                text-green-600
                                dark:text-green-400
                                duration-200
                            "
                        >

                            <i class="fa-solid fa-file-pdf"></i>

                            Lihat

                        </a>

                        @else

                        <span
                            class="
                                text-gray-400
                                text-sm
                            "
                        >
                            Tidak ada file
                        </span>

                        @endif

                    </td>

                    <td class="p-4">

                        <div class="flex justify-center gap-2">

                            <!-- EDIT -->

                            <a
                                href="/surat-permohonan/edit/{{ $item->id }}"
                                class="
                                    px-4
                                    py-2
                                    rounded-xl
                                    bg-yellow-500/10
                                    hover:bg-yellow-500/20
                                    text-yellow-600
                                    dark:text-yellow-400
                                    duration-200
                                "
                            >

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <!-- DELETE -->

                            <a
                                href="/surat-permohonan/delete/{{ $item->id }}"
                                onclick="return confirm('Yakin hapus data?')"
                                class="
                                    px-4
                                    py-2
                                    rounded-xl
                                    bg-red-500/10
                                    hover:bg-red-500/20
                                    text-red-600
                                    dark:text-red-400
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
                        colspan="6"
                        class="
                            p-10
                            text-center
                            text-gray-500
                            dark:text-gray-400
                        "
                    >
                        Belum ada data surat permohonan
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection