@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div
        class="
            bg-white
            dark:bg-[#111827]
            border
            border-gray-200
            dark:border-cyan-500/10
            rounded-3xl
            shadow-xl
            p-8
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
                Tambah Surat Permohonan
            </h1>

            <p
                class="
                    mt-2
                    text-gray-500
                    dark:text-gray-400
                "
            >
                Form input surat permohonan sarpras
            </p>

        </div>

        <!-- FORM -->

        <form
            method="POST"
            action="/surat-permohonan/store"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- NOMOR SURAT -->

                <div>

                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Nomor Surat
                    </label>

                    <input
                        type="text"
                        name="nomor_surat"
                        class="
                            w-full
                            px-4
                            py-3
                            rounded-2xl
                            border
                            border-gray-300
                            dark:border-cyan-500/10
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                            duration-200
                        "
                    >

                </div>

                <!-- TANGGAL -->

                <div>

                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Tanggal Surat
                    </label>

                    <input
                        type="date"
                        name="tanggal_surat"
                        class="
                            w-full
                            px-4
                            py-3
                            rounded-2xl
                            border
                            border-gray-300
                            dark:border-cyan-500/10
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                            duration-200
                        "
                    >

                </div>

                <!-- KEPADA -->

                <div>

                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Kepada
                    </label>

                    <input
                        type="text"
                        name="kepada"
                        class="
                            w-full
                            px-4
                            py-3
                            rounded-2xl
                            border
                            border-gray-300
                            dark:border-cyan-500/10
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                            duration-200
                        "
                    >

                </div>

                <!-- PERIHAL -->

                <div>

                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Perihal
                    </label>

                    <input
                        type="text"
                        name="perihal"
                        class="
                            w-full
                            px-4
                            py-3
                            rounded-2xl
                            border
                            border-gray-300
                            dark:border-cyan-500/10
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                            duration-200
                        "
                    >

                </div>

                <!-- KETERANGAN -->

                <div class="md:col-span-2">

                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="5"
                        class="
                            w-full
                            px-4
                            py-3
                            rounded-2xl
                            border
                            border-gray-300
                            dark:border-cyan-500/10
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-white
                            focus:outline-none
                            focus:ring-2
                            focus:ring-cyan-400
                            duration-200
                        "
                    ></textarea>

                </div>

                <!-- FILE -->

                <div class="md:col-span-2">

                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Upload File Surat
                    </label>

                    <input
                        type="file"
                        name="file_surat"
                        class="
                            w-full
                            px-4
                            py-3
                            rounded-2xl
                            border
                            border-gray-300
                            dark:border-cyan-500/10
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-700
                            dark:text-gray-300
                        "
                    >

                </div>

            </div>

            <!-- BUTTON -->

            <div class="mt-8 flex gap-4">

                <button
                    type="submit"
                    class="
                        px-6
                        py-3
                        rounded-2xl
                        bg-cyan-500
                        hover:bg-cyan-400
                        text-black
                        font-semibold
                        shadow-lg
                        shadow-cyan-500/20
                        duration-300
                    "
                >
                    <i class="fa-solid fa-floppy-disk mr-2"></i>
                    Simpan Surat
                </button>

                <a
                    href="/surat-permohonan"
                    class="
                        px-6
                        py-3
                        rounded-2xl
                        bg-gray-200
                        dark:bg-gray-700
                        hover:bg-gray-300
                        dark:hover:bg-gray-600
                        text-gray-800
                        dark:text-white
                        duration-300
                    "
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

@endsection