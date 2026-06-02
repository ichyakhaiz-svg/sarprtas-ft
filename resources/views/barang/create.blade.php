@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div
        class="
            bg-white
            dark:bg-[#111827]
            rounded-2xl
            shadow-lg
            p-8
            duration-300
        "
    >

        <!-- HEADER -->

        <div class="mb-8">

            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Tambah Barang
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                    mt-2
                "
            >
                Form input data inventaris barang
            </p>

        </div>

        <!-- FORM -->

        <form
            action="/barang"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- NAMA -->

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
                        Nama Barang
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            rounded-xl
                            p-3
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                        "
                    >

                </div>

                <!-- KODE -->

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
                        Kode Barang
                    </label>

                    <input
                        type="text"
                        name="kode"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            rounded-xl
                            p-3
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                        "
                    >

                </div>

                <!-- JUMLAH -->

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
                        Jumlah
                    </label>

                    <input
                        type="number"
                        name="jumlah"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            rounded-xl
                            p-3
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                        "
                    >

                </div>

                <!-- TAHUN -->

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
                        Tahun Pengadaan
                    </label>

                    <input
                        type="text"
                        name="tahun_pengadaan"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            rounded-xl
                            p-3
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                        "
                    >

                </div>

                <!-- KATEGORI -->

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
                        Kategori
                    </label>

                    <select
                        name="kategori_id"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            rounded-xl
                            p-3
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                        "
                    >

                        @foreach($kategori as $k)

                        <option value="{{ $k->id }}">
                            {{ $k->nama }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- LOKASI -->

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
                        Lokasi
                    </label>

                    <select
                        name="lokasi_id"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            rounded-xl
                            p-3
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                        "
                    >

                        @foreach($lokasi as $l)

                        <option value="{{ $l->id }}">
                            {{ $l->nama }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- MERK -->

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
                        Merk
                    </label>

                    <select
                        name="merk_id"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            rounded-xl
                            p-3
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                        "
                    >

                        @foreach($merk as $m)

                        <option value="{{ $m->id }}">
                            {{ $m->nama }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- KONDISI -->

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
                        Kondisi
                    </label>

                    <input
                        type="text"
                        name="kondisi"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            rounded-xl
                            p-3
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                        "
                    >

                </div>

                <!-- GAMBAR -->

                <div class="col-span-1 md:col-span-2">

                    <label
                        class="
                            block
                            mb-2
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Upload Gambar
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            rounded-xl
                            p-3
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-700
                            dark:text-gray-300
                        "
                    >

                </div>

            </div>

            <!-- BUTTON -->

            <div class="mt-8 flex gap-3">

                <button
                    class="
                        bg-blue-600
                        hover:bg-blue-700
                        dark:bg-cyan-500
                        dark:hover:bg-cyan-400
                        text-white
                        dark:text-gray-900
                        px-6
                        py-3
                        rounded-xl
                        font-semibold
                        shadow-lg
                        duration-200
                    "
                >
                    Simpan Barang
                </button>

                <a
                    href="/barang"
                    class="
                        bg-gray-300
                        hover:bg-gray-400
                        dark:bg-gray-700
                        dark:hover:bg-gray-600
                        text-gray-800
                        dark:text-white
                        px-6
                        py-3
                        rounded-xl
                        font-semibold
                        duration-200
                    "
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

@endsection