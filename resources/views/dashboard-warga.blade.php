<x-app-layout>
    <div x-data="{ sidebarOpen: false }" class="fixed inset-0 z-[100] flex h-screen bg-slate-50 font-sans overflow-hidden">
        
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-sm lg:hidden" @click="sidebarOpen = false"></div>
        
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-[264px] bg-white border-r border-slate-200 flex flex-col transition-transform duration-300 lg:translate-x-0 lg:static">
            
            <div class="pt-6 border-b border-slate-100">
                <div class="flex justify-center mb-4">
                    <a href="/">
                        <x-application-logo class="h-14 w-auto" />
                    </a>
                </div>
            </div>

            <div class="p-4 mx-4 mt-6 bg-slate-50 rounded-2xl border border-slate-100 flex items-center gap-3 hover:border-emerald-200 transition-colors cursor-pointer group">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm shrink-0 group-hover:scale-105 transition-transform">
                    {{ substr(Auth::user()->name, 0, 2) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] font-medium text-slate-500 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <p class="px-2 text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Menu Utama</p>
                
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50/30 text-emerald-700 font-bold relative group border border-emerald-100">
                    <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-emerald-500 rounded-r-full"></span>
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span>Ruang Warga</span>
                </a>

                <a href="#form-laporan" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-emerald-600 transition-colors">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <span>Buat Laporan</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-emerald-600 transition-colors">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <span>Riwayat Laporan</span>
                    @if(isset($reports) && $reports->count() > 0)
                        <span class="ml-auto bg-emerald-500 text-white text-[10px] font-bold py-0.5 px-2 rounded-full">
                            {{ $reports->count() }}
                        </span>
                    @endif
                </a>

                <p class="px-2 text-xs font-bold text-slate-400 uppercase tracking-wider mt-6 mb-3">Pengaturan</p>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-emerald-600 transition-colors">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span>Profil Saya</span>
                </a>
            </nav>

            <div class="p-4 border-t border-slate-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-red-600 font-bold bg-red-50 hover:bg-red-100 transition-colors text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col h-full min-w-0 relative">
            
            <header class="h-16 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-30 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
    
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-500 hover:bg-slate-100 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    
                    <div class="hidden sm:block">
                        <h1 class="text-lg font-bold text-slate-800 leading-tight">Dashboard Pengaduan</h1>
                        <p class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider">Layanan Kelurahan Terpadu</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 sm:gap-5">
                    <div class="hidden md:flex relative">
                        <input type="text" placeholder="Cari laporan..." class="w-64 pl-10 pr-4 py-2 bg-slate-100 border-transparent rounded-full text-sm focus:bg-white focus:border-emerald-300 focus:ring-2 focus:ring-emerald-500/20 transition-all">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>

                    <div x-data="{ notificationOpen: false }" class="relative">
                        <button @click="notificationOpen = !notificationOpen" class="relative p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full animate-pulse"></span>
                        </button>

                        <div x-show="notificationOpen" @click.away="notificationOpen = false" class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-100 p-4 z-[999]">
                            <h4 class="text-sm font-bold text-slate-800 mb-3 border-b pb-2">Notifikasi</h4>
                            <div class="max-h-60 overflow-y-auto space-y-2">
                            </div>
                        </div>a
                    </div>


                    <div class="lg:hidden w-8 h-8 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs border border-emerald-200">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 pb-24 space-y-8 scroll-smooth">
                
                @if(session('success'))
                    <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-bold shadow-sm flex items-center gap-3 animate-fade-in">
                        <span class="text-xl">🎉</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-3xl p-6 sm:p-10 relative overflow-hidden shadow-xl shadow-emerald-600/10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div class="absolute -top-32 -right-20 w-80 h-80 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-24 -left-20 w-64 h-64 bg-emerald-400/20 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="relative z-10">
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight mb-2">Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h2>
                        <p class="text-emerald-50 max-w-xl text-sm leading-relaxed opacity-90">Lingkungan yang nyaman dimulai dari kepedulian kita. Temukan fasilitas umum yang rusak? Laporkan sekarang agar segera ditindaklanjuti.</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Total Laporan -->
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md hover:border-emerald-200 transition-all group">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Total Laporan</p>
                                <h3 class="text-2xl font-extrabold text-slate-800">{{ $reports->count() }}</h3>
                            </div>
                            <div class="p-2.5 bg-gradient-to-br from-emerald-500 to-teal-500 text-white rounded-xl group-hover:scale-110 transition-transform shadow-lg shadow-emerald-500/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 font-medium">Semua aduan Anda</p>
                    </div>

                    <!-- Pending -->
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:border-amber-100 transition-colors group">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Pending</p>
                                <h3 class="text-2xl font-extrabold text-slate-800">{{ $reports->where('status', 'menunggu')->count() }}</h3>
                            </div>
                            <div class="p-2.5 bg-amber-50 text-amber-500 rounded-xl group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 font-medium">Menunggu verifikasi admin</p>
                    </div>

                    <!-- Diproses -->
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:border-orange-100 transition-colors group">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Diproses</p>
                                <h3 class="text-2xl font-extrabold text-slate-800">{{ $reports->where('status', 'diproses')->count() }}</h3>
                            </div>
                            <div class="p-2.5 bg-orange-50 text-orange-500 rounded-xl group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 font-medium">Sedang dalam pengerjaan</p>
                    </div>

                    <!-- Selesai -->
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:border-emerald-100 transition-colors group">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Selesai</p>
                                <h3 class="text-2xl font-extrabold text-slate-800">{{ $reports->where('status', 'selesai')->count() }}</h3>
                            </div>
                            <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 font-medium">Masalah telah diatasi</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                    
                    <div id="form-laporan" class="xl:col-span-1">
                        <div class="bg-white p-6 rounded-2xl shadow-lg shadow-slate-200/50 border border-slate-100 xl:sticky xl:top-6">
                            
                            <div class="mb-6 pb-4 border-b border-slate-100">
                                <h3 class="text-lg font-extrabold text-slate-800 flex items-center gap-2">
                                    <div class="p-1.5 bg-emerald-100 text-emerald-600 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></div>
                                    Form Aduan
                                </h3>
                                <p class="text-xs text-slate-500 mt-1">Lengkapi form di bawah ini dengan data valid.</p>
                            </div>
                            
                            <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Judul Pengaduan</label>
                                    <input type="text" name="title" class="block w-full bg-slate-50 border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all placeholder-slate-400" placeholder="Contoh: Pipa Bocor di Jalan Merpati" required>
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Kategori</label>
                                        <select name="category" class="block w-full bg-slate-50 border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all" required>
                                            <option value="Jalan">Jalan</option>
                                            <option value="Lampu">Lampu</option>
                                            <option value="Kebersihan">Kebersihan</option>
                                            <option value="Lampu">Tiang</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Lokasi (RT/RW)</label>
                                        <input type="text" name="location_rtrw" class="block w-full bg-slate-50 border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all placeholder-slate-400" placeholder="03 / 09" required>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Deskripsi Kerusakan</label>
                                    <textarea name="description" rows="3" class="block w-full bg-slate-50 border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 text-sm transition-all placeholder-slate-400 resize-none" placeholder="Ceritakan detail kerusakan yang terjadi..." required></textarea>
                                </div>
                                
                                <div>
                                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Foto Bukti</label>
                                    <div class="relative border-2 border-dashed border-slate-300 rounded-xl p-6 flex flex-col items-center justify-center bg-slate-50 hover:bg-emerald-50/50 hover:border-emerald-400 transition-colors cursor-pointer group">
                                        <svg class="w-8 h-8 text-slate-400 group-hover:text-emerald-500 transition-colors mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                        <span class="text-sm font-bold text-slate-600">Klik / Drag foto ke sini</span>
                                        <span class="text-[10px] text-slate-400 mt-1">Maks 5MB (JPG, PNG)</span>
                                        <input type="file" id="photo-input" name="photo" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                    </div>

                                    <!-- Preview Foto -->
                                    <div id="photo-preview" class="hidden mt-3 relative">
                                        <img id="preview-img" src="" alt="Preview" class="w-full h-32 object-cover rounded-xl border border-slate-200">
                                        <button type="button" onclick="removePhoto()" class="absolute top-2 right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <script>
                                document.getElementById('photo-input').addEventListener('change', function(e) {
                                    const file = e.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            document.getElementById('preview-img').src = e.target.result;
                                            document.getElementById('photo-preview').classList.remove('hidden');
                                        }
                                        reader.readAsDataURL(file);
                                    }
                                });

                                function removePhoto() {
                                    document.getElementById('photo-input').value = '';
                                    document.getElementById('photo-preview').classList.add('hidden');
                                }
                                </script>

                                <button type="submit" class="w-full mt-4 bg-slate-800 text-white font-bold py-3.5 px-4 rounded-xl hover:bg-slate-700 transition-all shadow-md active:scale-[0.98] flex justify-center items-center gap-2 text-sm"> 
                                    Kirim Laporan
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="xl:col-span-2 space-y-5">
                        
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-200 pb-4">
                            <h3 class="text-lg font-extrabold text-slate-800">Riwayat Laporan</h3>
                            
                            <div class="flex gap-2 overflow-x-auto w-full sm:w-auto pb-2 sm:pb-0 hide-scrollbar">
                                <button class="px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white text-xs font-bold rounded-xl shadow-md shadow-emerald-500/20 whitespace-nowrap">
                                    Semua
                                </button>
                                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-600 text-xs font-bold rounded-xl whitespace-nowrap transition-all">
                                    Menunggu
                                </button>
                                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-600 text-xs font-bold rounded-xl whitespace-nowrap transition-all">
                                    Proses
                                </button>
                                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-600 text-xs font-bold rounded-xl whitespace-nowrap transition-all">
                                    Selesai
                                </button>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($reports as $report)
                                <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:border-emerald-300 transition-all group flex flex-col h-full">
                                    <div class="flex justify-between items-start mb-3 gap-2">
                                        <div class="flex gap-2">
                                            <span class="px-2 py-1 text-[10px] font-extrabold rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-wider">
                                                {{ $report->category->name ?? $report->category ?? 'Umum' }}
                                            </span>
                                        </div>
                                        <span class="px-2 py-1 text-[10px] font-extrabold rounded-md uppercase tracking-wider border
                                            {{ $report->status == 'menunggu' ? 'bg-amber-50 text-amber-600 border-amber-200' : ($report->status == 'diproses' ? 'bg-orange-50 text-orange-600 border-orange-200' : 'bg-emerald-50 text-emerald-600 border-emerald-200') }}">
                                            {{ ucfirst($report->status) }}
                                        </span>
                                    </div>
                                    
                                    <h4 class="font-bold text-slate-800 text-sm leading-snug">{{ $report->title }}</h4>
                                    <div class="flex items-center gap-1.5 mt-1 text-xs text-slate-400 font-medium mb-3">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        </svg>
                                        {{ $report->location_rtrw }}
                                    </div>
                                    
                                    @if($report->photo)
                                        <div class="overflow-hidden rounded-xl border border-slate-100 mt-auto">
                                            <img src="{{ asset('storage/' . $report->photo) }}" alt="Foto Laporan" class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-500">
                                        </div>
                                    @else
                                        <div class="h-32 bg-slate-50 rounded-xl border border-dashed border-slate-200 flex items-center justify-center mt-auto">
                                            <span class="text-xs text-slate-400 font-medium">Tanpa Lampiran Foto</span>
                                        </div>
                                    @endif
                                    
                                    <!-- Timeline Status -->
                                    <div class="mt-4 pt-4 border-t border-slate-100">
                                        <div class="flex items-center justify-between text-[10px]">
                                            <div class="flex items-center gap-1.5">
                                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                                <span class="text-slate-600 font-medium">Dilaporkan</span>
                                            </div>
                                            <div class="flex items-center gap-1.5">
                                                <span class="w-2 h-2 rounded-full {{ in_array($report->status, ['diproses', 'selesai']) ? 'bg-emerald-500' : 'bg-slate-300' }}"></span>
                                                <span class="{{ in_array($report->status, ['diproses', 'selesai']) ? 'text-emerald-600 font-bold' : 'text-slate-400' }}">Diverifikasi</span>
                                            </div>
                                            <div class="flex items-center gap-1.5">
                                                <span class="w-2 h-2 rounded-full {{ $report->status == 'diproses' ? 'bg-amber-500 animate-pulse' : ($report->status == 'selesai' ? 'bg-emerald-500' : 'bg-slate-300') }}"></span>
                                                <span class="{{ $report->status == 'diproses' ? 'text-amber-600 font-bold' : ($report->status == 'selesai' ? 'text-emerald-600' : 'text-slate-400') }}">Diproses</span>
                                            </div>
                                            <div class="flex items-center gap-1.5">
                                                <span class="w-2 h-2 rounded-full {{ $report->status == 'selesai' ? 'bg-emerald-500' : 'bg-slate-300' }}"></span>
                                                <span class="{{ $report->status == 'selesai' ? 'text-emerald-600 font-bold' : 'text-slate-400' }}">Selesai</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="inline-flex items-center gap-1.5 text-xs text-slate-500 px-2.5 py-1.5 rounded-lg font-bold">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                                            </svg>
                                            {{ $report->upvotes_count ?? 0 }}
                                        </div>
                                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                                            {{ $report->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-1 md:col-span-2 flex flex-col items-center justify-center py-16 px-4 bg-white rounded-2xl border border-dashed border-slate-200">
                                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </div>
                                    <h4 class="text-slate-700 font-bold mb-1">Belum Ada Laporan</h4>
                                    <p class="text-xs text-slate-400 text-center max-w-xs">Anda belum pernah membuat laporan. Laporkan kerusakan fasilitas sekarang untuk lingkungan yang lebih baik.</p>
                                </div>
                            @endforelse
                        </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
    
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</x-app-layout>