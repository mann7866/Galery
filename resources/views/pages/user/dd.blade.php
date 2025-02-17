@extends('pages.layouts.app')
@section('header')
@include('pages.layouts.header')
@endsection
@section('content')
    {{--  <style>
        .grid-item img {
            opacity: 0; /* Awalnya disembunyikan */
            transition: opacity 0.5s ease-in-out;
        }
    </style>

    <div class="container mx-auto p-4">
        <div id="pinterest-grid" class="columns-1 sm:columns-2 md:columns-3 gap-4">
            <!-- Gambar akan dimuat secara dinamis -->
        </div>
    </div>

   <script>
    document.addEventListener("DOMContentLoaded", () => {
        const grid = document.getElementById("pinterest-grid");
        const imageUrls = @json($images);
        let loadedCount = 0;
        const batchSize = 4;

        function loadImages() {
            const nextBatch = imageUrls.slice(loadedCount, loadedCount + batchSize);
            nextBatch.forEach(src => {
                const div = document.createElement("div");
                div.classList.add("mb-4", "break-inside-avoid", "grid-item");

                const img = document.createElement("img");
                img.dataset.src = src;
                img.classList.add("lazy", "w-full", "rounded-lg", "shadow-md");

                div.appendChild(img);
                grid.appendChild(div);
            });

            loadedCount += batchSize;
        }

        function lazyLoadImages() {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.style.opacity = 1;
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll(".lazy").forEach(img => observer.observe(img));
        }

        loadImages();
        lazyLoadImages();

        window.addEventListener("scroll", () => {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
                loadImages();
                lazyLoadImages();
            }
        });
    });

   </script>  --}}


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4" id="pinterest-grid">
        <!-- Grid Item 1 -->
        @foreach ($images as $image)

        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-all hover:scale-105 hover:shadow-lg">
            <img data-src="{{ $image }}" alt="Image 1" class="w-full h-full object-cover lazy"
                loading="lazy">
        </div>
        @endforeach
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = document.querySelectorAll(".lazy");

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src; // Menetapkan src gambar ke data-src
                        img.classList.remove("lazy"); // Menghapus class lazy setelah gambar dimuat
                        observer.unobserve(img); // Berhenti mengamati gambar
                    }
                });
            }, {
                rootMargin: "0px 0px 200px 0px", // Mulai memuat gambar sedikit lebih awal
            });

            lazyImages.forEach(img => observer.observe(img));
        });
    </script>
@endsection
