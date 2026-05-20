<section class="py-24 bg-white">

    @php
        $waLink = 'https://wa.me/' . config('lpd.whatsapp') . '?text=' . urlencode(config('lpd.wa_message'));
    @endphp

    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div
            class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-blue-700 rounded-[40px] p-10 lg:p-16 text-white">

            {{-- Background Blur --}}
            <div class="absolute top-0 right-0 w-72 h-72 bg-white/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">
                <div class="max-w-3xl">
                    {{-- <span class="inline-flex bg-white/20 backdrop-blur-md px-4 py-2 rounded-full text-sm font-medium">
                        Konsultasi Gratis
                    </span> --}}

                    <h2 class="mt-6 text-4xl lg:text-5xl font-bold leading-tight">
                        Bantu Anak Belajar
                        Lebih Fokus dan Nyaman di Rumah
                    </h2>

                    <p class="mt-6 text-blue-100 text-lg leading-relaxed">
                        Diskusikan kebutuhan belajar anak Anda bersama tim
                        Les Private Depok dan temukan tutor yang paling cocok.
                    </p>

                    <div class="mt-10 flex flex-col sm:flex-row gap-4">
                        <a href="{{ $waLink }}" target="_blank"
                            class="bg-white text-blue-600 px-8 py-4 rounded-2xl font-semibold inline-flex justify-center items-center hover:scale-105 transition duration-300 shadow-2xl">
                            Konsultasi Sekarang
                        </a>

                        <a href="#program"
                            class="border border-white/30 hover:bg-white/10 px-8 py-4 rounded-2xl font-semibold inline-flex justify-center items-center transition duration-300">
                            Lihat Program
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
