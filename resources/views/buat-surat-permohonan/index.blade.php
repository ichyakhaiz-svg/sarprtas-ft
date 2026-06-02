@extends('layouts.app')

@section('content')

 <!-- HEADER -->

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Surat Permohonan
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                    mt-1
                "
            >
                
            </p>

        </div>

        <a
            href="/buat-surat-permohonan/create"
            class="
                px-5
                py-3
                rounded-2xl
                bg-blue-600
                hover:bg-blue-700
                dark:bg-cyan-500/20
                dark:hover:bg-cyan-500/30
                text-white
                dark:text-cyan-400
                font-medium
                shadow-lg
                duration-300
                hover:scale-105
            "
        >
            + Tambah Surat
        </a>

    </div>

@endsection