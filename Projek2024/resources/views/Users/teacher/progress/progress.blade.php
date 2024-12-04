
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Progress Siswa: {{ $student->name }}</h1>
    <p>Course: {{ $course->name }}</p>

    @if($progress->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
            <p>Siswa belum menyelesaikan konten apapun.</p>
        </div>
    @else
        <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Judul Konten</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progress as $index => $item)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->content->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $item->completed ? 'Completed' : 'In Progress' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

