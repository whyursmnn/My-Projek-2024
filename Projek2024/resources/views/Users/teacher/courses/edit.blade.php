<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CSS -->
    <link href="https://unpkg.com/flowbite@1.6.6/dist/flowbite.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto p-8 bg-gradient-to-br from-white to-gray-50 shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">Edit Course</h1>

        <form action="{{ route('teacher.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Course -->
            <div>
                <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nama Course</label>
                <input type="text" id="name" name="name" value="{{ $course->name }}" required
                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-800">
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="5" required
                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-800">{{ $course->description }}</textarea>
            </div>

            <!-- Tanggal Mulai & Tanggal Selesai -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Tanggal Mulai -->
                <div>
                    <label for="start_date" class="block text-lg font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $course->start_date }}" required
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-800">
                </div>

                <!-- Tanggal Selesai -->
                <div>
                    <label for="end_date" class="block text-lg font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $course->end_date }}" required
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-800">
                </div>
            </div>

            <!-- Teacher -->
            <div>
                <label for="teacher_id" class="block text-lg font-medium text-gray-700 mb-2">Teacher</label>
                <select id="teacher_id" name="teacher_id" required
                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-800">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Gambar Course -->
            <div>
                <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Gambar Course</label>
                <input type="file" id="image" name="image"
                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-md focus:ring-indigo-500 focus:border-indigo-500 text-gray-800">
                @if ($course->image)
                    <div class="mt-4 flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="Current image"
                            class="w-24 h-24 object-cover rounded-lg shadow-md">
                        <p class="text-sm text-gray-500">Gambar saat ini</p>
                    </div>
                @endif
            </div>

            <!-- Tombol Update -->
            <div class="text-center">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                    Update Course
                </button>
            </div>
        </form>
    </div>

    <!-- Flowbite JS (optional for modal, etc.) -->
    <script src="https://unpkg.com/flowbite@1.5.0/dist/flowbite.js"></script>

</body>

</html>
