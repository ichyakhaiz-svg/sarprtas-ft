@extends('layouts.app')

@section('content')

<div
    class="
        bg-white
        dark:bg-[#111827]/80
        backdrop-blur-xl
        rounded-2xl
        shadow-lg
        dark:shadow-[0_0_25px_rgba(0,255,255,0.08)]
        border
        border-gray-200
        dark:border-cyan-500/20
        p-6
        duration-300
    "
>

    <!-- HEADER -->

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-50
                "
            >
                Data Peminjaman
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-50
                    mt-1
                "
            >
                Manajemen peminjaman barang
            </p>

        </div>

        <a
            href="/peminjaman/create"
            class="
                bg-blue-600
                hover:bg-blue-700
                dark:bg-cyan-500/20
                dark:hover:bg-cyan-500/40
                text-white
                dark:text-cyan-400
                border
                border-transparent
                dark:border-cyan-500/30
                px-5
                py-3
                rounded-xl
                duration-200
            "
        >
            + Tambah Peminjaman
        </a>

    </div>

    <!-- TABLE -->

    <div class="overflow-x-auto rounded-2xl">

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
                        No
                    </th>

                    <th class="p-4 text-left">
                        Barang
                    </th>

                    <th class="p-4 text-left">
                        Peminjam
                    </th>

                    <th class="p-4 text-left">
                        Keperluan
                    </th>

                    <th class="p-4 text-left">
                        Tanggal Pinjam
                    </th>

                    <th class="p-4 text-left">
                        Tanggal Kembali
                    </th>

                    <th class="p-4 text-left">
                        Status
                    </th>

                    <th class="p-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($peminjaman as $item)

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

                    <td class="p-4">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-4">
                        {{ $item->nama_barang }}
                    </td>

                    <td class="p-4">
                        {{ $item->peminjam }}
                    </td>

                    <td class="p-4">
                        {{ $item->keperluan }}
                    </td>

                    <td class="p-4">
                        {{ $item->tanggal_pinjam }}
                    </td>

                    <td class="p-4">
                        {{ $item->tanggal_kembali }}
                    </td>

                    <!-- STATUS -->

                    <td class="p-4">

                        @if(
                            strtolower(trim($item->status)) == 'dipinjam'
                        )

                        <span
                            class="
                                bg-yellow-100
                                dark:bg-yellow-500/20
                                text-yellow-700
                                dark:text-yellow-400
                                px-3
                                py-1
                                rounded-full
                                text-sm
                                border
                                border-transparent
                                dark:border-yellow-500/20
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
                                border
                                border-transparent
                                dark:border-green-500/20
                            "
                        >
                            Dikembalikan
                        </span>

                        @endif

                    </td>

                    <!-- AKSI -->

                    <td class="p-4">

                        <div class="flex gap-2 flex-wrap">

                            @if(
                                strtolower(trim($item->status)) == 'dipinjam'
                            )

                            <a
                                href="/peminjaman/kembalikan/{{ $item->id }}"
                                class="
                                    bg-green-500
                                    hover:bg-green-600
                                    dark:bg-green-500/20
                                    dark:hover:bg-green-500/40
                                    text-white
                                    dark:text-green-400
                                    border
                                    border-transparent
                                    dark:border-green-500/30
                                    px-4
                                    py-2
                                    rounded-lg
                                    duration-200
                                "
                            >
                                Kembalikan
                            </a>

                            @endif

                            <a
                                href="/peminjaman/{{ $item->id }}/edit"
                                class="
                                    bg-yellow-500
                                    hover:bg-yellow-600
                                    dark:bg-yellow-500/20
                                    dark:hover:bg-yellow-500/40
                                    text-white
                                    dark:text-yellow-400
                                    border
                                    border-transparent
                                    dark:border-yellow-500/30
                                    px-4
                                    py-2
                                    rounded-lg
                                    duration-200
                                "
                            >
                                Edit
                            </a>

                            <form
                                action="/peminjaman/{{ $item->id }}"
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
                                        text-white
                                        dark:text-red-400
                                        border
                                        border-transparent
                                        dark:border-red-500/30
                                        px-4
                                        py-2
                                        rounded-lg
                                        duration-200
                                    "
                                >
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection