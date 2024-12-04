<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Contents</h1>
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.contents.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">
           Add Content
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border border-gray-300">No</th>
                    <th class="border border-gray-200 px-4 py-2 text-left text-gray-700">Course</th>
                    <th class="border border-gray-200 px-4 py-2 text-left text-gray-700">Title</th>
                    <th class="border border-gray-200 px-4 py-2 text-center text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($contents as $content)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">{{ $loop->iteration }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $content->course->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $content->title }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">
                            <a href="{{ route('admin.contents.edit', $content) }}"
                               class="text-yellow-500 hover:underline mr-2">
                               Edit
                            </a>
                            <form action="{{ route('admin.contents.destroy', $content) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-500 hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this content?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
