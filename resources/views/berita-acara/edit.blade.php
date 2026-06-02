@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div
        class="
            bg-white
            dark:bg-[#111827]
            rounded-3xl
            shadow-xl
            border
            border-gray-200
            dark:border-cyan-500/10
            p-8
        "
    >

        <div class="mb-8">

            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Edit Berita Acara
            </h1>

        </div>

        <form
            method="POST"
            action="/berita-acara/update/{{ $berita->id }}"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="form-label">
                        Nomor BA
                    </label>

                    <input
                        type="text"
                        name="nomor_ba"
                        value="{{ $berita->nomor_ba }}"
                        class="form-input"
                    >

                </div>

                <div>

                    <label class="form-label">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ $berita->tanggal }}"
                        class="form-input"
                    >

                </div>

                <div>

                    <label class="form-label">
                        Nama Barang
                    </label>

                    <select
                        name="barang_id"
                        class="form-input"
                    >

                        @foreach($barang as $b)

                        <option
                            value="{{ $b->id }}"
                            {{ $berita->barang_id == $b->id ? 'selected' : '' }}
                        >
                            {{ $b->nama }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="form-label">
                        Penyerah
                    </label>

                    <input
                        type="text"
                        name="penyerah"
                        value="{{ $berita->penyerah }}"
                        class="form-input"
                    >

                </div>

                <div>

                    <label class="form-label">
                        Penerima
                    </label>

                    <input
                        type="text"
                        name="penerima"
                        value="{{ $berita->penerima }}"
                        class="form-input"
                    >

                </div>

                <div>

                    <label class="form-label">
                        Upload File Baru
                    </label>

                    <input
                        type="file"
                        name="file_ba"
                        class="form-input"
                    >

                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <button
                    class="
                        bg-yellow-500
                        hover:bg-yellow-600
                        text-white
                        px-6
                        py-3
                        rounded-2xl
                        font-semibold
                    "
                >
                    Update Data
                </button>

                <a
                    href="/berita-acara"
                    class="
                        px-6
                        py-3
                        rounded-2xl
                        bg-gray-200
                        dark:bg-slate-700
                        text-gray-700
                        dark:text-gray-200
                        font-semibold
                    "
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

@endsection