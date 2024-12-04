<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full bg-white text-black border border-blue-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm p-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Alamat Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full bg-white text-black border border-blue-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm p-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Kata Sandi -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="block mt-1 w-full bg-white text-black border border-blue-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm p-2" type="password" name="password" required autocomplete="new-password" />

            <!-- Toggle Password Visibility -->
            <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2" id="toggle-password">
                <i class="fa fa-eye-slash" id="password-icon"></i>
            </button>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Kata Sandi -->
        <div class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-white text-black border border-blue-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm p-2" type="password" name="password_confirmation" required autocomplete="new-password" />

            <!-- Toggle Confirm Password Visibility -->
            <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2" id="toggle-confirm-password">
                <i class="fa fa-eye-slash" id="confirm-password-icon"></i>
            </button>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Pilih Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select name="role" id="role" class="block mt-1 w-full bg-white text-black border border-blue-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm p-2" required>
                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Sudah terdaftar?') }}
            </a>

            <x-primary-button class="ms-4 bg-blue-600 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        // Password Visibility Toggle
        const togglePassword = document.querySelector('#toggle-password');
        const passwordInput = document.querySelector('#password');
        const passwordIcon = document.querySelector('#password-icon');

        togglePassword.addEventListener('click', function (e) {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            passwordIcon.classList.toggle('fa-eye');
            passwordIcon.classList.toggle('fa-eye-slash');
        });

        // Confirm Password Visibility Toggle
        const toggleConfirmPassword = document.querySelector('#toggle-confirm-password');
        const confirmPasswordInput = document.querySelector('#password_confirmation');
        const confirmPasswordIcon = document.querySelector('#confirm-password-icon');

        toggleConfirmPassword.addEventListener('click', function (e) {
            const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
            confirmPasswordInput.type = type;

            confirmPasswordIcon.classList.toggle('fa-eye');
            confirmPasswordIcon.classList.toggle('fa-eye-slash');
        });
    </script>
</x-guest-layout>
