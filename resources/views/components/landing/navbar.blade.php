<nav x-data="{ open: false }"
    class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-lg border-b border-slate-100">

    @php
        $waLink = 'https://wa.me/' . config('lpd.whatsapp') . '?text=' . urlencode(config('lpd.wa_message'));
    @endphp

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-20">
            {{-- Logo --}}
            <a href="#" class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-2xl flex items-center justify-center font-bold text-lg shadow-lg">
                    <img src="img/logo.png" alt="">
                </div>

                <div>
                    <h1 class="font-bold text-gray-900 text-lg leading-none">
                        Les Private Depok
                    </h1>

                    <p class="text-sm text-gray-500">
                        Belajar Lebih Fokus
                    </p>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-8">

                <a href="#program" class="text-gray-600 hover:text-blue-600 transition font-medium">
                    Program
                </a>

                <a href="#features" class="text-gray-600 hover:text-blue-600 transition font-medium">
                    Keunggulan
                </a>

                <a href="#subjects" class="text-gray-600 hover:text-blue-600 transition font-medium">
                    Pelajaran
                </a>

                <a href="#testimonials" class="text-gray-600 hover:text-blue-600 transition font-medium">
                    Testimoni
                </a>

                <a href="{{ $waLink }}" target="_blank"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-semibold transition shadow-lg hover:shadow-xl hover:-translate-y-0.5 duration-300">

                    Konsultasi Gratis
                </a>
            </div>

            {{-- Mobile Button --}}
            <button @click="open = !open"
                class="lg:hidden w-11 h-11 rounded-xl bg-slate-100 flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />

                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 -translate-y-2" class="lg:hidden pb-6">

            <div
                class="flex flex-col gap-5 bg-white rounded-3xl p-6 shadow-xl border border-slate-100 hover:-translate-y-1 transition duration-300">

                <a href="#program" @click="open = false" class="text-gray-700 font-medium">
                    Program
                </a>

                <a href="#subjects" @click="open = false" class="text-gray-700 font-medium">
                    Pelajaran
                </a>

                <a href="#features" @click="open = false" class="text-gray-700 font-medium">
                    Keunggulan
                </a>

                <a href="#testimonials" @click="open = false" class="text-gray-700 font-medium">
                    Testimoni
                </a>

                <a href="{{ $waLink }}" target="_blank"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-center px-8 py-4 rounded-2xl font-semibold shadow-lg transition duration-300">
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</nav>
