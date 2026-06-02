<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Sistem Inventaris Sarpras
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />

</head>

<body class="overflow-x-hidden">

<section
    class="
        relative
        min-h-screen
        overflow-hidden
    "
>

    <!-- BACKGROUND -->

    <div
        class="
            absolute
            inset-0
        "
        style="
            background-image:url('{{ asset('images/landing-kampus.png') }}');
            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;
        "
    ></div>

    <!-- OVERLAY -->

    <div
        class="
            absolute
            inset-0
            bg-slate-950/65
        "
    ></div>

    <!-- NAVBAR -->

    <div
        class="
            relative
            z-20
            max-w-7xl
            mx-auto
            px-8
            py-8
            flex
            justify-between
            items-center
        "
    >

        <div
            class="
                flex
                items-center
                gap-4
            "
        >

        </div>

        <a
            href="/login"
            class="
                px-7
                py-3
                rounded-2xl
                bg-blue-600
                hover:bg-blue-700
                text-white
                font-semibold
                shadow-2xl
                duration-300
                hover:scale-105
            "
        >
            Login
        </a>

    </div>

    <!-- HERO -->

    <div
        class="
            relative
            z-20
            max-w-7xl
            mx-auto
            px-8
            min-h-[75vh]
            flex
            items-center
        "
    >

        <div class="max-w-3xl">

            <div
                class="
                    inline-flex
                    items-center
                    gap-2
                    px-5
                    py-2
                    rounded-full
                    bg-white/10
                    backdrop-blur-md
                    border
                    border-white/20
                    text-white
                    mb-8
                "
            >

                <i class="fa-solid fa-building"></i>

                Sistem Inventaris Modern

            </div>

            <h1
                class="
                    text-6xl
                    md:text-7xl
                    font-extrabold
                    text-white
                    leading-tight
                "
            >

                SISTEM

                <br>

                INVENTARIS

                <span class="text-cyan-400">
                    SARPRAS
                </span>

            </h1>

            <h2
                class="
                    mt-4
                    text-3xl
                    text-white/90
                "
            >
                FAKULTAS TEKNIK UNIVERSITAS KADIRI
            </h2>

            <p
                class="
                    mt-8
                    text-xl
                    text-gray-300
                    max-w-2xl
                "
            >
                Kelola inventaris barang,
                peminjaman, maintenance,
                berita acara, surat permohonan
                dan laporan secara terintegrasi.
            </p>

            <div
                class="
                    mt-10
                    flex
                    flex-wrap
                    gap-4
                "
            >

                <a
                    href="/login"
                    class="
                        px-8
                        py-4
                        rounded-2xl
                        bg-cyan-500
                        hover:bg-cyan-400
                        text-slate-900
                        font-bold
                        shadow-2xl
                    "
                >
                    Mulai Sekarang
                </a>

                <a
                    href="#fitur"
                    class="
                        px-8
                        py-4
                        rounded-2xl
                        border
                        border-white/30
                        text-white
                        backdrop-blur-md
                    "
                >
                    Lihat Fitur
                </a>

            </div>

        </div>

    </div>

</section>

<!-- FITUR -->

<section
    id="fitur"
    class="
        bg-white
        py-20
    "
>

    <div
        class="
            max-w-7xl
            mx-auto
            px-8
        "
    >

        <div class="text-center mb-14">

            <h2
                class="
                    text-4xl
                    font-bold
                "
            >
                Fitur Utama
            </h2>

            <p
                class="
                    mt-4
                    text-gray-500
                "
            >
                Sistem inventaris terintegrasi
            </p>

        </div>

        <div
            class="
                grid
                md:grid-cols-4
                gap-6
            "
        >

            <div class="p-8 rounded-3xl shadow-xl">

                <i class="fa-solid fa-box text-5xl text-blue-600"></i>

                <h3 class="mt-5 text-xl font-bold">
                    Inventaris
                </h3>

            </div>

            <div class="p-8 rounded-3xl shadow-xl">

                <i class="fa-solid fa-right-left text-5xl text-green-600"></i>

                <h3 class="mt-5 text-xl font-bold">
                    Peminjaman
                </h3>

            </div>

            <div class="p-8 rounded-3xl shadow-xl">

                <i class="fa-solid fa-screwdriver-wrench text-5xl text-orange-500"></i>

                <h3 class="mt-5 text-xl font-bold">
                    Maintenance
                </h3>

            </div>

            <div class="p-8 rounded-3xl shadow-xl">

                <i class="fa-solid fa-file-pdf text-5xl text-red-500"></i>

                <h3 class="mt-5 text-xl font-bold">
                    Laporan
                </h3>

            </div>

        </div>

    </div>

</section>

</body>
</html>