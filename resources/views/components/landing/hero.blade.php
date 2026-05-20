<section class="pt-32 pb-20 bg-gradient-to-b from-blue-50 via-white to-white overflow-hidden">
    {{-- Background Blur --}}
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-200 rounded-full blur-3xl opacity-30"></div>

    @php
        $waLink = 'https://wa.me/' . config('lpd.whatsapp') . '?text=' . urlencode(config('lpd.wa_message'));
    @endphp

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            {{-- LEFT CONTENT --}}
            <div>

                {{-- Badge --}}
                <div
                    class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-5 py-2 rounded-full text-sm font-semibold">
                    #1 Les Private di Depok
                </div>

                {{-- Heading --}}
                <h1 class="mt-8 text-5xl md:text-6xl font-extrabold leading-tight text-slate-900">

                    Belajar Lebih
                    <span class="text-blue-600">
                        Fokus
                    </span>
                    Dengan Guru Private ke Rumah
                </h1>

                {{-- Description --}}
                <p class="mt-7 text-lg text-slate-600 leading-relaxed max-w-2xl">
                    Program les private offline untuk anak TK, SD, hingga SMP
                    dengan tutor berpengalaman dan metode belajar yang
                    menyenangkan langsung di rumah siswa.
                </p>

                {{-- CTA --}}
                <div class="mt-10 flex flex-col sm:flex-row gap-4">

                    <a href="{{ $waLink }}" target="_blank"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-2xl font-semibold transition duration-300 text-center shadow-lg hover:shadow-2xl hover:-translate-y-1">

                        Konsultasi Gratis
                    </a>

                    <a href="#program"
                        class="border border-slate-300 hover:border-blue-600 hover:text-blue-600 px-8 py-4 rounded-2xl font-semibold transition duration-300 text-center bg-white">
                        Lihat Program
                    </a>
                </div>

                {{-- Stats --}}
                <div class="mt-14 grid grid-cols-2 sm:grid-cols-3 gap-8">

                    <div>
                        <h3 class="text-3xl font-bold text-slate-900">
                            100+
                        </h3>

                        <p class="mt-1 text-slate-500">
                            Siswa Belajar
                        </p>
                    </div>

                    <div>
                        <h3 class="text-3xl font-bold text-slate-900">
                            Guru
                        </h3>

                        <p class="mt-1 text-slate-500">
                            Datang ke Rumah
                        </p>
                    </div>

                    <div>
                        <h3 class="text-3xl font-bold text-slate-900">
                            TK - SMP
                        </h3>

                        <p class="mt-1 text-slate-500">
                            Semua Jenjang
                        </p>
                    </div>
                </div>
            </div>

            {{-- RIGHT IMAGE --}}
            <div class="relative">
                {{-- Glow --}}
                <div class="absolute inset-4 bg-blue-500 rounded-[40px] blur-3xl opacity-20 scale-95">
                </div>

                {{-- Main Image --}}
                <img src="img/teacher-explaining.png" alt="Les Private Depok"
                    class="relative rounded-[32px] shadow-2xl object-cover h-[620px] w-full hover:scale-[1.02] transition duration-500">

                {{-- Floating Card --}}
                <div
                    class="absolute -bottom-6 -left-6 bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-6 max-w-xs border border-slate-100 hover:-translate-y-1 transition duration-300">
                    <div class="flex items-center gap-4">

                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl">
                            ✓
                        </div>

                        <div>
                            <h4 class="font-bold text-slate-900">
                                Belajar Lebih Nyaman
                            </h4>

                            <p class="text-sm text-slate-500 mt-1">
                                Tutor datang langsung ke rumah siswa.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
