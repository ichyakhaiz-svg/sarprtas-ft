@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div
        class="
            bg-white
            dark:bg-[#111827]
            rounded-2xl
            shadow-lg
            border
            border-gray-200
            dark:border-cyan-500/10
            p-8
            duration-300
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
                Scan QR Barang
            </h1>

            <p
                class="
                    text-gray-500
                    dark:text-gray-400
                    mt-2
                "
            >
                Arahkan kamera ke QR Code barang
            </p>

        </div>

        <!-- SCANNER -->

        <div
            class="
                bg-gray-50
                dark:bg-[#0f172a]
                border
                border-gray-200
                dark:border-cyan-500/10
                rounded-2xl
                p-4
                duration-300
            "
        >

            <div
                id="reader"
                class="
                    w-full
                    overflow-hidden
                    rounded-xl
                "
            ></div>

        </div>

        <!-- INFO -->

        <div
            class="
                mt-6
                bg-blue-50
                dark:bg-cyan-500/10
                border
                border-blue-100
                dark:border-cyan-500/20
                rounded-2xl
                p-4
                duration-300
            "
        >

            <div class="flex items-start gap-3">

                <div
                    class="
                        w-10
                        h-10
                        flex
                        items-center
                        justify-center
                        rounded-xl
                        bg-blue-100
                        dark:bg-cyan-500/20
                        text-blue-600
                        dark:text-cyan-400
                    "
                >
                    <i class="fa-solid fa-camera"></i>
                </div>

                <div>

                    <h3
                        class="
                            font-semibold
                            text-gray-800
                            dark:text-cyan-300
                        "
                    >
                        Tips Scan QR
                    </h3>

                    <ul
                        class="
                            text-sm
                            text-gray-600
                            dark:text-gray-400
                            mt-2
                            space-y-1
                        "
                    >
                        <li>• Pastikan kamera diizinkan</li>
                        <li>• Arahkan QR tepat di tengah kamera</li>
                        <li>• Gunakan pencahayaan yang cukup</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://unpkg.com/html5-qrcode"></script>

<script>

function onScanSuccess(decodedText)
{
    window.location.href = decodedText;
}

let html5QrcodeScanner =
    new Html5QrcodeScanner(
        "reader",
        {
            fps: 10,
            qrbox: 250,
            aspectRatio: 1.0
        }
    );

html5QrcodeScanner.render(
    onScanSuccess
);

</script>

@endsection