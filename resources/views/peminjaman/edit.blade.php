@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

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
            p-8
            duration-300
        "
    >

        <!-- HEADER -->

        <h1
            class="
                text-3xl
                font-bold
                mb-2
                text-gray-800
                dark:text-cyan-400
            "
        >
            Edit Peminjaman
        </h1>

        <p
            class="
                text-gray-500
                dark:text-gray-400
                mb-8
            "
        >
            Update data peminjaman barang inventaris
        </p>

        <!-- FORM -->

        <form
            action="/peminjaman/{{ $peminjaman->id }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- BARANG -->

                <div>

                    <label
                        class="
                            block
                            mb-2
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Barang
                    </label>

                    <select
                        name="nama_barang"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-gray-200
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                            duration-200
                        "
                    >

                        @foreach($barang as $item)

                        <option
                            value="{{ $item->nama }}"
                            {{
                                $peminjaman->nama_barang
                                == $item->nama
                                ? 'selected'
                                : ''
                            }}
                        >
                            {{ $item->nama }}
                            (Stok: {{ $item->jumlah }})
                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- PEMINJAM -->

                <div>

                    <label
                        class="
                            block
                            mb-2
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Nama Peminjam
                    </label>

                    <input
                        type="text"
                        name="peminjam"
                        value="{{ $peminjaman->peminjam }}"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-gray-200
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                            duration-200
                        "
                    >

                </div>

                <!-- TANGGAL PINJAM -->

                <div>

                    <label
                        class="
                            block
                            mb-2
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Tanggal Pinjam
                    </label>

                    <input
                        type="date"
                        name="tanggal_pinjam"
                        value="{{ $peminjaman->tanggal_pinjam }}"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-gray-200
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                            duration-200
                        "
                    >

                </div>

                <!-- TANGGAL KEMBALI -->

                <div>

                    <label
                        class="
                            block
                            mb-2
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Tanggal Kembali
                    </label>

                    <input
                        type="date"
                        name="tanggal_kembali"
                        value="{{ $peminjaman->tanggal_kembali }}"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-gray-200
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                            duration-200
                        "
                    >

                </div>

                <!-- KEPERLUAN -->

                <div class="md:col-span-2">

                    <label
                        class="
                            block
                            mb-2
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Keperluan
                    </label>

                    <textarea
                        name="keperluan"
                        rows="4"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-gray-200
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                            duration-200
                        "
                    >{{ $peminjaman->keperluan }}</textarea>

                </div>

            </div>

            <!-- BUTTON -->

            <div class="mt-8 flex gap-3">

                <button
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
                        px-6
                        py-3
                        rounded-xl
                        shadow-lg
                        duration-200
                    "
                >
                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                    Update
                </button>

                <a
                    href="/peminjaman"
                    class="
                        bg-gray-200
                        hover:bg-gray-300
                        dark:bg-gray-700
                        dark:hover:bg-gray-600
                        text-gray-700
                        dark:text-gray-200
                        px-6
                        py-3
                        rounded-xl
                        duration-200
                    "
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection