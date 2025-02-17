

<ul class="flex gap-6 justify-center items-center">
    <li class="font-semibold pb-1">
        <a href="/pichturest"
            class="border-b-2 border-transparent aria-[current=page]:border-gray-950 aria-[current=page]:text-gray-950"
            aria-current="{{ request()->is('pichturest') ? 'page' : '' }}"
            >Untuk Anda</a>
    </li>
    <li class="font-semibold pb-1">
        <a href="/halaman"
            class="border-b-2 border-transparent aria-[current=page]:border-gray-950 aria-[current=page]:text-gray-950"
            aria-current="{{ request()->is('halaman') ? 'page' : '' }}"
            >Jelajahi</a>
    </li>
</ul>
