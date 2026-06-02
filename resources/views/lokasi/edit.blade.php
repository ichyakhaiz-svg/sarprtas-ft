@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-8">
            Edit Lokasi
        </h1>

        <form
            action="/lokasi/{{ $lokasi->id }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div>

                <label class="block mb-2 font-medium">
                    Nama Lokasi
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ $lokasi->nama }}"
                    class="w-full border rounded-xl p-3"
                >

            </div>

            <button
                class="
                    mt-6
                    bg-blue-600
                    hover:bg-blue-700
                    text-white
                    px-6
                    py-3
                    rounded-xl
                "
            >
                Update
            </button>

        </form>

    </div>

</div>

@endsection