@extends('layouts.student.appStudent')


@section('content')
    <div class="container mx-auto p-8 bg-white shadow-xl rounded-lg">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Daftar Kursus Tersedia</h2>

        {{-- Menampilkan pesan sukses atau error --}}
        @if (session('message'))
            <div class="alert alert-success bg-green-100 text-green-700 p-4 rounded-lg mb-6">
                {{ session('message') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($courses as $course)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:scale-105">
                    <img src="{{ asset('storage/' . $course->image) }}" class="w-full h-56 object-cover rounded-t-lg" alt="{{ $course->name }}">
                    <div class="p-6">
                        <h5 class="text-xl font-semibold text-gray-800 mb-2">{{ $course->name }}</h5>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($course->description, 100) }}</p>
                        <form action="{{ route('student.courses.enroll', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                                Daftar Kursus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

