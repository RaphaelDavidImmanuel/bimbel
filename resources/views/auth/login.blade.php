<x-guest-layout>

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-indigo-900 to-blue-600">

        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-28 h-28 mx-auto bg-white rounded-3xl shadow-2xl flex items-center justify-center p-3">
                    <img src="img/logo.png" alt="Logo Les Private Depok" class="w-full h-full object-contain">

                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0-6L3 9m18 0l-9 5" />
                    </svg> --}}
                </div>

                <h1 class="mt-4 text-3xl font-bold text-white">
                    Les Privat Depok
                </h1>

                <p class="text-blue-100 mt-2">
                    Sistem Login Administrator & Guru
                </p>
            </div>

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

            <div class="text-center mt-5 text-sm text-white/80">
                © {{ date('Y') }} LPD
            </div>

        </div>
    </div>
</x-guest-layout>
