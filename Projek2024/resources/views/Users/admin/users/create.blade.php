<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto py-12 px-4">
        <!-- Heading -->
        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-8">Tambah User Baru</h1>

        <!-- Form Container -->
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-xl">
            <form action="{{ route('admin.users.store') }}" method="POST">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Nama -->
                <div class="mb-6">
                    <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Nama:</label>
                    <input type="text" id="name" name="name"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-medium text-gray-700 mb-2">Email:</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Masukkan email" required>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-lg font-medium text-gray-700 mb-2">Password:</label>
                    <input type="password" id="password" name="password"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Masukkan password" required>
                </div>

                <!-- Role -->
                <div class="mb-8">
                    <label for="role" class="block text-lg font-medium text-gray-700 mb-2">Role:</label>
                    <select id="role" name="role"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                        <option value="admin">Admin</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="w-full py-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
