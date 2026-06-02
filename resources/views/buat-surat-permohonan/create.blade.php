@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div
        class="
            bg-white
            dark:bg-[#111827]
            rounded-3xl
            shadow-xl
            p-8
            border
            border-gray-200
            dark:border-cyan-500/10
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
                Buat Surat Permohonan
            </h1>

            <p
                class="
                    mt-2
                    text-gray-500
                    dark:text-gray-400
                "
            >
                Generate surat permohonan otomatis secara digital
            </p>

        </div>

        <!-- FORM -->

        <form
    method="POST"
    action="/buat-surat-permohonan/generate"
>

    @csrf

    <div class="grid md:grid-cols-2 gap-6 mb-6">

        <div>
            <label class="form-label">
                Nomor Surat
            </label>

            <input
                type="text"
                name="nomor"
                class="form-input"
                placeholder="001/SP/SARPRAS/V/2026"
            >
        </div>

        <div>
            <label class="form-label">
                Lampiran
            </label>

            <input
                type="text"
                name="lampiran"
                value="-"
                class="form-input"
            >
        </div>

        <div>
            <label class="form-label">
                Perihal
            </label>

            <input
                type="text"
                name="perihal"
                class="form-input"
            >
        </div>

        <div>
            <label class="form-label">
                Tanggal Surat
            </label>

            <input
                type="date"
                name="tanggal"
                class="form-input"
            >
        </div>

    </div>

    <!-- KEPADA -->

    <div class="mb-6">

        <label class="form-label">
            Kepada Yth
        </label>

        <textarea
            name="kepada"
            rows="3"
            class="form-input resize-none"
            placeholder="Rektor&#10;Universitas Kadiri ..."
        ></textarea>

    </div>

    <!-- ISI SURAT -->

    <div class="mb-6">

        <label class="form-label">
            Isi Surat
        </label>

        <textarea
            name="isi"
            rows="8"
            class="form-input resize-none"
        ></textarea>

    </div>

    <!-- DATA BARANG -->

    <div
        class="
            mb-8
            p-5
            rounded-2xl
            bg-gray-50
            dark:bg-[#0f172a]
            border
            border-gray-200
            dark:border-cyan-500/10
        "
    >

        <h2
            class="
                font-semibold
                mb-4
                text-gray-700
                dark:text-cyan-300
            "
        >
            Tabel Barang (Opsional)
        </h2>

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
                dark:bg-[#0f172a]
            "
        >

            <th class="p-3">
                No
            </th>

            <th class="p-3">
                Nama Barang
            </th>

            <th class="p-3">
                Jumlah
            </th>

            <th class="p-3">
                Keterangan
            </th>

        </tr>

    </thead>

    <tbody>

        @for($i=1; $i<=5; $i++)

        <tr>

            <td class="p-2 text-center">
                {{ $i }}
            </td>

            <td class="p-2">

                <input
                    type="text"
                    name="nama_barang[]"
                    class="form-input"
                >

            </td>

            <td class="p-2">

                <input
                    type="number"
                    name="jumlah_barang[]"
                    class="form-input"
                >

            </td>

            <td class="p-2">

                <input
                    type="text"
                    name="keterangan_barang[]"
                    class="form-input"
                >

            </td>

        </tr>

        @endfor

    </tbody>

</table>

</div>


    <!-- PENANDATANGAN -->

    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div>

            <label class="form-label">
                Jabatan
            </label>

            <input
                type="text"
                name="jabatan"
                value="Dekan Fakultas Teknik"
                class="form-input"
            >

        </div>

        <div>

            <label class="form-label">
                Nama Penandatangan
            </label>

            <input
                type="text"
                name="penandatangan"
                value="Dr. Imam Safi'i, ST. MT."
                class="form-input"
            >

        </div>

        <div>

            <label class="form-label">
                NIK / NIP
            </label>

            <input
                type="text"
                name="nik"
                value="201010017"
                class="form-input"
            >

        </div>

    </div>

    <div class="mt-6">

    <label class="form-label">
        Paraf Persetujuan (Opsional)
    </label>

    <div class="grid grid-cols-5 gap-2">

        <input
            type="text"
            name="paraf1"
            placeholder="Ka. Prodi TI"
            class="form-input"
        >

        <input
            type="text"
            name="paraf2"
            placeholder="Ka. Prodi TS"
            class="form-input"
        >

        <input
            type="text"
            name="paraf3"
            placeholder="Ka. Prodi TEM"
            class="form-input"
        >

        <input
            type="text"
            name="paraf4"
            placeholder="WD 1"
            class="form-input"
        >

        <input
            type="text"
            name="paraf5"
            placeholder="WD 2"
            class="form-input"
        >

    </div>

</div>
</div>

    <!-- BUTTON -->

    <div class="flex justify-end">

        <button
            type="submit"
            class="
                px-6
                py-3
                rounded-2xl
                bg-blue-600
                hover:bg-blue-700
                dark:bg-cyan-500
                dark:hover:bg-cyan-400
                text-white
                dark:text-slate-900
                font-semibold
                duration-300
            "
        >

            <i class="fa-solid fa-file-pdf mr-2"></i>

            Generate Surat

        </button>

    </div>

</form>

    </div>

</div>

<!-- STYLE -->

<style>

.form-label{
    @apply block mb-2 text-sm font-semibold;
    @apply text-gray-700 dark:text-cyan-300;
}

.form-input{
    width:100%;
    padding:12px 16px;
    border-radius:16px;
    border:1px solid #d1d5db;

    background:#ffffff;
    color:#1f2937;

    transition:.3s;
}

.form-input:focus{
    outline:none;
    border-color:#3b82f6;
    box-shadow:0 0 0 3px rgba(59,130,246,.15);
}

/* DARK MODE */

.dark .form-input{
    background:#0f172a;
    border:1px solid rgba(34,211,238,.15);

    color:#f8fafc !important;
}

.dark .form-input:focus{
    border-color:#22d3ee;
    box-shadow:0 0 0 3px rgba(34,211,238,.15);
}

/* PLACEHOLDER */

.form-input::placeholder{
    color:#9ca3af;
}

.dark .form-input::placeholder{
    color:#64748b;
}

/* DATE INPUT */

.dark input[type="date"]{
    color:#f8fafc !important;
}

.dark input[type="date"]::-webkit-calendar-picker-indicator{
    filter: invert(1);
}

/* TEXTAREA */

.dark textarea{
    color:#f8fafc !important;
}

/* SELECT */

.dark select{
    color:#f8fafc !important;
    background:#0f172a;
}

</style>

@endsection