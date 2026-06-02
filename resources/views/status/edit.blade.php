@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-8">
            Edit Status
        </h1>

        <form
            action="/status/{{ $status->id }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <input
                type="text"
                name="nama"
                value="{{ $status->nama }}"
                class="w-full border rounded-xl p-3"
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
                Update
            </button>

        </form>

    </div>

</div>

@endsection