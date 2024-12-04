<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Daftar Siswa di Course: {{ $course->name }}</h1>

    @if($students->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
            <p>Tidak ada siswa yang terdaftar di course ini.</p>
        </div>
    @else
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Nama Siswa</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $index => $student)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $student->email }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
