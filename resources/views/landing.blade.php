<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InfraHub Kelurahan - Solusi Pelaporan Fasilitas Umum</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 text-slate-800 font-sans min-h-screen relative overflow-x-hidden">

    <!-- Background Decorations -->
    <div class="absolute top-0 right-0 w-full max-w-3xl h-[500px] bg-gradient-to-b from-emerald-200/30 via-teal-100/20 to-transparent blur-3xl rounded-full -z-10 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-full max-w-2xl h-[400px] bg-gradient-to-t from-teal-100/20 via-emerald-50/10 to-transparent blur-3xl rounded-full -z-10 pointer-events-none"></div>

    <!-- NAVBAR -->
    <nav class="w-full max-w-7xl mx-auto px-6 py-5 flex items-center justify-between sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="flex items-center space-x-3">
            <x-application-logo class="h-10 w-auto" />
        </div>
         
        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="#beranda" class="text-sm font-medium text-slate-600 hover:text-emerald-700 transition">Beranda</a>
            <a href="#tentang" class="text-sm font-medium text-slate-600 hover:text-emerald-700 transition">Tentang</a>
            <a href="#cara-kerja" class="text-sm font-medium text-slate-600 hover:text-emerald-700 transition">Cara Kerja</a>
            <a href="#laporan" class="text-sm font-medium text-slate-600 hover:text-emerald-700 transition">Laporan</a>
            <a href="#kontak" class="text-sm font-medium text-slate-600 hover:text-emerald-700 transition">Kontak</a>
        </div>
        
        <!-- Auth Buttons -->
        <div class="flex items-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-emerald-700 hover:text-emerald-800 transition">
                        Dashboard →
                    </a>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex text-sm font-bold text-slate-600 hover:text-slate-900 transition-colors">
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 rounded-xl shadow-md shadow-emerald-500/10 hover:shadow-emerald-500/20 transition-all">
                            Daftar
                        </a>
                    @endif
                @endauth
            @endif
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden p-2 text-slate-600 hover:text-emerald-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden fixed inset-0 z-40 bg-white/95 backdrop-blur-sm pt-20 px-6">
        <div class="flex flex-col space-y-4 text-center">
            <a href="#beranda" class="text-lg font-medium text-slate-700 hover:text-emerald-700 py-2">Beranda</a>
            <a href="#tentang" class="text-lg font-medium text-slate-700 hover:text-emerald-700 py-2">Tentang</a>
            <a href="#cara-kerja" class="text-lg font-medium text-slate-700 hover:text-emerald-700 py-2">Cara Kerja</a>
            <a href="#laporan" class="text-lg font-medium text-slate-700 hover:text-emerald-700 py-2">Laporan</a>
            <a href="#kontak" class="text-lg font-medium text-slate-700 hover:text-emerald-700 py-2">Kontak</a>
            @guest
                <a href="{{ route('login') }}" class="text-lg font-medium text-slate-700 hover:text-emerald-700 py-2">Masuk</a>
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 text-base font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 rounded-xl">
                    Daftar Sekarang
                </a>
            @endguest
        </div>
    </div>

    <!-- HERO SECTION -->
    <header id="beranda" class="w-full max-w-7xl mx-auto px-6 pt-8 pb-16 md:pt-16 md:pb-24 grid md:grid-cols-12 gap-12 items-center">
        
        <div class="md:col-span-7 space-y-6 text-center md:text-left">
            <div class="inline-flex items-center space-x-2 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full text-xs font-bold text-emerald-700 uppercase tracking-wider">
                <span>📢</span> <span>Platform Pengaduan Infrastruktur Digital</span>
            </div>
            
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.1]">
                Sampaikan Laporan Anda, <br>
                <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">
                    Demi Masyarakat Lebih Baik
                </span>
            </h1>
            
            <p class="text-base sm:text-lg text-slate-500 max-w-2xl mx-auto md:mx-0 leading-relaxed">
                Laporkan kerusakan jalan, fasilitas umum, penerangan, hingga penumpukan sampah di lingkungan RT/RW Anda secara instan. Pantau progres perbaikan langsung dari genggaman Anda.
            </p>

            <div class="pt-4 flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 rounded-2xl shadow-xl shadow-emerald-500/20 hover:scale-[1.02] transition-all duration-200">
                    Buat Laporan Sekarang
                </a>
                <a href="#cara-kerja" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-base font-bold text-slate-700 bg-white hover:bg-slate-100 border border-slate-200 rounded-2xl shadow-sm hover:scale-[1.02] transition-all duration-200">
                    Pelajari Cara Kerja
                </a>
            </div>
        </div>

        <div class="md:col-span-5 relative flex justify-center">
            <div class="w-72 h-72 sm:w-96 sm:h-96 bg-gradient-to-tr from-emerald-500 to-teal-400 rounded-3xl rotate-12 absolute -z-10 opacity-10 animate-pulse"></div>
            
            <div class="bg-white p-6 shadow-2xl rounded-2xl border border-slate-100 max-w-xs w-full rotate-[-3deg] hover:rotate-0 transition-transform duration-300">
                <div class="flex items-center justify-between mb-4">
                    <span class="bg-amber-100 text-amber-800 text-xs font-bold px-2.5 py-1 rounded-full">⚡ Diproses</span>
                    <span class="text-xs text-slate-400">RT 004 / RW 005</span>
                </div>
                <h4 class="font-bold text-slate-800 text-sm mb-1">[Jalan] Tiang Listrik Rubuh</h4>
                <p class="text-xs text-slate-500 line-clamp-2 mb-3">Laporan kerusakan fasilitas lampu jalan yang padam akibat korsleting arus pendek kemarin malam.</p>
                <div class="border-t border-slate-50 pt-3 flex items-center justify-between text-xs text-slate-400">
                    <span>👍 24 Dukungan</span>
                    <span class="font-medium text-emerald-600">Oleh Tim Kelurahan</span>
                </div>
            </div>
        </div>
    </header>

    <!-- FITUR UTAMA SECTION -->
    <section id="tentang" class="w-full bg-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">
                    Fitur Unggulan InfraHub
                </h2>
                <p class="text-lg text-slate-500 max-w-2xl mx-auto">
                    Solusi lengkap untuk pelaporan fasilitas umum yang cepat, transparan, dan mudah diakses.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Fitur 1 -->
                <div class="bg-slate-50 rounded-2xl p-8 hover:shadow-lg hover:shadow-emerald-500/10 transition-all group">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Pelaporan Cepat</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Form online yang mudah diakses dari smartphone atau komputer. Cukup foto, tulis deskripsi, dan kirim dalam 1 menit.
                    </p>
                </div>

                <!-- Fitur 2 -->
                <div class="bg-slate-50 rounded-2xl p-8 hover:shadow-lg hover:shadow-emerald-500/10 transition-all group">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Pantau Status Real-time</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Lacak perkembangan laporan Anda kapan saja. Dapatkan notifikasi saat status berubah dari Menunggu → Diproses → Selesai.
                    </p>
                </div>

                <!-- Fitur 3 -->
                <div class="bg-slate-50 rounded-2xl p-8 hover:shadow-lg hover:shadow-emerald-500/10 transition-all group">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Tindak Lanjut Transparan</h3>
                    <p class="text-slate-500 leading-relaxed">
                        Setiap laporan diproses dengan catatan jelas. Lihat siapa petugas yang menangani dan kapan perbaikan selesai.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CARA KERJA SECTION -->
    <section id="cara-kerja" class="w-full py-16 md:py-24 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">
                    Cara Kerja InfraHub
                </h2>
                <p class="text-lg text-slate-500 max-w-2xl mx-auto">
                    Laporkan kerusakan dalam 4 langkah sederhana. Cepat, mudah, dan efektif.
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-6 md:gap-8">
                <!-- Step 1 -->
                <div class="relative text-center">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/20">
                        <span class="text-2xl font-black text-white">1</span>
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Buat Laporan</h4>
                    <p class="text-sm text-slate-500">
                        Pilih kategori, tulis deskripsi, dan unggah foto bukti kerusakan.
                    </p>
                    <!-- Connector Line (Desktop) -->
                    <div class="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-emerald-200 to-transparent -z-10"></div>
                </div>

                <!-- Step 2 -->
                <div class="relative text-center">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/20">
                        <span class="text-2xl font-black text-white">2</span>
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Verifikasi Admin</h4>
                    <p class="text-sm text-slate-500">
                        Tim kelurahan memverifikasi dan memprioritaskan laporan Anda.
                    </p>
                    <div class="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-emerald-200 to-transparent -z-10"></div>
                </div>

                <!-- Step 3 -->
                <div class="relative text-center">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/20">
                        <span class="text-2xl font-black text-white">3</span>
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Tindak Lanjut</h4>
                    <p class="text-sm text-slate-500">
                        Petugas lapangan mendatangi lokasi dan melakukan perbaikan.
                    </p>
                    <div class="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-emerald-200 to-transparent -z-10"></div>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-500/20">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Selesai</h4>
                    <p class="text-sm text-slate-500">
                        Laporan ditandai selesai. Fasilitas kembali berfungsi untuk masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTIK & TESTIMONI SECTION -->
    <section id="laporan" class="w-full py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Stats Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-slate-50 rounded-2xl">
                    <div class="text-4xl font-black text-emerald-600 mb-2">1.2K+</div>
                    <div class="text-sm text-slate-500 font-medium">Laporan Diterima</div>
                </div>
                <div class="text-center p-6 bg-slate-50 rounded-2xl">
                    <div class="text-4xl font-black text-emerald-600 mb-2">94%</div>
                    <div class="text-sm text-slate-500 font-medium">Tingkat Penyelesaian</div>
                </div>
                <div class="text-center p-6 bg-slate-50 rounded-2xl">
                    <div class="text-4xl font-black text-emerald-600 mb-2">&lt;24 Jam</div>
                    <div class="text-sm text-slate-500 font-medium">Rata-rata Respon</div>
                </div>
                <div class="text-center p-6 bg-slate-50 rounded-2xl">
                    <div class="text-4xl font-black text-emerald-600 mb-2">850+</div>
                    <div class="text-sm text-slate-500 font-medium">Warga Terdaftar</div>
                </div>
            </div>

            <!-- Testimonials -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">
                    Apa Kata Warga?
                </h2>
                <p class="text-lg text-slate-500 max-w-2xl mx-auto">
                    Pengalaman nyata masyarakat yang telah menggunakan InfraHub.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Testimonial 1 -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-400 rounded-full flex items-center justify-center text-white font-bold mr-4">BS</div>
                        <div class="text-left">
                            <div class="font-bold text-slate-900">Fajri Hasan</div>
                            <div class="text-xs text-slate-500">RT 003 / RW 002</div>
                        </div>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        "Lapor lampu jalan mati pagi, sore sudah ada petugas cek. Besoknya nyala lagi! Mantap InfraHub!"
                    </p>
                    <div class="flex mt-3 text-amber-400">
                        ★★★★★
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-400 rounded-full flex items-center justify-center text-white font-bold mr-4">SR</div>
                        <div class="text-left">
                            <div class="font-bold text-slate-900">Muhammad Fadilah</div>
                            <div class="text-xs text-slate-500">RT 005 / RW 003</div>
                        </div>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        "Akhirnya ada cara mudah lapor jalan berlubang. Statusnya bisa dipantau, jadi tidak bingung."
                    </p>
                    <div class="flex mt-3 text-amber-400">
                        ★★★★★
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-400 rounded-full flex items-center justify-center text-white font-bold mr-4">AH</div>
                        <div class="text-left">
                            <div class="font-bold text-slate-900">Ali Zaki</div>
                            <div class="text-xs text-slate-500">RT 001 / RW 001</div>
                        </div>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        "Fitur upload fotonya membantu banget. Petugas langsung paham lokasi dan jenis kerusakannya."
                    </p>
                    <div class="flex mt-3 text-amber-400">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="w-full py-16 md:py-24 bg-gradient-to-r from-emerald-600 to-teal-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">
                Siap Membangun Kelurahan Lebih Baik?
            </h2>
            <p class="text-lg text-emerald-50 mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan ratusan warga yang telah melaporkan kerusakan fasilitas umum melalui InfraHub.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-base font-bold text-emerald-700 bg-white hover:bg-emerald-50 rounded-2xl shadow-xl hover:scale-[1.02] transition-all duration-200">
                    Daftar Gratis Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="kontak" class="w-full bg-slate-900 text-slate-300">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <x-application-logo class="h-10 w-auto" />
                        <span class="text-xl font-black text-white">
                        </span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-md">
                        Platform digital untuk pelaporan kerusakan fasilitas umum. Mewujudkan pelayanan publik yang responsif, transparan, dan berorientasi pada masyarakat.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold text-white mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#beranda" class="hover:text-emerald-400 transition">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-emerald-400 transition">Tentang</a></li>
                        <li><a href="#cara-kerja" class="hover:text-emerald-400 transition">Cara Kerja</a></li>
                        <li><a href="#laporan" class="hover:text-emerald-400 transition">Laporan</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-bold text-white mb-4">Kontak</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center space-x-2">
                            <span>📧</span>
                            <a href="mailto:infrahub@kelurahan.id" class="hover:text-emerald-400 transition">infrahub@kelurahan.id</a>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span>📱</span>
                            <span>0812-3456-7890</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span>📍</span>
                            <span>Kantor Kelurahan</span>
                        </li>
                    </ul>
                    <!-- Social Media -->
                    <div class="flex space-x-3 mt-4">
                        <a href="#" class="w-9 h-9 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-emerald-600 transition">
                            <span class="text-sm">f</span>
                        </a>
                        <a href="#" class="w-9 h-9 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-emerald-600 transition">
                            <span class="text-sm">in</span>
                        </a>
                        <a href="#" class="w-9 h-9 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-emerald-600 transition">
                            <span class="text-sm">ig</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-slate-800 pt-6 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} InfraHub Kelurahan. All rights reserved.</p>
                <p class="mt-2 md:mt-0">Dibuat dengan dedikasi untuk pelayanan publik yang inklusif.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu?.classList.toggle('hidden');
        });

        // Close mobile menu when clicking a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobile-menu')?.classList.add('hidden');
            });
        });
    </script>

</body>
</html>