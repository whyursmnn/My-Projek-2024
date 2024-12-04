<div class="container mx-auto p-4">
    <a href="{{ route('admin.courses.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Course</a>
    <h1 class="text-2xl font-bold mt-4">Daftar Course</h1>

    <div class="mt-6">
        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2 border border-gray-300">No</th>
                    <th class="px-4 py-2 border border-gray-300">Nama Course</th>
                    <th class="px-4 py-2 border border-gray-300">Deskripsi</th>
                    <th class="px-4 py-2 border border-gray-300">Tanggal Mulai</th>
                    <th class="px-4 py-2 border border-gray-300">Tanggal Selesai</th>
                    <th class="px-4 py-2 border border-gray-300">Teacher</th>
                    <th class="px-4 py-2 border border-gray-300">Gambar</th>
                    <th class="px-4 py-2 border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $courses = $courses ?? collect(); // Fallback jika null
                @endphp
                @forelse ($courses as $course)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border border-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $course->name }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ Str::limit($course->description, 50) }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $course->start_date }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $course->end_date }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $course->teacher->name }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            @if($course->image && file_exists(public_path('storage/' . $course->image)))
                                <img src="{{ asset('storage/' . $course->image) }}" alt="Gambar Course" class="h-10 w-10 object-cover">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="Default Image" class="h-10 w-10 object-cover">
                            @endif
                        </td>
                        <td class="px-4 py-2 border border-gray-300">
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus course ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center px-4 py-2 border border-gray-300">Tidak ada course yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
