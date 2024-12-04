@extends('layouts.student.appStudent')


@section('content')
    <div class="flex h-screen bg-blue-900 text-gray-800">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 p-4 flex flex-col">
            <div class="flex items-center mb-8">
                <i class="fas fa-graduation-cap text-2xl mr-2"></i>
                <span class="text-xl font-bold">Smart</span>
            </div>
            <nav class="flex-1">
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('student.dashboard') }}" id="dashboard-link" class="flex items-center text-gray-200 hover:bg-gray-700 p-2 rounded">
                            <i class="fa-house mr-2"></i> Dashboard

                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('student.courses.index') }}" id="courses-link" class="flex items-center text-gray-200 hover:bg-gray-700 p-2 rounded">
                            <i class="fas fa-book mr-2"></i> Kursus
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('student.progress.index') }}" id="progress-link" class="flex items-center text-gray-200 hover:bg-gray-700 p-2 rounded">
                            <i class="fas fa-calendar-alt mr-2"></i> Progress
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div id="main-content" class="flex-1 bg-gray-100 p-8">
            <!-- Initial content here (Dashboard info, for example) -->
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center">
                    <input class="p-2 rounded-lg border border-gray-300" placeholder="Search" type="text"/>
                    <i class="fas fa-search ml-2 text-gray-500"></i>
                </div>
            </div>

            <!-- Default Dashboard Content -->
            <div id="dashboard-content">
                <div class="grid grid-cols-3 gap-8">
                    <div class="col-span-2">
                        <!-- User Info -->
                        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                            <h2 class="text-xl font-bold mb-4">Informasi User</h2>
                            <div class="space-y-3 text-lg text-gray-600 mt-4">
                                <p><strong class="text-gray-800">Nama:</strong> {{ $user->name }}</p>
                                <p><strong class="text-gray-800">Email:</strong> {{ $user->email }}</p>
                                
                            </div>
                        </div>

                        <!-- Courses Section -->
                        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                            <h2 class="text-xl font-bold mb-4">Kursus yang Diikuti</h2>
                            <div class="text-lg text-gray-600">
                                @if($courses->isEmpty())
                                    <p class="italic text-gray-500">Anda belum mengikuti kursus apapun. Silakan pilih kursus untuk mendaftar.</p>
                                @else
                                    <ul class="space-y-3">
                                        @foreach($courses as $course)
                                            <li>
                                                <a href="{{ route('student.courses.show', $course->id) }}" class="text-indigo-600 hover:text-indigo-800 transition duration-200 text-xl font-semibold">{{ $course->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="mt-6 text-center">
                                <a href="{{ route('student.courses.index') }}" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200">Lihat Kursus Tersedia</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('a[data-ajax]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('href');
                    fetch(url)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#main-content').innerHTML = html;
                        })
                        .catch(error => console.error('Error loading the page: ' + error));
                });
            });
        });
    </script>
@endsection
