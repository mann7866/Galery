a@extends('pages.layouts.app')
@section('header')
@include('pages.layouts.header')
@endsection
@section('content')
    <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4 p-5 bg-white space-y-4">
        @foreach ($images as $image)
            <a href="/pichturest/pin/{{ $image->id_unik }}" class="block">
                <img src="{{ asset(''.$image->image) }}"
                    class="w-full rounded-lg shadow-lg hover:opacity-80 transition duration-300" alt="Pinterest style">

                <span class="mb-1 font-semibold mt-0">{{ $image->description }}</span>
                <div class="group flex gap-2 items-center">
                    <img src="{{ asset('images/Screenshot 2025-01-31 102043.png') }}" class="w-8 h-8 rounded-full"
                        alt="">
                    <p>{{ $image->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
