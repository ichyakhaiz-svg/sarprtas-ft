@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

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
            p-10
            text-center
            duration-300
        "
    >

        <!-- TITLE -->

        <h1
            class="
                text-3xl
                font-bold
                mb-3
                text-gray-800
                dark:text-cyan-400
            "
        >
            QR Code Barang
        </h1>

        <p
            class="
                text-gray-500
                dark:text-gray-400
                mb-8
            "
        >
            {{ $barang->nama }}
        </p>

        <!-- QR -->

        <div
            class="
                flex
                justify-center
                mb-8
            "
        >

            <div
                class="
                    bg-white
                    p-5
                    rounded-2xl
                    shadow-md
                    border
                    border-gray-200
                "
            >

                {!! QrCode::size(250)->generate(
                    url('/barang/' . $barang->id)
                ) !!}

            </div>

        </div>

        <!-- DETAIL -->

        <div
            class="
                bg-gray-100
                dark:bg-[#0f172a]
                border
                border-gray-200
                dark:border-cyan-500/20
                rounded-xl
                p-5
                text-left
                space-y-3
                duration-300
            "
        >

            <p
                class="
                    text-gray-700
                    dark:text-gray-300
                "
            >
                <strong class="dark:text-cyan-400">
                    Kode:
                </strong>

                {{ $barang->kode }}
            </p>

            <p
                class="
                    text-gray-700
                    dark:text-gray-300
                "
            >
                <strong class="dark:text-cyan-400">
                    Nama:
                </strong>

                {{ $barang->nama }}
            </p>

            <p
                class="
                    text-gray-700
                    dark:text-gray-300
                "
            >
                <strong class="dark:text-cyan-400">
                    Status:
                </strong>

                {{ $barang->status }}
            </p>

        </div>

    </div>

</div>

@endsection