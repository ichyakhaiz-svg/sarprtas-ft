@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

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
            p-8
            duration-300
        "
    >

        <!-- TITLE -->

        <h1
            class="
                text-3xl
                font-bold
                mb-8
                text-gray-800
                dark:text-cyan-400
            "
        >
            Edit Barang
        </h1>

        <form
            action="/barang/{{ $barang->id }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

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
                        value="{{ $barang->nama }}"
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
                        value="{{ $barang->kode }}"
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
                        value="{{ $barang->jumlah }}"
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
                        value="{{ $barang->tahun_pengadaan }}"
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
                        "
                    >

                        @foreach($kategori as $k)

                        <option
                            value="{{ $k->id }}"
                            {{ $barang->kategori_id == $k->id ? 'selected' : '' }}
                        >
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
                        "
                    >

                        @foreach($lokasi as $l)

                        <option
                            value="{{ $l->id }}"
                            {{ $barang->lokasi_id == $l->id ? 'selected' : '' }}
                        >
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
                        "
                    >

                        @foreach($merk as $m)

                        <option
                            value="{{ $m->id }}"
                            {{ $barang->merk_id == $m->id ? 'selected' : '' }}
                        >
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
                        value="{{ $barang->kondisi }}"
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
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-700
                            dark:text-gray-300
                            rounded-xl
                            p-3
                        "
                    >

                </div>

                <!-- PREVIEW -->

                @if($barang->gambar)

                <div class="col-span-1 md:col-span-2">

                    <p
                        class="
                            mb-3
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Gambar Saat Ini
                    </p>

                    <img
                        src="{{ asset('storage/' . $barang->gambar) }}"
                        class="
                            w-40
                            rounded-xl
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            shadow-lg
                        "
                    >

                </div>

                @endif

            </div>

            <!-- BUTTON -->

            <div class="mt-8 flex gap-3">

                <button
                    class="
                        bg-blue-600
                        hover:bg-blue-700
                        dark:bg-cyan-500/20
                        dark:hover:bg-cyan-500/40
                        dark:border
                        dark:border-cyan-500/30
                        text-white
                        dark:text-cyan-400
                        px-6
                        py-3
                        rounded-xl
                        duration-200
                    "
                >
                    Update Barang
                </button>

                <a
                    href="/barang"
                    class="
                        bg-gray-300
                        hover:bg-gray-400
                        dark:bg-gray-700
                        dark:hover:bg-gray-600
                        text-black
                        dark:text-gray-200
                        px-6
                        py-3
                        rounded-xl
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