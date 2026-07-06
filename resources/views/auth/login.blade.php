<x-guest-layout>

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-indigo-900 to-blue-600">

        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="relative w-32 h-32 mx-auto">
                    <div class="absolute inset-0 bg-white/20 rounded-full blur-xl"></div>
                    <div
                        class="relative w-full h-full bg-white rounded-full shadow-2xl flex items-center justify-center p-4">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                </div>

                <h1 class="mt-6 text-4xl font-bold text-white">
                    Les Privat Depok
                </h1>

                <p class="text-blue-100 mt-2">
                    Sistem Login Administrator & Guru
                </p>

            </div>
            {{-- akhir logo login --}}

            <!-- Card Login -->
            <div class="bg-white rounded-3xl shadow-2xl p-8">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">

                            <span class="ms-2 text-sm text-gray-600">
                                Ingat Saya
                            </span>
                        </label>
                    </div>

                    <!-- Button Login -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 rounded-xl transition duration-300">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
            {{-- akhir card login --}}

            <div class="text-center mt-5 text-sm text-white/80">
                © {{ date('Y') }} LPD
            </div>

        </div>
    </div>
</x-guest-layout>
