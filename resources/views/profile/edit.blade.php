@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div
        class="
            bg-white
            dark:bg-[#111827]
            rounded-2xl
            shadow-lg
            border
            border-gray-200
            dark:border-cyan-500/20
            overflow-hidden
            duration-300
        "
    >

        <!-- HEADER -->

        <div
            class="
                bg-blue-600
                dark:bg-cyan-500/20
                border-b
                border-transparent
                dark:border-cyan-500/20
                p-8
                text-white
                dark:text-cyan-300
                duration-300
            "
        >

            <div class="flex items-center gap-6">

                @if(auth()->user()->foto)

                <img
                    src="{{ asset(auth()->user()->foto) }}"
                    class="
                        w-28
                        h-28
                        rounded-full
                        object-cover
                        border-4
                        border-white
                        dark:border-cyan-400
                        shadow-lg
                    "
                >

                @else

                <img
                    src="https://ui-avatars.com/api/?name={{ auth()->user()->username }}"
                    class="
                        w-28
                        h-28
                        rounded-full
                        border-4
                        border-white
                        dark:border-cyan-400
                        shadow-lg
                    "
                >

                @endif

                <div>

                    <h1
                        class="
                            text-3xl
                            font-bold
                            text-white
                            dark:text-cyan-300
                        "
                    >
                        {{ auth()->user()->username }}
                    </h1>

                    <p class="opacity-90 dark:text-gray-300">
                        {{ auth()->user()->email }}
                    </p>

                    <div class="mt-3">

                        <span
                            class="
                                bg-white
                                dark:bg-cyan-500/20
                                text-blue-600
                                dark:text-cyan-400
                                border
                                border-transparent
                                dark:border-cyan-500/30
                                px-4
                                py-1
                                rounded-full
                                text-sm
                                font-semibold
                            "
                        >
                            {{ auth()->user()->role }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- FORM -->

        <div class="p-8">

            <form
                action="{{ route('profile.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('patch')

                <!-- USERNAME -->

                <div class="mb-5">

                    <label
                        class="
                            block
                            mb-2
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        value="{{ auth()->user()->username }}"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-gray-200
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                            duration-200
                        "
                    >

                </div>

                <!-- EMAIL -->

                <div class="mb-5">

                    <label
                        class="
                            block
                            mb-2
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ auth()->user()->email }}"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-800
                            dark:text-gray-200
                            rounded-xl
                            p-3
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500
                            dark:focus:ring-cyan-400
                            duration-200
                        "
                    >

                </div>

                <!-- FOTO -->

                <div class="mb-8">

                    <label
                        class="
                            block
                            mb-2
                            font-medium
                            text-gray-700
                            dark:text-gray-300
                        "
                    >
                        Foto Profile
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="
                            w-full
                            border
                            border-gray-300
                            dark:border-cyan-500/20
                            bg-white
                            dark:bg-[#0f172a]
                            text-gray-700
                            dark:text-gray-300
                            rounded-xl
                            p-3
                            file:mr-4
                            file:py-2
                            file:px-4
                            file:rounded-lg
                            file:border-0
                            file:bg-blue-600
                            dark:file:bg-cyan-500/20
                            file:text-white
                            dark:file:text-cyan-400
                            hover:file:bg-blue-700
                            dark:hover:file:bg-cyan-500/40
                            duration-200
                        "
                    >

                </div>

                <!-- BUTTON -->

                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="
                            bg-blue-600
                            hover:bg-blue-700
                            dark:bg-cyan-500/20
                            dark:hover:bg-cyan-500/40
                            dark:border
                            dark:border-cyan-500/30
                            text-white
                            dark:text-cyan-400
                            px-6
                            py-3
                            rounded-xl
                            shadow-lg
                            duration-200
                        "
                    >
                        <i class="fa-solid fa-floppy-disk mr-2"></i>
                        Update Profile
                    </button>

                    <a
                        href="/dashboard"
                        class="
                            bg-gray-200
                            hover:bg-gray-300
                            dark:bg-gray-700
                            dark:hover:bg-gray-600
                            text-gray-700
                            dark:text-gray-200
                            px-6
                            py-3
                            rounded-xl
                            duration-200
                        "
                    >
                        Kembali
                    </a>

                </div>

            </form>

            <!-- GANTI PASSWORD -->

<div
    class="
        mt-8
        p-8
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
            text-2xl
            font-bold
            mb-6
            text-gray-800
            dark:text-cyan-400
        "
    >
        Ganti Password
    </h2>

    <form
        action="{{ route('profile.password') }}"
        method="POST"
    >

        @csrf

        <div class="space-y-5">

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
                    Password Saat Ini
                </label>

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
    
    </label>

        <div class="relative">

            <input
            type="password"
            name="current_password"
            id="current_password"
            class="
                w-full
                p-3
                rounded-xl
                border
                border-gray-300
                dark:border-cyan-500/20
                bg-white
                dark:bg-[#111827]
                text-gray-800
                dark:text-white
                pr-12
                focus:outline-none
                focus:ring-2
                focus:ring-blue-500
                dark:focus:ring-cyan-400
            "
            >

            <button
            type="button"
            onclick="togglePassword('current_password','eye2')"
            class="
                absolute
                right-4
                top-1/2
                -translate-y-1/2
                text-gray-400
                dark:text-cyan-400
                hover:text-blue-600
                dark:hover:text-cyan-300
            "
            >

            <i
                id="eye2"
                class="fa-solid fa-eye"
            ></i>

            </button>

            </div>

            </div>

            </div>

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
                    Password Baru
                </label>

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
     
    </label>

        <div class="relative">

        <input
            type="password"
            name="password"
            id="password"
            class="
                w-full
                p-3
                rounded-xl
                border
                border-gray-300
                dark:border-cyan-500/20
                bg-white
                dark:bg-[#111827]
                text-gray-800
                dark:text-white
                pr-12
                focus:outline-none
                focus:ring-2
                focus:ring-blue-500
                dark:focus:ring-cyan-400
            "
        >

        <button
            type="button"
            onclick="togglePassword('password','eye2')"
            class="
                absolute
                right-4
                top-1/2
                -translate-y-1/2
                text-gray-400
                dark:text-cyan-400
                hover:text-blue-600
                dark:hover:text-cyan-300
            "
        >

            <i
                id="eye2"
                class="fa-solid fa-eye"
            ></i>

        </button>

        </div>

        </div>

            </div>

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
                    Konfirmasi Password Baru
                </label>

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
    
    </label>

        <div class="relative">

        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            class="
                w-full
                p-3
                rounded-xl
                border
                border-gray-300
                dark:border-cyan-500/20
                bg-white
                dark:bg-[#111827]
                text-gray-800
                dark:text-white
                pr-12
                focus:outline-none
                focus:ring-2
                focus:ring-blue-500
                dark:focus:ring-cyan-400
            "
        >

        <button
            type="button"
            onclick="togglePassword('password_confirmation','eye2')"
            class="
                absolute
                right-4
                top-1/2
                -translate-y-1/2
                text-gray-400
                dark:text-cyan-400
                hover:text-blue-600
                dark:hover:text-cyan-300
            "
        >

            <i
                id="eye2"
                class="fa-solid fa-eye"
            ></i>

        </button>

        </div>

        </div>

            </div>

        </div>

        <div class="mt-6">

            <button
                type="submit"
                class="
                    inline-flex
                    items-center
                    gap-2
                    px-6
                    py-3
                    rounded-xl
                    bg-red-600
                    hover:bg-red-700
                    text-white
                    font-medium
                    shadow-lg
                    duration-200
                "
            >

                <i class="fa-solid fa-key"></i>

                Ganti Password

            </button>

        </div>

    </form>

</div>

        </div>

    </div>

</div>


<style>

.form-label{
    @apply block mb-2 font-medium;
    @apply text-gray-700 dark:text-gray-300;
}

.form-input{
    @apply w-full p-3 rounded-xl border;
    @apply border-gray-300 dark:border-cyan-500/20;
    @apply bg-white dark:bg-[#0f172a];
    @apply text-gray-800 dark:text-gray-200;
}

</style>

<script>

function togglePassword(
    inputId,
    eyeId
)
{
    const input =
        document.getElementById(inputId);

    const eye =
        document.getElementById(eyeId);

    if(input.type === 'password')
    {
        input.type = 'text';

        eye.classList.remove(
            'fa-eye'
        );

        eye.classList.add(
            'fa-eye-slash'
        );
    }
    else
    {
        input.type = 'password';

        eye.classList.remove(
            'fa-eye-slash'
        );

        eye.classList.add(
            'fa-eye'
        );
    }
}

</script>

@endsection