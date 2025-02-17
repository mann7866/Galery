@extends('pages.layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="max-w-screen-lg w-full flex">
            <!-- Tombol Kembali -->
            <a href="kembali" class="inline-block mb-4 text-blue-500 hover:underline mr-4 font-blod text-xl">←</a>

            <!-- Card Layout Seperti Pinterest -->
            <div
                class="bg-white grid grid-cols-1 md:grid-cols-[auto_1fr] gap-6 rounded-xl overflow-hidden border border-gray-100 p-4">
                <!-- Gambar -->
                <img src="{{ asset($image->image) }}" class="w-full md:w-[500px] h-auto object-cover rounded-lg"
                    alt="Image description">

                <!-- Detail Deskripsi & Komentar -->
                <div class="flex flex-col justify-between">
                    <!-- Deskripsi -->
                    <h2 class="text-xl font-semibold">{{ $image->name }}</h2>
                    <p class="text-gray-600">{{ $image->description }}</p>

                    <!-- Dropdown Komentar -->
                    <div x-data="{ open: false }" class="mt-4">
                        <button @click="open = !open" class="text-blue-500 font-semibold">Lihat Komentar</button>

                        <div x-show="open" class="mt-2 bg-gray-100 p-3 rounded-lg max-h-64 overflow-y-auto">
                            @foreach ($image->comments as $comment)
                                <div x-data="{ replyOpen: false }" class="mb-2 p-2 bg-white rounded-lg shadow">

                                    @if ($comment->parent_id == null)
                                        <p class="text-gray-800">
                                            <strong>{{ $comment->user->name }}</strong>: {{ $comment->comment }}
                                        </p>
                                        <!-- Button Balas untuk Komentar -->
                                        <button @click="replyOpen = !replyOpen" class="text-blue-500 text-sm">Balas</button>

                                        <!-- Form Balas untuk Komentar -->
                                        <form action="/comment" method="POST">
                                            @csrf

                                            <div x-show="replyOpen" class="mt-2">
                                                <input type="hidden" name="galeries_id" value="{{ $image->id }}">
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <textarea name="comment" placeholder="Tulis balasan..." class="w-full p-2 border rounded-lg"></textarea>
                                                <button class="mt-2 px-4 py-1 bg-blue-500 text-white rounded-lg">Kirim
                                                    Balasan</button>
                                            </div>
                                        </form>
                                    @endif


                                    <!-- Replies -->
                                    <div class="mt-2">
                                        @foreach ($comment->replies as $reply)
                                            <div x-data="{ replyToReplyOpen: false }"
                                                class="mb-2 ml-4 p-2 bg-gray-100 rounded-lg shadow">
                                                <p class="text-gray-600 text-sm">
                                                    <strong>{{ $reply->user->name }}</strong> <span
                                                        class="text-blue-400">reply to</span>
                                                    <strong>{{ $comment->user->name }}</strong>: {{ $reply->comment }}
                                                </p>

                                                <!-- Button Balas untuk Reply -->
                                                <button @click="replyToReplyOpen = !replyToReplyOpen"
                                                    class="text-blue-500 text-xs">Balas</button>

                                                <!-- Form Balas untuk Reply -->
                                                <form action="/comment" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="galeries_id" value="{{ $image->id }}">
                                                    <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                                                    <div x-show="replyToReplyOpen" class="mt-2">
                                                        <textarea name="comment" placeholder="Tulis balasan untuk balasan ini..." class="w-full p-2 border rounded-lg"></textarea>
                                                        <button
                                                            class="mt-2 px-4 py-1 bg-blue-500 text-white rounded-lg">Kirim
                                                            Balasan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <!-- Form Tambah Komentar -->
                    <div class="mt-4 bg-gray-100 py-4 px-4 rounded-full">
                        <form action="/comment" method="POST" class="flex items-center">
                            @csrf
                            <input type="hidden" name="galeries_id" value="{{ $image->id }}">
                            <textarea name="comment"
                                class="w-full focus:outline-none text-gray-700 px-4 h-10 rounded-full overflow-hidden resize-none"
                                placeholder="Tambahkan komentar"></textarea>
                            <button type="submit"
                                class="bg-red-500 text-white w-8 h-8 flex items-center justify-center rounded-full hover:bg-red-600 transition ml-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cursor-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4 p-5 bg-white space-y-4">
        @foreach ($images as $image)
            <a href="/pichturest/pin/{{ $image->id_unik }}" class="block">
                <img src="{{ asset('' . $image->image) }}"
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
