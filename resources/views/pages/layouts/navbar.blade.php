<nav class="fixed top-0 left-0 w-full bg-white p-4 z-50">
    <div class="row col-span-full">
        <div class="card">
            <div class="flex group justify-between font-semibold">
                <div class="group flex gap-2 p-5 items-center">
                    <img src="{{ asset('images/Screenshot 2025-01-31 102043.png') }}" class="w-8 h-8 rounded-full"
                        alt="">
                    <p>Manrest</p>
                </div>
                <div x-data="{ search: false }" class="group flex gap-1 p-5 items-center">
                    <button
                        class="flex gap-3 items-center px-4 py-2 border-1 border-gray-300 text-gray-950 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <img src="{{ asset('images/Screenshot 2025-01-19 121155.png') }}" class="w-10 h-10 rounded-full"
                            alt="">
                        {{ Auth::user()->name }}
                    </button>
                    <form action="">
                        <div x-show="search"
                            class="flex items-center bg-gray-100 rounded-full px-6 py-2 w-full focus-within:ring-3 focus-within:ring-blue-300">
                            <!-- Ikon Search -->
                            <i class="fa-solid fa-magnifying-glass text-2xl text-neutral-500"></i>

                            <!-- Input Komentar -->
                            <input type="search"
                                class="w-full bg-transparent focus:outline-none text-gray-700 px-3 h-10"
                                placeholder="Cari...">
                        </div>
                    </form>
                    <button @click="search = !search" class="flex justify-center items-center">
                        <span x-show="search"
                            class="flex items-center px-4 py-2 text-gray-950 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-blue-500">
                            <i class="fa-solid fa-xmark text-2xl text-neutral-500"></i>
                        </span>
                    </button>
                    <button @click="search = !search">
                        <span x-show="!search"
                            class="flex items-center px-4 size-14 py-2 text-gray-950 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-blue-500">
                            <i class="fa-solid fa-magnifying-glass text-2xl text-neutral-500"></i>
                        </span>
                    </button>

                    <span
                        class="flex items-center px-4 size-14 py-2 text-gray-950 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-blue-500">
                        <i class="fa-solid fa-bell text-2xl text-neutral-500"></i>
                    </span>

                    <img src="{{ asset('images/Screenshot 2025-01-18 191242.png') }}" class="w-8 h-8 rounded-full"
                        alt="">
                </div>

            </div>
            @yield('header')

        </div>
    </div>
</nav>
