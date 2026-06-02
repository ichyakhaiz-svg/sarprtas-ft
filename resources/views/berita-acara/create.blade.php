@extends('layouts.app')

@section('content')

<div
    class="
        max-w-4xl
        mx-auto
    "
>

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
                Tambah Berita Acara
            </h1>

            <p
                class="
                    mt-2
                    text-gray-500
                    dark:text-gray-400
                "
            >
                Form input berita acara inventaris
            </p>

        </div>

        <!-- FORM -->

        <form
            method="POST"
            action="/berita-acara/store"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- NOMOR BA -->

                <div>

                    <label class="form-label">
                        Nomor BA
                    </label>

                    <input
                        type="text"
                        name="nomor_ba"
                        class="form-input"
                    >

                </div>

                <!-- TANGGAL -->

                <div>

                    <label class="form-label">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-input"
                    >

                </div>

                <!-- BARANG -->

                <div>

                    <label class="form-label">
                        Nama Barang
                    </label>

                    <select
                        name="barang_id"
                        class="form-input"
                    >

                        @foreach($barang as $b)

                        <option value="{{ $b->id }}">
                            {{ $b->nama }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- PENYERAH -->

                <div>

                    <label class="form-label">
                        Penyerah
                    </label>

                    <input
                        type="text"
                        name="penyerah"
                        class="form-input"
                    >

                </div>

                <!-- PENERIMA -->

                <div>

                    <label class="form-label">
                        Penerima
                    </label>

                    <input
                        type="text"
                        name="penerima"
                        class="form-input"
                    >

                </div>

                <!-- FILE -->

                <div>

                    <label class="form-label">
                        Upload File
                    </label>

                    <input
                        type="file"
                        name="file_ba"
                        class="form-input"
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
                        dark:text-slate-900
                        px-6
                        py-3
                        rounded-2xl
                        font-semibold
                        shadow-lg
                        duration-300
                    "
                >
                    Simpan Data
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

<style>

.form-label{
    @apply block mb-2 text-sm font-semibold;
    @apply text-gray-700 dark:text-cyan-300;
}

.form-input{
    @apply w-full px-4 py-3 rounded-2xl border;
    @apply bg-white dark:bg-[#0f172a];
    @apply border-gray-300 dark:border-cyan-500/10;
    @apply text-gray-700 dark:text-gray-200;
    @apply focus:outline-none focus:ring-2;
    @apply focus:ring-blue-500 dark:focus:ring-cyan-400;
    @apply duration-300;
}

</style>

@endsection