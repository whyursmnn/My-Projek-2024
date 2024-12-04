<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit User</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

            <!-- Input Nama -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Input Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Input Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password (Kosongkan jika tidak ingin diubah):</label>
                <input type="password" id="password" name="password"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Select Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role:</label>
                <select id="role" name="role" required
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
                </select>
            </div>

            <!-- Tombol Update -->
            <div>
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update
                </button>
            </div>
        </form>
    </div>

</body>

</html>
