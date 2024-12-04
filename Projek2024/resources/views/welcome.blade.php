<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HuhhWii Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md py-4 px-6 flex items-center justify-between">
        <div class="text-2xl font-extrabold text-blue-600">HuhhWii Academy</div>
        <nav class="hidden md:flex space-x-4">
            <a href="#all-courses" class="text-gray-600 hover:text-blue-600 transition">Kursus</a>
            <a href="#about" class="text-gray-600 hover:text-blue-600 transition">Tentang Kami</a>
            <a href="#contact" class="text-gray-600 hover:text-blue-600 transition">Hubungi</a>
        </nav>
        <input id="course-search" type="text" placeholder="Cari kursus yang Anda inginkan..."
            class="w-1/3 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-400">

        <!-- Tempat untuk menampilkan hasil pencarian -->
        <div id="search-results" class="mt-4"></div>
        <div>
            <a href="/login"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">Masuk</a>
            <a href="/register"
                class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">Registrasi</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-white py-12 px-6 md:px-20 flex flex-col md:flex-row items-center">
        <!-- Left Content -->
        <div class="md:w-1/2 text-center md:text-left">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-snug">
                Ikuti pelatihan <span class="text-blue-600">gratis</span> <br> oleh HuhhWii
            </h1>
            <p class="text-gray-600 mt-4 text-lg">
                Mau ikut pelatihan tapi ga punya biaya? Daftar pelatihan di HuhhWii secara gratis!
            </p>
            <div class="mt-6 space-y-2">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-gray-700">Sepenuhnya gratis</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-gray-700">Terverikasi</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-gray-700">Pengajar bersertifikat</span>
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="mt-8 md:mt-0 md:w-1/2 flex justify-center">
            <img src="https://storage.googleapis.com/a1aa/image/1RbezSgejRtjPUkgyBVDyTVnSWBCS6fDT5QNr5TlAjFbi0knA.jpg"
                alt="Training Illustration" class="w-full max-w-md">
        </div>
    </section>

    <section id="popular-courses" class="py-10 px-6">
        <!-- Section Title -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Kursus Populer</h2>
            <p class="text-gray-600 mt-2">Kursus terbaik yang paling banyak diminati.</p>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
            @foreach ($popularCourses as $course)
                <!-- Course Card -->
                <div class="bg-white rounded-lg shadow-lg hover:scale-105 transition-transform overflow-hidden">
                    <img src="{{ $course->image ? asset('storage/' . $course->image) : 'https://via.placeholder.com/300x200' }}"
                        alt="{{ $course->name }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-bold">{{ $course->name }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($course->description, 60) }}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('admin.courses.show', $course->id) }}"
                                class="text-sm px-4 py-1 bg-blue-600 text-white rounded-lg">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="all-courses" class="py-10 px-6 bg-gray-50">
        <!-- Section Title -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Semua Kursus</h2>
            <p class="text-gray-600 mt-2">Jelajahi semua kursus yang tersedia di platform kami.</p>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($allCourses as $course)
                <!-- Course Card -->
                <div class="bg-white rounded-lg shadow-lg hover:scale-105 transition-transform overflow-hidden">
                    <img src="{{ $course->image ? asset('storage/' . $course->image) : 'https://via.placeholder.com/300x200' }}"
                        alt="{{ $course->name }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-bold">{{ $course->name }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($course->description, 60) }}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('admin.courses.show', $course->id) }}"
                                class="text-sm px-4 py-1 bg-blue-600 text-white rounded-lg">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $allCourses->links() }}
        </div>
    </section>



    <!-- Hero Section -->
    <section class="bg-blue-700 text-white py-12 px-6 md:px-20 flex flex-col md:flex-row items-center relative">
        <!-- Left Content -->
        <div class="md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-snug">
                Transformasikan hidup <br> kamu melalui pelatihan
            </h1>
            <p class="mt-4 text-lg text-gray-200">
                Temukan pelatihan yang kamu minati dan sukai sekarang juga.
            </p>
            <button class="mt-6 px-6 py-3 bg-black text-white font-bold rounded-lg shadow hover:bg-gray-900 transition">
                Daftar dan Ikuti Pelatihan
            </button>
        </div>

        <!-- Right Content -->
        <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center relative">
            <img src="https://via.placeholder.com/500x350" alt="People Training"
                class="w-full max-w-md mx-auto md:mx-0">

            <!-- Informational Box 1 -->
            <div
                class="absolute top-6 left-10 bg-white text-gray-800 rounded-lg p-4 shadow-md flex items-center space-x-3">
                <div>
                    <p class="text-lg font-bold">2.000+</p>
                    <p class="text-sm text-gray-600">orang berlatih setiap hari</p>
                </div>
                <div class="bg-blue-600 p-2 rounded-lg text-white">
                    <img src="https://www.sekolah.mu/blog/wp-content/uploads/2022/07/1-1-kompasiana-com.jpg"
                        alt="">
                </div>

            </div>

            <!-- Informational Box 2 -->
            <div
                class="absolute bottom-6 right-10 bg-white text-gray-800 rounded-lg p-4 shadow-md flex items-center space-x-3">
                <div class="bg-green-600 p-2 rounded-lg text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Diajarkan langsung oleh</p>
                    <p class="text-lg font-bold">para ahli di dunia nyata</p>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-12 bg-gray-50 px-6 md:px-20">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-4">Tentang Kami</h2>
            <p class="text-lg text-gray-600 mb-8">
                HuhhWii Academy adalah platform pelatihan online yang menyediakan kursus berkualitas tinggi untuk
                membantu Anda meningkatkan keterampilan dan mencapai potensi penuh Anda. Kami percaya bahwa
                setiap orang layak mendapatkan kesempatan untuk belajar dan berkembang.
            </p>
        </div>

        <!-- Section Content -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition">
                <div
                    class="flex justify-center items-center w-16 h-16 bg-blue-500 text-white rounded-full mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h3M12 5l7 7-7 7M9 5h3m-3 7h6m0 0H9m0 0l-2-2m2 2l2 2" />
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Misi Kami</h4>
                <p class="text-gray-600">
                    Memberikan akses pendidikan berkualitas untuk semua orang, kapan saja, di mana saja.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition">
                <div
                    class="flex justify-center items-center w-16 h-16 bg-green-500 text-white rounded-full mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Visi Kami</h4>
                <p class="text-gray-600">
                    Menjadi platform pelatihan terkemuka yang membantu individu dan organisasi mencapai tujuan mereka.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition">
                <div
                    class="flex justify-center items-center w-16 h-16 bg-yellow-500 text-white rounded-full mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 12H4m0 0l6-6m-6 6l6 6" />
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-2">Nilai Kami</h4>
                <p class="text-gray-600">
                    Inovasi, kualitas, dan komitmen untuk memberikan pengalaman belajar terbaik.
                </p>
            </div>
        </div>


        <!-- Background Image Section -->
        <div class="mt-12 relative bg-blue-500 text-white rounded-lg overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-500 opacity-90"></div>
            <div class="relative z-10 p-12 text-center">
                <h3 class="text-3xl font-bold mb-4">Mengapa Memilih HuhhWii Academy?</h3>
                <p class="text-lg text-gray-100 mb-6">
                    Dengan ratusan kursus yang dirancang oleh pakar industri, HuhhWii Academy memastikan Anda
                    mendapatkan pendidikan terbaik yang sesuai dengan kebutuhan Anda.
                </p>
                <a href="#courses"
                    class="px-6 py-3 bg-white text-blue-500 font-bold rounded-lg shadow hover:bg-gray-100 transition">
                    Lihat Kursus Kami
                </a>
            </div>
        </div>
    </section>





    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-12 px-6 md:px-20">
        <div id="contact" class="flex flex-col md:flex-row justify-between items-center space-y-8 md:space-y-0">
            <div class="text-center md:text-left">
                <h4 class="text-lg font-semibold">HuhhWii Academy</h4>
                <p class="text-sm mt-2">Jl. Perintis kemerdekaan, BTP Blok C</p>
                <p class="text-sm">Email: support@HuhhWiiacademy.id</p>
                <p class="text-sm">Jam Operasional: Senin - Jumat, 09.00 - 17.00 WIB</p>
            </div>

            <div class="flex flex-col space-y-4">
                <a href="#all-courses" class="hover:underline">Kursus</a>
                <a href="#about" class="hover:underline">Tentang Kami</a>
                <a href="#contact" class="hover:underline">Hubungi Kami</a>
            </div>

            <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M22.46 6.03a8.92 8.92 0 0 1-2.54.7A4.48 4.48 0 0 0 21.86 4a9 9 0 0 1-2.83 1.1A4.52 4.52 0 0 0 16 3a4.52 4.52 0 0 0-4.38 5.56A12.8 12.8 0 0 1 3.27 4a4.52 4.52 0 0 0 1.39 6A4.4 4.4 0 0 1 2.5 9.5v.05a4.52 4.52 0 0 0 3.62 4.43A4.5 4.5 0 0 1 5 14v.05a4.52 4.52 0 0 0 4.22 3.12 9 9 0 0 1-5.54 1.9A12.6 12.6 0 0 0 9.28 21c8 0 12.36-6.61 12.36-12.36v-.56A8.9 8.9 0 0 0 24 4.5a8.73 8.73 0 0 1-2.54.7z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M19.43 2.73A10 10 0 0012 0a10 10 0 00-7.43 2.73A10 10 0 002 12c0 2.7.99 5.19 2.63 7.06.88.98 1.92 1.83 3.04 2.5 1.06.63 2.2 1.05 3.33 1.3a10.16 10.16 0 001.82.14h1.2a10.16 10.16 0 001.82-.14c1.13-.25 2.27-.67 3.33-1.3a10.35 10.35 0 003.04-2.5A10 10 0 0022 12a10 10 0 00-2.57-7.24z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="text-center mt-8 text-sm text-gray-400">
            &copy; 2024 HuhhWii Academy. All rights reserved.
        </div>
    </footer>

    <input id="course-search" type="text" placeholder="Cari kursus yang Anda inginkan..."
        class="w-1/3 px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-400">

    <!-- Tempat untuk menampilkan hasil pencarian -->
    <div id="search-results" class="mt-4"></div>

    <script>
        // Event listener untuk menangani input pencarian
        document.getElementById('course-search').addEventListener('input', function(e) {
            let query = e.target.value;

            // Kirim permintaan pencarian menggunakan AJAX
            if (query.length > 2) { // Menunggu minimal 3 karakter sebelum mencari
                fetch(`/search-courses?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        // Menampilkan hasil pencarian
                        let resultsContainer = document.getElementById('search-results');
                        resultsContainer.innerHTML = '';

                        if (data.length > 0) {
                            data.forEach(course => {
                                let courseDiv = document.createElement('div');
                                courseDiv.classList.add('course-item', 'p-2', 'border', 'rounded',
                                    'mb-2');
                                courseDiv.innerHTML =
                                    `<a href="/courses/${course.id}">${course.name}</a>`;
                                resultsContainer.appendChild(courseDiv);
                            });
                        } else {
                            resultsContainer.innerHTML = '<p>Tidak ada kursus ditemukan.</p>';
                        }
                    })
                    .catch(err => console.error('Error fetching data: ', err));
            }
        });
    </script>

</body>

</html>
