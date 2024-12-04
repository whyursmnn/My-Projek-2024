<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Course Baru</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CSS -->
    <link href="https://unpkg.com/flowbite@1.6.6/dist/flowbite.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Course Baru</h1>

        <form action="{{ route('teacher.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama Course -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Course</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="description" name="description" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 h-32"></textarea>
            </div>

            <!-- Tanggal Mulai -->
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" id="start_date" name="start_date" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Tanggal Selesai -->
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                <input type="date" id="end_date" name="end_date" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Teacher -->
            <div class="mb-4">
                <label for="teacher_id" class="block text-sm font-medium text-gray-700">Teacher</label>
                <select id="teacher_id" name="teacher_id" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Gambar Course -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Course</label>
                <input type="file" id="image" name="image" required
                    class="mt-1 block w-full text-sm text-gray-500 file:border-gray-300 file:py-2 file:px-4 file:rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <!-- Flowbite JS -->
    <script src="https://unpkg.com/flowbite@1.6.6/dist/flowbite.min.js"></script>
</body>

</html>
