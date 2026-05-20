<section class="py-24 bg-slate-50">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        <div class="text-center">
            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                FAQ
            </span>

            <h2 class="mt-6 text-4xl font-bold text-slate-900">
                Pertanyaan yang Sering Ditanyakan
            </h2>

            <p class="mt-6 text-lg text-slate-600">
                Beberapa pertanyaan yang paling sering ditanyakan orang tua.
            </p>
        </div>

        <div class="mt-16 space-y-4">

            {{-- FAQ Item --}}
            <div x-data="{ open: false }" class="bg-white rounded-3xl border border-slate-200 overflow-hidden">

                <button @click="open = !open" class="w-full flex items-center justify-between p-6 text-left">
                    <span class="font-semibold text-lg text-slate-900">
                        Apakah tutor datang ke rumah?
                    </span>

                    <span x-text="open ? '-' : '+'" class="text-2xl text-blue-600"></span>
                </button>

                <div x-show="open" x-transition class="px-6 pb-6 text-slate-600 leading-relaxed">
                    Ya, tutor akan datang langsung ke rumah siswa sesuai jadwal yang telah disepakati.
                </div>
            </div>

            {{-- FAQ Item --}}
            <div x-data="{ open: false }" class="bg-white rounded-3xl border border-slate-200 overflow-hidden">
                <button @click="open = !open" class="w-full flex items-center justify-between p-6 text-left">
                    <span class="font-semibold text-lg text-slate-900">
                        Jenjang apa saja yang tersedia?
                    </span>
                    <span x-text="open ? '-' : '+'" class="text-2xl text-blue-600"></span>
                </button>

                <div x-show="open" x-transition class="px-6 pb-6 text-slate-600 leading-relaxed">
                    Kami mengajar dari Pra-Sekolah, TK, SD, hingga SMP.
                </div>
            </div>

            {{-- FAQ Item --}}
            <div x-data="{ open: false }" class="bg-white rounded-3xl border border-slate-200 overflow-hidden">
                <button @click="open = !open" class="w-full flex items-center justify-between p-6 text-left">
                    <span class="font-semibold text-lg text-slate-900">
                        Bagaimana proses pendaftaran?
                    </span>
                    <span x-text="open ? '-' : '+'" class="text-2xl text-blue-600"></span>
                </button>

                <div x-show="open" x-transition class="px-6 pb-6 text-slate-600 leading-relaxed">
                    Orang tua dapat menghubungi admin melalui WhatsApp untuk konsultasi dan penjadwalan tutor.
                </div>
            </div>
        </div>
    </div>
</section>
