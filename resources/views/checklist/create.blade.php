@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

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

        <h1
            class="
                text-3xl
                font-bold
                mb-2
                text-gray-800
                dark:text-cyan-400
            "
        >
            Tambah Checklist Maintenance
        </h1>

        <p
            class="
                text-gray-500
                dark:text-gray-400
                mb-8
            "
        >
            Form checklist maintenance barang
        </p>

        <form
            action="{{ route('checklist-maintenance.store') }}"
            method="POST"
        >

            @csrf

            <div class="grid grid-cols-2 gap-6">

                <!-- KEGIATAN -->

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
                        Kegiatan
                    </label>

                    <input
                        type="text"
                        name="kegiatan"
                        required
                        class="
                            w-full
                            rounded-xl
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            p-3
                        "
                    >

                </div>

                <!-- FREKUENSI -->

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
                        Frekuensi
                    </label>

                    <select
                        name="frekuensi"
                        class="
                            w-full
                            rounded-xl
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            p-3
                        "
                    >

                        <option value="Bulanan">
                            Bulanan
                        </option>

                        <option value="Tahunan">
                            Tahunan
                        </option>

                    </select>

                </div>

                <!-- PETUGAS -->

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
                        Petugas
                    </label>

                    <input
                        type="text"
                        name="petugas"
                        class="
                            w-full
                            rounded-xl
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            p-3
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
                        Tahun
                    </label>

                    <input
                        type="number"
                        name="tahun"
                        value="{{ date('Y') }}"
                        class="
                            w-full
                            rounded-xl
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            p-3
                        "
                    >

                </div>

            </div>

            <!-- BULAN -->

            <div class="mt-8">

                <h2
                    class="
                        text-xl
                        font-bold
                        mb-4
                        text-gray-800
                        dark:text-cyan-400
                    "
                >
                    Checklist Bulanan
                </h2>

                <div class="grid grid-cols-4 gap-4">

                    @php

                    $bulan = [
                        'jan'=>'Januari',
                        'feb'=>'Februari',
                        'mar'=>'Maret',
                        'apr'=>'April',
                        'mei'=>'Mei',
                        'jun'=>'Juni',
                        'jul'=>'Juli',
                        'agu'=>'Agustus',
                        'sep'=>'September',
                        'okt'=>'Oktober',
                        'nov'=>'November',
                        'des'=>'Desember'
                    ];

                    @endphp

                    @foreach($bulan as $key => $value)

                    <label
                        class="
                            flex
                            items-center
                            gap-3
                            bg-gray-100
                            dark:bg-cyan-500/10
                            p-3
                            rounded-xl
                        "
                    >

                        <input
                            type="checkbox"
                            name="{{ $key }}"
                            value="1"
                            class="w-5 h-5"
                        >

                        <span
                            class="
                                text-gray-700
                                dark:text-gray-300
                            "
                        >
                            {{ $value }}
                        </span>

                    </label>

                    @endforeach

                </div>

            </div>

            <!-- BUTTON -->

            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="
                        bg-cyan-500
                        hover:bg-cyan-600
                        text-gray-900
                        dark:text-white
                        px-6
                        py-3
                        rounded-xl
                        font-semibold
                    "
                >
                    Simpan Checklist
                </button>

                <a
                    href="/pemeliharaan"
                    class="
                        bg-gray-300
                        dark:bg-gray-700
                        text-gray-800
                        dark:text-white
                        px-6
                        py-3
                        rounded-xl
                    "
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

@endsection