@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-8">
            Tambah Status
        </h1>

        <form action="/status" method="POST">

            @csrf

            <input
                type="text"
                name="nama"
                class="w-full border rounded-xl p-3"
                placeholder="Nama status"
            >

            <button
                class="
                    mt-6
                    bg-blue-600
                    text-white
                    px-6
                    py-3
                    rounded-xl
                "
            >
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection