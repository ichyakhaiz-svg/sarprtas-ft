<!DOCTYPE html>
<html>
<head>

    <title>Kartu Inventaris</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 p-10">

<div
    class="
        max-w-md
        mx-auto
        bg-white
        rounded-2xl
        shadow-xl
        overflow-hidden
        border
    "
>

    <!-- HEADER -->

    <div
        class="
            bg-blue-600
            text-white
            text-center
            p-5
        "
    >

        <h1 class="text-2xl font-bold">
            Kartu Inventaris
        </h1>

    </div>

    <!-- CONTENT -->

    <div class="p-6">

        <!-- QR -->

        <div class="flex justify-center mb-6">

            {!! QrCode::size(180)->generate(
                url('/barang/' . $barang->id)
            ) !!}

        </div>

        <!-- FOTO -->

        @if($barang->gambar)

        <div class="flex justify-center mb-6">

            <img
                src="{{ asset('storage/' . $barang->gambar) }}"
                class="
                    w-40
                    h-40
                    object-cover
                    rounded-xl
                    border
                "
            >

        </div>

        @endif

        <!-- DATA -->

        <div class="space-y-3 text-gray-700">

            <p>
                <strong>Kode:</strong>
                {{ $barang->kode }}
            </p>

            <p>
                <strong>Nama:</strong>
                {{ $barang->nama }}
            </p>

            <p>
                <strong>Kategori:</strong>
                {{ $barang->kategori->nama ?? '-' }}
            </p>

            <p>
                <strong>Lokasi:</strong>
                {{ $barang->lokasi->nama ?? '-' }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $barang->status }}
            </p>

            <p>
                <strong>Kondisi:</strong>
                {{ $barang->kondisi }}
            </p>

        </div>

        <!-- BUTTON -->

        <div class="mt-8 text-center">

            <button
                onclick="window.print()"
                class="
                    bg-blue-600
                    hover:bg-blue-700
                    text-white
                    px-6
                    py-3
                    rounded-xl
                "
            >
                Print Kartu
            </button>

        </div>

    </div>

</div>

</body>
</html>