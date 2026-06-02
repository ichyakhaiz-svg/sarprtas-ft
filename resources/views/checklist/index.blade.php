@extends('layouts.app')

@section('content')

<div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-2xl
        shadow-lg
        p-6
    "
>

    <div
        class="
            flex
            justify-between
            items-center
            mb-6
        "
    >

        <h1
            class="
                text-3xl
                font-bold
                text-gray-800
                dark:text-cyan-400
            "
        >
            Checklist Maintenance
        </h1>

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
            "
        >
            + Tambah Checklist
        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

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
                        dark:border-cyan-500/10
                    "
                >

                    <td class="p-3">
                        {{ $item->kegiatan }}
                    </td>

                    <td class="p-3">
                        {{ $item->frekuensi }}
                    </td>

                    <td class="p-3">
                        {{ $item->petugas }}
                    </td>

                    <td class="p-3">
                        {{ $item->tahun }}
                    </td>

                    <td class="p-3">

                        <div class="flex gap-2">

                            <a
                                href="/checklist-maintenance/{{ $item->id }}/edit"
                                class="
                                    bg-yellow-500
                                    text-white
                                    px-4
                                    py-2
                                    rounded-lg
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
                                    class="
                                        bg-red-500
                                        text-white
                                        px-4
                                        py-2
                                        rounded-lg
                                    "
                                >
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $checklist->links() }}

    </div>

</div>

@endsection