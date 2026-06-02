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
                Tambah Maintenance
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                    mt-2
                "
            >
                Form pemeliharaan barang inventaris
            </p>

        </div>

        <!-- FORM -->

        <form
            action="{{ route('pemeliharaan.store') }}"
            method="POST"
        >

            @csrf

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
                        name="barang_id"
                        required
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                        "
                    >

                        <option value="">
                            -- Pilih Barang --
                        </option>

                        @foreach($barang as $item)

                        <option value="{{ $item->id }}">

                            {{ $item->nama }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <!-- JENIS -->

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
                        Jenis Maintenance
                    </label>

                    <select
                        name="jenis"
                        required
                        class="
                        w-full
                        border
                        border-gray-300
                        dark:border-cyan-500/20
                        bg-white
                        dark:bg-[#0f172a]
                        text-gray-800
                        dark:text-white
                        rounded-xl
                        p-3
                        focus:outline-none
                        focus:ring-2
                        focus:ring-cyan-400
                        "
                    >

                    <option value="Pembersihan">
                        Pembersihan
                    </option>

                    <option value="Perbaikan">
                        Perbaikan
                    </option>

                    <option value="Service">
                        Service
                    </option>

                    <option value="Pengecekan">
                        Pengecekan
                    </option>

                    </select>

                </div>

                <!-- JADWAL -->

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
                        Jadwal
                    </label>

                    <select
                        name="jadwal"
                        required
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                        "
                    >

                        <option value="Mingguan">
                            Mingguan
                        </option>

                        <option value="Bulanan">
                            Bulanan
                        </option>

                        <option value="Tahunan">
                            Tahunan
                        </option>

                    </select>

                </div>

                <!-- STATUS -->

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
                        Status
                    </label>

                    <select
                        name="status"
                        required
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                        "
                    >

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="Proses">
                            Proses
                        </option>

                        <option value="Selesai">
                            Selesai
                        </option>

                    </select>

                </div>

                <!-- TANGGAL TERAKHIR -->

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
                        Tanggal Terakhir
                    </label>

                    <input
                        type="date"
                        name="tanggal_terakhir"
                        required
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                        "
                    >

                </div>

                <!-- TANGGAL BERIKUTNYA -->

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
                        Tanggal Berikutnya
                    </label>

                    <input
                        type="date"
                        name="tanggal_berikutnya"
                        required
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                        "
                    >

                </div>

                <!-- KETERANGAN -->

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
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="4"
                        placeholder="Catatan maintenance..."
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                        "
                    ></textarea>

                </div>

            </div>

            <!-- BUTTON -->

            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="
                    bg-cyan-500
                    hover:bg-cyan-600
                    dark:bg-cyan-500
                    dark:hover:bg-cyan-600
                    text-gray-900
                    dark:text-white
                    font-semibold
                    px-6
                    py-3
                    rounded-xl
                    shadow-lg
                    duration-200
                    "
                >

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Simpan Maintenance

                </button>

                <a
                    href="/pemeliharaan"
                    class="
                        bg-gray-300
                        dark:bg-gray-700
                        hover:bg-gray-400
                        dark:hover:bg-gray-600
                        text-black
                        dark:text-white
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