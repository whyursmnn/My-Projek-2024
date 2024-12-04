<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.3/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-50">

    <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Edit Course</h1>

        <!-- Course Edit Form -->
        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Course Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
                <input type="text" name="name" id="name" value="{{ $course->name }}" required
                    class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" required
                    class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $course->description }}</textarea>
            </div>

            <!-- Date Range (Start and End Date) -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ $course->start_date }}" required
                        class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $course->end_date }}" required
                        class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>

            <!-- Teacher Select -->
            <div>
                <label for="teacher_id" class="block text-sm font-medium text-gray-700">Teacher</label>
                <select name="teacher_id" id="teacher_id" required
                    class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Course Image</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @if($course->image)
                    <div class="mt-4 flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="Current image" class="w-24 h-24 object-cover rounded-lg shadow-sm">
                        <p class="text-sm text-gray-500">Current Image</p>
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300">
                    Update Course
                </button>
            </div>
        </form>

    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.3/dist/flowbite.min.js"></script>

</body>

</html>
