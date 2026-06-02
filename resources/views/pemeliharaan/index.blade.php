@extends('layouts.app')

@section('content')

<div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-2xl
        shadow-lg
        p-6
        duration-300
    "
>

    <!-- HEADER -->

    <div
        class="
            flex
            justify-between
            items-center
            mb-6
            flex-wrap
            gap-4
        "
    >

        <div>

            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-800
                    dark:text-cyan-400
                "
            >
                Maintenance Barang
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                    mt-1
                "
            >
                Manajemen pemeliharaan barang inventaris
            </p>

        </div>

        <a
            href="/pemeliharaan/create"
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

            <i class="fa-solid fa-plus mr-2"></i>

            Tambah Maintenance

        </a>

    </div>

    <!-- TABLE -->

    <div class="overflow-x-auto rounded-2xl">

        <table
            class="
                w-full
                border-collapse
                bg-white
                dark:bg-[#0f172a]
            "
        >

            <thead>

                <tr
                    class="
                        bg-blue-600
                        dark:bg-cyan-500/20
                        text-white
                    "
                >

                    <th class="p-4 text-left">
                        No
                    </th>

                    <th class="p-4 text-left">
                        Barang
                    </th>

                    <th class="p-4 text-left">
                        Jenis
                    </th>

                    <th class="p-4 text-left">
                        Jadwal
                    </th>

                    <th class="p-4 text-left">
                        Tanggal Berikutnya
                    </th>

                    <th class="p-4 text-left">
                        Status
                    </th>

                    <th class="p-4 text-left">
                        Keterangan
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($pemeliharaan as $item)

                <tr
                    class="
                        border-b
                        border-gray-200
                        dark:border-cyan-500/10
                        hover:bg-gray-50
                        dark:hover:bg-cyan-500/5
                        duration-200
                    "
                >

                    <td
                        class="
                            p-4
                            text-gray-700
                            dark:text-gray-200
                        "
                    >
                        {{ $loop->iteration }}
                    </td>

                    <td
                        class="
                            p-4
                            text-gray-700
                            dark:text-gray-200
                        "
                    >
                        {{ $item->barang->nama ?? '-' }}
                    </td>

                    <td
                        class="
                            p-4
                            text-gray-700
                            dark:text-gray-200
                        "
                    >
                        {{ $item->jenis }}
                    </td>

                    <td
                        class="
                            p-4
                            text-gray-700
                            dark:text-gray-200
                        "
                    >
                        {{ $item->jadwal }}
                    </td>

                    <td
                        class="
                            p-4
                            text-gray-700
                            dark:text-gray-200
                        "
                    >
                        {{ $item->tanggal_berikutnya }}
                    </td>

                    <!-- STATUS -->

                    <td class="p-4">

                        @if($item->status == 'Pending')

                        <span
                            class="
                                bg-yellow-100
                                dark:bg-yellow-500/20
                                text-yellow-700
                                dark:text-yellow-400
                                px-3
                                py-1
                                rounded-full
                                text-sm
                            "
                        >
                            Pending
                        </span>

                        @elseif($item->status == 'Selesai')

                        <span
                            class="
                                bg-green-100
                                dark:bg-green-500/20
                                text-green-700
                                dark:text-green-400
                                px-3
                                py-1
                                rounded-full
                                text-sm
                            "
                        >
                            Selesai
                        </span>

                        @else

                        <span
                            class="
                                bg-red-100
                                dark:bg-red-500/20
                                text-red-700
                                dark:text-red-400
                                px-3
                                py-1
                                rounded-full
                                text-sm
                            "
                        >
                            Proses
                        </span>

                        @endif

                    </td>

                    <td
                        class="
                            p-4
                            text-gray-700
                            dark:text-gray-200
                        "
                    >
                        {{ $item->keterangan }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->

    <div class="mt-6">

        {{ $pemeliharaan->links() }}

    </div>

</div>

<!-- CHECKLIST MAINTENANCE -->

<div
    class="
        mt-10
        bg-white
        dark:bg-[#111827]
        rounded-2xl
        shadow-lg
        p-6
        duration-300
    "
>

    <div class="mb-6">

        <h2
            class="
                text-2xl
                font-bold
                text-gray-800
                dark:text-cyan-400
            "
        >
            Checklist Maintenance
        </h2>

        <div class="flex justify-end mb-4">

    <a
        href="/checklist-maintenance/create"
        class="
            bg-cyan-500
            hover:bg-cyan-600
            text-gray-900
            dark:text-white
            px-5
            py-3
            rounded-xl
            font-semibold
            duration-200
        "
    >
        + Tambah Checklist
    </a>
</div>

        <p
            class="
                text-gray-500
                dark:text-gray-400
                mt-1
            "
        >
            Monitoring maintenance tahunan
        </p>

    </div>

    <div class="overflow-x-auto rounded-2xl">

        <table
            class="
                w-full
                border-collapse
                text-sm
            "
        >

            <thead>

                <tr
                    class="
                        bg-cyan-500
                        text-white
                    "
                >

                    <th class="p-3 text-left">
                        Kegiatan
                    </th>

                    <th class="p-3 text-left">
                        Frekuensi
                    </th>

                    <th class="p-3 text-left">
                        Petugas
                    </th>

                    <th class="p-3 text-left">
                        Tahun
                    </th>

                    <th class="p-3">Jan</th>
                    <th class="p-3">Feb</th>
                    <th class="p-3">Mar</th>
                    <th class="p-3">Apr</th>
                    <th class="p-3">Mei</th>
                    <th class="p-3">Jun</th>
                    <th class="p-3">Jul</th>
                    <th class="p-3">Aug</th>
                    <th class="p-3">Sep</th>
                    <th class="p-3">Okt</th>
                    <th class="p-3">Nov</th>
                    <th class="p-3">Des</th>
                    <th class="p-3 text-center">
                                Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($checklist as $item)

                <tr
                    class="
                        border-b
                        border-gray-200
                        dark:border-cyan-500/10
                        hover:bg-gray-50
                        dark:hover:bg-cyan-500/5
                        duration-200
                    "
                >

                    <td class="p-3 text-gray-700 dark:text-gray-200">
                        {{ $item->kegiatan }}
                    </td>

                    <td class="p-3 text-gray-700 dark:text-gray-200">
                        {{ $item->frekuensi }}
                    </td>

                    <td class="p-3 text-gray-700 dark:text-gray-200">
                        {{ $item->petugas }}
                    </td>

                    <td class="p-3 text-gray-700 dark:text-gray-200">
                        {{ $item->tahun }}
                    </td>

                    @foreach([
                        'jan',
                        'feb',
                        'mar',
                        'apr',
                        'mei',
                        'jun',
                        'jul',
                        'aug',
                        'sep',
                        'okt',
                        'nov',
                        'des'
                    ] as $bulan)

                    <td class="p-3 text-center">

                        @if($item->$bulan)

                        <span
                            class="
                                text-green-500
                                font-bold
                                text-lg
                            "
                        >
                            ✓
                        </span>

                        @else

                        <span
                            class="
                                text-red-500
                                font-bold
                                text-lg
                            "
                        >
                            ✕
                        </span>

                        @endif

                    </td>

                    @endforeach

                </tr>

                @endforeach

                <td class="p-3">

    <div class="flex gap-2 justify-center">

        <a
            href="/checklist-maintenance/{{ $item->id }}/edit"
            class="
                bg-yellow-500
                hover:bg-yellow-600
                text-white
                px-4
                py-2
                rounded-lg
                duration-200
            "
        >
            Edit
        </a>

        <form
            action="/checklist-maintenance/{{ $item->id }}"
            method="POST"
        >

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Yakin hapus checklist?')"
                class="
                    bg-red-500
                    hover:bg-red-600
                    text-white
                    px-4
                    py-2
                    rounded-lg
                    duration-200
                "
            >
                Hapus
            </button>

        </form>

    </div>

</td>

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->

    <div class="mt-6">

        {{ $checklist->links() }}

    </div>

</div>


@endsection