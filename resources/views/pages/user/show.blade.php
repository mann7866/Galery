@extends('pages.layouts.app')

@push('link')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom scrollbar transparan */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(244, 244, 244, 0.2);
            /* Transparan */
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.3);
            /* Hover lebih gelap */
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            /* Track transparan */
        }
    </style>
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush

@section('content')
    <div class="flex justify-center">
        <div class="max-w-screen-lg w-full flex">
            <!-- Tombol Kembali -->
            <a href="javascript:void(0)" onclick="history.back()"
                class="inline-block mb-4 text-gray-500 hover:text-gray-700 hover:underline hover:rounded-full hover:p-2 transition-all mr-4 font-bold text-3xl">
                <i class="fas fa-arrow-left"></i>
            </a>

            <!-- Card Layout Seperti Pinterest -->
            <div
                class="bg-white grid grid-cols-1 md:grid-cols-[auto_1fr] gap-6 rounded-xl overflow-hidden border border-gray-100 p-4">
                <!-- Gambar -->
                <img src="{{ asset($image->image) }}" class="w-full md:w-[500px] h-auto object-cover rounded-lg"
                    alt="Image description">

                <!-- Detail Deskripsi & Komentar -->
                <div
                    class="flex flex-col justify-between overflow-y-auto max-h-[400px] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-transparent">
                    <!-- Deskripsi -->
                    <div class="group">
                        <h2 class="text-xl font-semibold">{{ $image->name }}</h2>
                        <p class="text-gray-600 text-sm">
                            <span x-data="{ expanded: false }">
                                <span x-show="!expanded">{{ Str::limit($image->description, 2, '...') }}</span>
                                <span x-show="expanded">{{ $image->description }}</span>
                                <button @click="expanded = !expanded" class="text-blue-500 underline">
                                    <span x-show="!expanded" class="cursor-pointer">Selengkapnya
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </span>
                                    <span x-show="expanded" class="cursor-pointer">Sembunyikan
                                        <i class="fa-solid fa-chevron-up"></i>
                                    </span>
                                </button>
                            </span>
                        </p>

                        <!-- komentar -->
                        <section x-data="{ expanded: false }" class="bg-white mt-0 py-8 lg:py-16 antialiased">
                            <div class="flex justify-between">
                                <p>Kommentar</p>
                                <button @click="expanded = !expanded" class="text-blue-500 text-sm underline">
                                    <span x-show="!expanded" class="cursor-pointer">lihat
                                        <i class="fa-solid fa-eye"></i>
                                    </span>
                                    <span x-show="expanded" class="cursor-pointer">tutup
                                        <i class="fa-solid fa-eye-slash"></i>
                                    </span>
                                </button>
                            </div>
                            <div x-show="!expanded"
                                class="max-w-2xl mx-auto px-4 w-full bg-white border-2 border-gray-100 rounded-lg overflow-y-auto max-h-[200px]">
                            </div>
                            <div x-show="expanded"
                                class="max-w-2xl mx-auto px-4 bg-white border-2 border-gray-100 rounded-lg overflow-y-auto max-h-[200px]">
                                <article x-data="{ expanded: false }" class="p-6 mb-3 text-xs border-t border-gray-200">
                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center justify-between w-full">
                                            <div class="flex items-center space-x-4">
                                                <!-- Nama & Profil -->
                                                <p class="inline-flex items-center text-sm text-gray-900 font-semibold">
                                                    <img class="mr-2 w-6 h-6 rounded-full"
                                                        src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                                        alt="Bonnie Green">
                                                    Bonnie Green
                                                </p>
                                                <!-- Waktu -->
                                                <p class="text-sm text-gray-600">
                                                    <time pubdate datetime="2022-03-12" title="March 12th, 2022">Mar. 12,
                                                        2022</time>
                                                </p>
                                            </div>

                                            <!-- Button Dropdown -->
                                            <div x-data="{ open: false }" class="relative inline-block text-left ml-auto">
                                                <button @click="open = !open"
                                                    class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50">
                                                    <svg class="w-4 h-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                    <span class="sr-only">Comment settings</span>
                                                </button>

                                                <!-- Dropdown -->
                                                <div x-show="open" @click.away="open = false"
                                                    class="absolute right-0 mt-2 w-36 bg-white rounded-md shadow-lg z-10 border border-gray-200">
                                                    <ul class="py-1 text-sm text-gray-700">
                                                        <li>
                                                            <button @click="expanded = !expanded"
                                                                class=" text-start w-full">
                                                                <a href="#"
                                                                    class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                                            </button>
                                                        </li>
                                                        <li x-data="{ openRemove: false, openReport: false, item: '' }">
                                                            <a href="#" @click="openRemove = true; item = 'Item 1'"
                                                                class="block px-4 py-2 hover:bg-gray-100">Remove</a>

                                                            <!-- Modal Remove -->
                                                            <div x-show="openRemove" x-transition
                                                                class="fixed inset-0 z-50 bg-opacity-75 flex justify-center items-center">
                                                                <div class="bg-white bg-opacity-80 rounded-lg w-1/3 p-6">
                                                                    <h2 class="text-lg font-semibold mb-4">Are you sure you
                                                                        want to remove <span x-text="item"></span>?</h2>
                                                                    <div class="flex justify-between">
                                                                        <button @click="openRemove = false"
                                                                            class="px-4 py-2 bg-gray-300 rounded cursor-pointer">Cancel</button>
                                                                        <button @click="openRemove = false"
                                                                            class="px-4 py-2 bg-red-500 text-white rounded cursor-pointer">Remove</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li x-data="{ openRemove: false, openReport: false, item: '' }">
                                                            <a href="#" @click="openReport = true; item = 'Item 1'"
                                                                class="block px-4 py-2 hover:bg-gray-100">Report</a>

                                                            <!-- Modal Report -->
                                                            <div x-show="openReport" x-transition
                                                                class="fixed inset-0 z-50 flex justify-center items-center">
                                                                <div class="bg-white bg-opacity-80 rounded-lg w-1/3 p-6">
                                                                    <h2 class="text-lg font-semibold mb-4">Report <span
                                                                            x-text="item"></span></h2>
                                                                    <textarea class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Explain the issue..."></textarea>
                                                                    <div class="flex justify-between">
                                                                        <button @click="openReport = false"
                                                                            class="px-4 py-2 bg-gray-300 rounded cursor-pointer">Cancel</button>
                                                                        <button @click="openReport = false"
                                                                            class="px-4 py-2 bg-blue-500 text-white rounded cursor-pointer">Submit
                                                                            Report</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </footer>
                                    <form action="#" method="">
                                        <p x-show="!expanded" class="text-gray-500">The article covers the essentials,
                                            challenges, myths, and
                                            stages the UX designer should consider while creating the design strategy.</p>

                                        <textarea x-show="expanded" class="w-full p-2 border border-gray-300 rounded-md" rows="3">The article covers the essentials,challenges, myths, and stages the UX designer should consider while creating the design strategy.</textarea>
                                        <div x-show="expanded" class="flex gap-2 justify-end mt-1">
                                            <button type="submit"
                                                class="bg-blue-500 text-white flex items-center justify-center rounded-lg h-10 px-4 hover:bg-blue-600 transition">Simpan</button>
                                            <button @click="expanded = !expanded"
                                                class="bg-gray-500 text-white flex items-center justify-center rounded-md h-10 px-4 hover:bg-gray-600 transition">Batal</button>
                                            </button>
                                        </div>
                                    </form>


                                    <!-- Reply -->
                                    <div x-data="{ reply: false }" class="space-y-2">
                                        <!-- Button Reply with Message Icon -->
                                        <button @click="reply = !reply" class="text-blue-500 text-sm">
                                            <span x-show="!reply"
                                                class="flex gap-2 items-center text-gray-700 p-2 hover:text-gray-800 transition">
                                                <i class="fas fa-comment-alt"></i> <!-- Font Awesome Message Icon -->
                                                <span class="ml-2 cursor-pointer">Balas</span>
                                            </span>
                                        </button>

                                        <!-- Form for Reply -->
                                        <div class="flex gap-0 justify-end mt-2" x-show="reply">
                                            <form action="" class="w-full">
                                                <textarea class="w-full p-2 border border-gray-300 rounded-md" rows="3" placeholder="Tulis balasan..."></textarea>

                                                <div class="flex gap-2 justify-end mt-2">
                                                    <button type="submit"
                                                        class="bg-blue-500 text-white flex items-center justify-center rounded-lg h-10 px-4 hover:bg-blue-600 transition">Simpan</button>
                                                    <button @click="reply = !reply"
                                                        class="bg-gray-500 text-white flex items-center justify-center rounded-md h-10 px-4 hover:bg-gray-600 transition">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </article>

                                <article x-data="{ expanded: false }"
                                    class="p-6 text-xs border-t mb-3 ml-6 lg:ml-12 rounded-lg border-gray-200">
                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center space-x-4 w-full">
                                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold">
                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                                    alt="Jese Leos">Jese Leos
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <time pubdate datetime="2022-02-12" title="February 12th, 2022">Feb. 12,
                                                    2022</time>
                                            </p>

                                            <!-- Button Dropdown -->
                                            <div x-data="{ open: false }" class="relative inline-block text-left ml-auto">
                                                <button @click="open = !open"
                                                    class="inline-flex items-center p-2 text-sm font-medium text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50">
                                                    <svg class="w-4 h-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                    <span class="sr-only">Comment settings</span>
                                                </button>

                                                <!-- Dropdown -->
                                                <div x-show="open" @click.away="open = false"
                                                    class="absolute right-0 mt-2 w-36 bg-white rounded-md shadow-lg z-10 border border-gray-200">
                                                    <ul class="py-1 text-sm text-gray-700">
                                                        <li>
                                                            <button @click="expanded = !expanded"
                                                                class=" text-start w-full">
                                                                <a href="#"
                                                                    class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                                            </button>
                                                        </li>
                                                        <li x-data="{ openRemove: false, openReport: false, item: '' }">
                                                            <a href="#" @click="openRemove = true; item = 'Item 1'"
                                                                class="block px-4 py-2 hover:bg-gray-100">Remove</a>

                                                            <!-- Modal Remove -->
                                                            <div x-show="openRemove" x-transition
                                                                class="fixed inset-0 z-50 bg-opacity-75 flex justify-center items-center">
                                                                <div class="bg-white bg-opacity-80 rounded-lg w-1/3 p-6">
                                                                    <h2 class="text-lg font-semibold mb-4">Are you sure you
                                                                        want to remove <span x-text="item"></span>?</h2>
                                                                    <div class="flex justify-between">
                                                                        <button @click="openRemove = false"
                                                                            class="px-4 py-2 bg-gray-300 rounded cursor-pointer">Cancel</button>
                                                                        <button @click="openRemove = false"
                                                                            class="px-4 py-2 bg-red-500 text-white rounded cursor-pointer">Remove</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li x-data="{ openRemove: false, openReport: false, item: '' }">
                                                            <a href="#" @click="openReport = true; item = 'Item 1'"
                                                                class="block px-4 py-2 hover:bg-gray-100">Report</a>

                                                            <!-- Modal Report -->
                                                            <div x-show="openReport" x-transition
                                                                class="fixed inset-0 z-50 flex justify-center items-center">
                                                                <div class="bg-white bg-opacity-80 rounded-lg w-1/3 p-6">
                                                                    <h2 class="text-lg font-semibold mb-4">Report <span
                                                                            x-text="item"></span></h2>
                                                                    <textarea class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Explain the issue..."></textarea>
                                                                    <div class="flex justify-between">
                                                                        <button @click="openReport = false"
                                                                            class="px-4 py-2 bg-gray-300 rounded cursor-pointer">Cancel</button>
                                                                        <button @click="openReport = false"
                                                                            class="px-4 py-2 bg-blue-500 text-white rounded cursor-pointer">Submit
                                                                            Report</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </footer>
                                    <form action="#" method="">
                                        <p x-show="!expanded" class="text-gray-500">Much appreciated! Glad you liked it☺️.
                                        </p>

                                        <textarea x-show="expanded" class="w-full p-2 border border-gray-300 rounded-md" rows="3">Much appreciated! Glad you liked it ☺️.</textarea>
                                        <div x-show="expanded" class="flex gap-2 justify-end mt-1">
                                            <button type="submit"
                                                class="bg-blue-500 text-white flex items-center justify-center rounded-lg h-10 px-4 hover:bg-blue-600 transition cursor-pointer">Simpan</button>
                                            <button @click="expanded = !expanded"
                                                class="bg-gray-500 text-white flex items-center justify-center rounded-md h-10 px-4 hover:bg-gray-600 transition cursor-pointer">Batal</button>
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Reply -->
                                    <div x-data="{ reply: false }" class="space-y-2">
                                        <!-- Button Reply with Message Icon -->
                                        <button @click="reply = !reply" class="text-blue-500 text-sm">
                                            <span x-show="!reply"
                                                class="flex gap-2 items-center text-gray-700 p-2 hover:text-gray-800 transition">
                                                <i class="fas fa-comment-alt"></i> <!-- Font Awesome Message Icon -->
                                                <span class="ml-2 cursor-pointer">Balas</span>
                                            </span>
                                        </button>

                                        <!-- Form for Reply -->
                                        <div class="flex gap-0 justify-end mt-2" x-show="reply">
                                            <form action="" class="w-full">
                                                <textarea class="w-full p-2 border border-gray-300 rounded-md" rows="3" placeholder="Tulis balasan..."></textarea>

                                                <div class="flex gap-2 justify-end mt-2">
                                                    <button type="submit"
                                                        class="bg-blue-500 text-white flex items-center justify-center rounded-lg h-10 px-4 hover:bg-blue-600 transition cursor-pointer">Simpan</button>
                                                    <button @click="reply = !reply"
                                                        class="bg-gray-500 text-white flex items-center justify-center rounded-md h-10 px-4 hover:bg-gray-600 transition cursor-pointer">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- Form Tambah Komentar -->
                            <div class="mt-4 bg-gray-100 py-2 px-2 rounded-full">
                                <form action="{{ route('comment.store') }}" method="POST" class="flex items-center">
                                    @csrf
                                    <input type="hidden" name="galeries_id" value="{{ $image->id }}">
                                    <textarea name="comment"
                                        class="w-full focus:outline-none text-gray-700 py-2 px-4 h-10 rounded-full overflow-hidden resize-none"
                                        placeholder="Tambahkan komentar"></textarea>
                                    <button type="submit"
                                        class="bg-red-500 text-white py-3 px-3 flex items-center cursor-pointer justify-center rounded-full hover:bg-red-600 transition ml-3 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cursor-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </section>


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
