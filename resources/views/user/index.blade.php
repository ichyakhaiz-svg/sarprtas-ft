@extends('layouts.app')

@section('content')

<div
    class="
        bg-white
        dark:bg-[#111827]
        rounded-3xl
        p-6
        shadow-xl
    "
>

    <div
        class="
            flex
            justify-between
            items-center
            mb-8
        "
    >

        <div>

            <h1
                class="
                    text-3xl
                    font-bold
                    dark:text-cyan-400
                "
            >
                Manajemen User
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                "
            >
                Kelola pengguna sistem
            </p>

        </div>

        <a
            href="#"
            class="
                px-5
                py-3
                rounded-2xl
                bg-blue-600
                text-white
            "
        >
            + Tambah User
        </a>

    </div>

    <table class="w-full">

        <thead>

            <tr>

                <th class="p-4 text-left">
                    Username
                </th>

                <th class="p-4 text-left">
                    Role
                </th>

                <th class="p-4 text-center">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($user as $u)

            <tr>

                <td class="p-4">
                    {{ $u->username }}
                </td>

                <td class="p-4">
                    {{ $u->role }}
                </td>

                <td class="p-4">

                    <div
                        class="
                            flex
                            justify-center
                            gap-2
                        "
                    >

                        <a
                            href="/user/{{ $u->id }}/edit"
                            class="
                                px-3
                                py-2
                                bg-yellow-500
                                text-white
                                rounded-xl
                            "
                        >
                            Edit
                        </a>

                        <a
                            href="/user/reset-password/{{ $u->id }}"
                            onclick="return confirm('Reset password user?')"
                            class="
                                px-3
                                py-2
                                bg-blue-600
                                text-white
                                rounded-xl
                            "
                        >
                            Reset Password
                        </a>

                        <form
                            action="/user/{{ $u->id }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                class="
                                    px-3
                                    py-2
                                    bg-red-600
                                    text-white
                                    rounded-xl
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

@endsection