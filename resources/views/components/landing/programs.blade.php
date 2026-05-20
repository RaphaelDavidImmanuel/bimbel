<section id="program" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center max-w-3xl mx-auto">

            <span class="inline-flex bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                Program Belajar
            </span>

            <h2 class="mt-6 text-4xl lg:text-5xl font-bold text-slate-900 leading-tight">
                Program Les Sesuai
                Kebutuhan Anak
            </h2>

            <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                Kami menyediakan program belajar private untuk anak TK,
                SD, hingga SMP dengan metode belajar yang fokus,
                menyenangkan, dan terarah.
            </p>
        </div>

        {{-- Cards --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
            {{-- Card Calistung --}}
            <div
                class="bg-slate-50 rounded-[32px] p-8 border border-slate-100 hover:border-blue-200 hover:shadow-2xl hover:-translate-y-1 transition duration-300">

                <div class="w-16 h-16 rounded-2xl bg-pink-100 flex items-center justify-center text-3xl">
                    📚
                </div>

                <h3 class="mt-6 text-2xl font-bold text-slate-900">
                    Calistung
                </h3>

                <p class="mt-4 text-slate-600 leading-relaxed">
                    Program membaca, menulis, dan berhitung untuk anak
                    pra sekolah, TK, dan SD awal.
                </p>

            </div>

            {{-- Card Bahasa Inggris --}}
            <div
                class="bg-slate-50 rounded-[32px] p-8 border border-slate-100 hover:border-blue-200 hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">
                    🇬🇧
                </div>

                <h3 class="mt-6 text-2xl font-bold text-slate-900">
                    Bahasa Inggris
                </h3>

                <p class="mt-4 text-slate-600 leading-relaxed">
                    Belajar grammar, speaking, vocabulary, dan reading
                    dengan metode yang mudah dipahami anak.
                </p>

            </div>

            {{-- Card Matematika --}}
            <div
                class="bg-slate-50 rounded-[32px] p-8 border border-slate-100 hover:border-blue-200 hover:shadow-2xl hover:-translate-y-1 transition duration-300">

                <div class="w-16 h-16 rounded-2xl bg-yellow-100 flex items-center justify-center text-3xl">
                    ➗
                </div>

                <h3 class="mt-6 text-2xl font-bold text-slate-900">
                    Matematika
                </h3>

                <p class="mt-4 text-slate-600 leading-relaxed">
                    Membantu siswa memahami konsep matematika sekolah
                    dengan cara yang lebih fokus dan bertahap.
                </p>

            </div>

            {{-- Card Bahasa Indonesia --}}
            <div
                class="bg-slate-50 rounded-[32px] p-8 border border-slate-100 hover:border-blue-200 hover:shadow-2xl hover:-translate-y-1 transition duration-300">

                <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                    ✍️
                </div>

                <h3 class="mt-6 text-2xl font-bold text-slate-900">
                    Bahasa Indonesia
                </h3>

                <p class="mt-4 text-slate-600 leading-relaxed">
                    Membantu anak meningkatkan kemampuan membaca,
                    memahami soal, dan menulis dengan baik.
                </p>

            </div>

            {{-- Card Math In English --}}
            <div
                class="bg-slate-50 rounded-[32px] p-8 border border-slate-100 hover:border-blue-200 hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center text-3xl">
                    🧠
                </div>

                <h3 class="mt-6 text-2xl font-bold text-slate-900">
                    Math in English
                </h3>

                <p class="mt-4 text-slate-600 leading-relaxed">
                    Program matematika bilingual untuk membantu anak
                    memahami konsep matematika dalam bahasa Inggris.
                </p>
            </div>

            {{-- Card --}}
            <div
                class="bg-blue-600 rounded-[32px] p-8 text-white flex flex-col justify-between hover:-translate-y-1 hover:shadow-2xl transition duration-300">
                <div>

                    <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-3xl">
                        ⭐
                    </div>

                    <h3 class="mt-6 text-2xl font-bold">
                        Konsultasi Gratis
                    </h3>

                    <p class="mt-4 text-blue-100 leading-relaxed">
                        Bingung memilih program yang cocok?
                        Tim kami siap membantu kebutuhan belajar anak Anda.
                    </p>
                </div>

                @php
                    $waLink =
                        'https://wa.me/' . config('lpd.whatsapp') . '?text=' . urlencode(config('lpd.wa_message'));
                @endphp

                <a href="{{ $waLink }}" target="_blank"
                    class="mt-8 bg-white text-blue-600 px-6 py-4 rounded-2xl font-semibold text-center hover:scale-105 transition duration-300">
                    Hubungi Admin
                </a>
            </div>
        </div>
    </div>
</section>
