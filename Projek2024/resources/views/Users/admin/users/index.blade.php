<!-- Header -->
<div class="container mx-auto px-6 py-8">
<h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Users</h1>

<!-- Tombol Tambah User -->
<a href="{{ route('admin.users.create') }}" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
    Tambah User
</a>

<!-- Tabel -->
<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full table-auto">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $user)
            <tr class="hover:bg-gray-100 transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->role }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 mr-4">
                        Edit
                    </a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
