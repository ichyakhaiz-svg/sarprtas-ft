@extends('layouts.app')

@section('content')

<div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-2xl
        shadow-lg
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
                    dark:text-cyan-400
                "
            >
                Data Kategori
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                    mt-1
                "
            >
                Manajemen kategori inventaris barang
            </p>

        </div>

        <!-- BUTTON -->

        <a
            href="/kategori/create"
            class="
                bg-blue-600
                hover:bg-blue-700
                dark:bg-cyan-500/20
                dark:hover:bg-cyan-500/40
                text-white
                dark:text-cyan-400
                dark:border
                dark:border-cyan-500/30
                px-5
                py-3
                rounded-xl
                shadow-lg
                duration-200
            "
        >
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Kategori
        </a>

    </div>

    <!-- TABLE -->

    <div class="overflow-x-auto rounded-2xl">

        <table
            class="
                w-full
                border-collapse
                overflow-hidden
            "
        >

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
                        Nama Kategori
                    </th>

                    <th class="p-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($kategori as $item)

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

                    <td
                        class="
                            p-4
                            text-gray-700
                            dark:text-gray-200
                        "
                    >
                        {{ $loop->iteration }}
                    </td>

                    <!-- NAMA -->

                    <td
                        class="
                            p-4
                            font-medium
                            text-gray-800
                            dark:text-gray-100
                        "
                    >
                        {{ $item->nama }}
                    </td>

                    <!-- AKSI -->

                    <td class="p-4">

                        <div class="flex justify-center gap-2">

                            <!-- EDIT -->

                            <a
                                href="/kategori/{{ $item->id }}/edit"
                                class="
                                    bg-yellow-500
                                    hover:bg-yellow-600
                                    dark:bg-yellow-500/20
                                    dark:hover:bg-yellow-500/40
                                    text-white
                                    dark:text-yellow-400
                                    px-4
                                    py-2
                                    rounded-lg
                                    duration-200
                                "
                            >
                                <i class="fa-solid fa-pen-to-square mr-1"></i>
                                Edit
                            </a>

                            <!-- HAPUS -->

                            <form
                                action="/kategori/{{ $item->id }}"
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
                                        px-4
                                        py-2
                                        rounded-lg
                                        duration-200
                                    "
                                >
                                    <i class="fa-solid fa-trash mr-1"></i>
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