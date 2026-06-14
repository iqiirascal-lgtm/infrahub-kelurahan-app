<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InfraHub Kelurahan - Solusi Bersama Fasilitas Umum</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 text-slate-800 font-sans selection:bg-emerald-500 selection:text-white">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <span class="font-bold text-xl tracking-tight bg-gradient-to-r from-emerald-600 to-indigo-600 bg-clip-text text-transparent">
                        InfraHub Kelurahan
                    </span>
                </div>

                @if (Route::has('login'))
                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold text-sm px-5 py-2.5 rounded-xl shadow-sm transition-all duration-200 hover:shadow">
                                Ke Dashboard →
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-emerald-600 transition">
                                Masuk
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-slate-900 hover:bg-slate-800 text-white font-semibold text-sm px-4 py-2 rounded-xl transition shadow-sm">
                                    Daftar Warga
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <header class="relative overflow-hidden pt-16 pb-20 lg:pt-24 lg:pb-28">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-r from-emerald-200/40 via-teal-100/30 to-indigo-200/40 blur-3xl rounded-full -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
            <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                Langkah Nyata Membangun Lingkungan Lebih Baik
            </span>
            
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-slate-900 max-w-4xl mx-auto leading-tight">
                Laporkan Kerusakan Fasilitas Umum <br>
                <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-indigo-600 bg-clip-text text-transparent">
                    Diproses Cepat oleh Kelurahan
                </span>
            </h1>

            <p class="text-base sm:text-xl text-slate-500 max-w-2xl mx-auto leading-relaxed">
                InfraHub adalah wadah aspirasi warga kelurahan untuk melaporkan jalan rusak, lampu mati, hingga penumpukan sampah secara transparan dan terintegrasi langsung dengan petugas.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto bg-gradient-to-r from-emerald-600 to-indigo-600 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-base text-center">
                        Buat Pengaduan Sekarang
                    </a>
                @else
                    <a href="{{ route('register') }}" class="w-full sm:w-auto bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-base text-center">
                        Mulai Lapor Sekarang
                    </a>
                    <a href="{{ route('login') }}" class="w-full sm:w-auto bg-white border border-slate-200 hover:border-slate-300 text-slate-700 font-bold px-8 py-3.5 rounded-xl shadow-sm hover:bg-slate-50 transition text-base text-center">
                        Lihat Riwayat Aduan
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <section class="py-16 bg-white border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Bagaimana InfraHub Bekerja?</h2>
                <p class="text-slate-500 text-sm">Proses pelaporan hingga penyelesaian fasilitas dilakukan secara transparan dan gotong royong.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-emerald-200 hover:bg-emerald-50/10 transition group">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl font-bold mb-6 group-hover:scale-110 transition duration-300">
                        📸
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">1. Ambil Foto & Lapor</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Warga cukup mengambil foto bukti kerusakan fasilitas umum, mengisi deskripsi, kategori, dan lokasi RT/RW setempat.</p>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-teal-200 hover:bg-teal-50/10 transition group">
                    <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center text-xl font-bold mb-6 group-hover:scale-110 transition duration-300">
                        🔼
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">2. Dukungan Suara (Upvote)</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Laporan dari warga lain dapat didukung oleh warga sekitar agar menjadi prioritas utama tim kelurahan untuk segera dieksekusi.</p>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-indigo-200 hover:bg-indigo-50/10 transition group">
                    <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-xl font-bold mb-6 group-hover:scale-110 transition duration-300">
                        🛠️
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">3. Pantau Proses Nyata</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Admin kelurahan akan merespons dengan mengubah status pelaporan secara berkala dari Menunggu, Diproses, hingga Selesai.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-4 border-b border-slate-800 pb-8 text-sm">
            <div class="flex items-center gap-2">
                <span class="text-xl"></span>
                <span class="font-bold text-white tracking-tight">InfraHub Kelurahan</span>
            </div>
            <p>&copy; {{ date('Y') }} InfraHub Kelurahan. Dikembangkan untuk kenyamanan lingkungan bersama.</p>
        </div>
    </section>

</body>
</html>