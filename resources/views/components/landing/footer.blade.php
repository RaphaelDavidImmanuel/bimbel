<footer class="bg-slate-950 text-white pt-24 pb-10">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="grid lg:grid-cols-4 gap-12">

            {{-- Brand --}}
            <div class="lg:col-span-2">

                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-blue-600 flex items-center justify-center font-bold text-lg">
                        LPD
                    </div>

                    <div>
                        <h3 class="text-xl font-bold">
                            Les Private Depok
                        </h3>

                        <p class="text-slate-400 text-sm">
                            Belajar Lebih Fokus
                        </p>
                    </div>
                </div>

                <p class="mt-6 text-slate-400 leading-relaxed max-w-lg">
                    Layanan les private guru datang ke rumah untuk Calistung,
                    Bahasa Inggris, Matematika, dan pelajaran sekolah
                    SD hingga SMP di wilayah Depok dan sekitarnya.
                </p>

                @php
                    $waLink =
                        'https://wa.me/' . config('lpd.whatsapp') . '?text=' . urlencode(config('lpd.wa_message'));
                @endphp

                <a href="{{ $waLink }}" target="_blank"
                    class="mt-8 inline-flex items-center gap-3 bg-blue-600 hover:bg-blue-700 px-6 py-4 rounded-2xl font-semibold transition">

                    Konsultasi Gratis

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            {{-- Menu --}}
            <div>
                <h4 class="text-lg font-bold">
                    Menu
                </h4>

                <div class="mt-6 flex flex-col gap-4 text-slate-400">

                    <a href="#program" class="hover:text-white transition">
                        Program
                    </a>

                    <a href="#subjects" class="hover:text-white transition">
                        Mata Pelajaran
                    </a>

                    <a href="#features" class="hover:text-white transition">
                        Keunggulan
                    </a>

                    <a href="#testimonials" class="hover:text-white transition">
                        Testimoni
                    </a>
                </div>
            </div>

            {{-- Kontak --}}
            <div>
                <h4 class="text-lg font-bold">
                    Kontak
                </h4>

                <div class="mt-6 space-y-4 text-slate-400">
                    <p>
                        📍 Depok & Sekitarnya
                    </p>

                    <p>
                        📞 {{ config('lpd.whatsapp') }}
                    </p>

                    <p>
                        ✉️ admin@lesprivatedepok.com
                    </p>

                    <p>
                        🕘 Setiap Hari 08.00 - 20.00
                    </p>
                </div>
            </div>

        </div>

        {{-- Bottom --}}
        <div class="mt-20 pt-8 border-t border-slate-800 flex flex-col md:flex-row gap-4 items-center justify-between">

            <p class="text-slate-500 text-sm">
                © {{ date('Y') }} Les Private Depok. All rights reserved.
            </p>

            <p class="text-slate-500 text-sm">
                Built with Laravel & TailwindCSS
            </p>

        </div>

    </div>
</footer>
