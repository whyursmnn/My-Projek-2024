<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.3/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-50">

    <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Edit Content</h1>

        <!-- Edit Content Form -->
        <form action="{{ route('admin.contents.update', $content) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Course Select -->
            <div>
                <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                <select name="course_id" id="course_id" required class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $content->course_id == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $content->title }}" required class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Body -->
            <div>
                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea name="body" id="body" required class="mt-1 block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $content->body }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300">
                    Update
                </button>
            </div>
        </form>

    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.3/dist/flowbite.min.js"></script>

</body>

</html>
