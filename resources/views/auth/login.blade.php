<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Login Inventaris
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

</head>

<body
    class="
        min-h-screen
        flex
        items-center
        justify-center
        bg-cover
        bg-center
        relative
    "
    style="
    background-image:
    url('{{ asset('images/landing-kampus.png') }}');
    "
>

<!-- OVERLAY -->

<div
    class="
        absolute
        inset-0
        bg-slate-950/75
        backdrop-blur-md
    "
></div>

<a
    href="/"
    class="
        absolute
        top-6
        left-6
        text-white
        hover:text-cyan-400
        duration-300
        flex
        items-center
        gap-2
    "
>

    <i class="fa-solid fa-arrow-left"></i>


</a>

<!-- LOGIN CARD -->

<div
    class="
        relative overflow-hidden
        relative
        z-10
        w-full
        max-w-md
        bg-white/10
        backdrop-blur-xl
        border
        border-white/20
        shadow-2xl
        rounded-3xl
        p-10
        text-white
    "
>

    <!-- LOGO -->

    <div class="text-center mb-8">

        <div class="text-center mb-8">

        <img
            src="{{ asset('images/logo-unik.png') }}"
            class="
            w-28
            h-28
            object-contain
            mx-auto
            drop-shadow-2xl
            mb-4
            "
        >

        </div>

        <h1
            class="
                text-3xl
                font-bold
            "
        >
            Inventaris Sarpras 
        </h1>

        <p class="text-gray-200 mt-2">
            Sistem Manajemen Inventaris Fakultas Teknik Universitas Kadiri
        </p>

    </div>

    <!-- FORM -->

    <form
    method="POST"
    action="{{ route('login') }}"
    onsubmit="showLoading()"
    >

        @csrf

        <!-- USERNAME -->

        <div class="mb-5">

            <label class="block mb-2 text-sm">
                Username
            </label>

            <div class="relative">

                <i
                    class="
                        fa-solid
                        fa-user
                        absolute
                        left-4
                        top-1/2
                        -translate-y-1/2
                        text-gray-400
                    "
                ></i>

                <input
                    type="text"
                    name="username"
                    required
                    autofocus
                    class="
                        w-full
                        bg-white/10
                        border
                        border-white/20
                        rounded-xl
                        py-3
                        pl-12
                        pr-4
                        text-white
                        placeholder-gray-300
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-500
                    "
                    placeholder="Masukkan username"
                >

            </div>

        </div>

        <!-- PASSWORD -->

        <div class="mb-6">

            <label class="block mb-2 text-sm">
                Password
            </label>

            <div class="relative">

            <i
            class="
                fa-solid
                fa-lock
                absolute
                left-4
                top-1/2
                -translate-y-1/2
                text-gray-400
            "
            ></i>

            <input
                type="password"
                name="password"
                id="password"
                required
                class="
                w-full
                bg-white/10
                border
                border-white/20
                rounded-xl
                py-3
                pl-12
                pr-12
                text-white
                placeholder-gray-300
                focus:outline-none
                focus:ring-2
                focus:ring-blue-500
             "
                placeholder="Masukkan password"
            >

        <!-- TOGGLE -->

            <button
                type="button"
                onclick="togglePassword()"
                class="
                absolute
                right-4
                top-1/2
                -translate-y-1/2
                text-gray-300
                hover:text-white
            "
            >

            <i
                id="eyeIcon"
                class="fa-solid fa-eye"
            ></i>

            </button>

        </div>

        <div class="mt-4 text-center">

        <a
        href="/forgot-password"
        class="
            text-cyan-300
            hover:text-cyan-200
            text-sm
        "
        >
        Lupa Password?
        </a>

        </div>

        </div>

        <!-- BUTTON -->

        <button
            type="submit"
            id="loginButton"
            class="
            w-full
            bg-blue-600
            hover:bg-blue-700
            duration-200
            py-3
            rounded-xl
            font-semibold
            shadow-lg
            flex
            items-center
            justify-center
            gap-3
            "
        >

            <span id="buttonText">
                Login
            </span>

        <!-- SPINNER -->

            <svg
                id="loadingSpinner"
                class="
                hidden
                animate-spin
                h-5
                w-5
                text-white
                "
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >

            <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
            ></circle>

            <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8v8H4z"
            ></path>

        </svg>

        </button>

    </form>

    <!-- FOOTER -->

    <div
        class="
            text-center
            text-sm
            text-gray-300
            mt-8
        "
    >

        © {{ date('Y') }}
        Inventaris Sarpras / by Khaiz FT

    </div>

    

</div>

<script>

function togglePassword()
{
    const password =
        document.getElementById('password');

    const eyeIcon =
        document.getElementById('eyeIcon');

    if(password.type === 'password')
    {
        password.type = 'text';

        eyeIcon.classList.remove('fa-eye');

        eyeIcon.classList.add('fa-eye-slash');
    }
    else
    {
        password.type = 'password';

        eyeIcon.classList.remove('fa-eye-slash');

        eyeIcon.classList.add('fa-eye');
    }
}

</script>

<script>

function showLoading()
{
    const button =
        document.getElementById('loginButton');

    const text =
        document.getElementById('buttonText');

    const spinner =
        document.getElementById('loadingSpinner');

    button.disabled = true;

    button.classList.add(
        'opacity-80',
        'cursor-not-allowed'
    );

    text.innerHTML =
        'Memproses...';

    spinner.classList.remove('hidden');
}

</script>

</body>
</html>