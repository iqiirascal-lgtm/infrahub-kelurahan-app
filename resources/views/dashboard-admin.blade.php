<x-app-layout>
    <div x-data="{ sidebarOpen: false }" class="fixed inset-0 z-[100] flex h-screen bg-slate-50 font-sans overflow-hidden">
        
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-[264px] bg-white border-r border-slate-200 flex flex-col transition-transform duration-300 lg:translate-x-0 lg:static">
            <div class="pt-6 border-b border-slate-100">
                <div class="flex justify-center mb-4">
                    <a href="/">
                        <x-application-logo class="h-14 w-auto" />
                    </a>
                </div>
            </div>

            <div class="p-4 mx-4 mt-6 bg-indigo-50/50 rounded-2xl border border-indigo-100 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold text-sm shrink-0">
                    {{ substr(Auth::user()->name, 0, 2) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] font-medium text-indigo-600 truncate">Administrator</p>
                </div>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
                <div>
                    <p class="px-2 text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Manajemen</p>
                    <div class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-indigo-50 text-indigo-700 font-bold border border-indigo-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            <span>Kelola Laporan</span>
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            <span>Kategori Fasilitas</span>
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Data Warga</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>Profil</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Tombol Keluar -->
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

        <div class="flex-1 flex flex-col h-full overflow-hidden">
            <header class="h-16 bg-white/80 backdrop-blur-md border-b border-slate-200 px-6 flex items-center justify-between z-20">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-500 hover:bg-slate-100 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h1 class="text-lg font-bold text-slate-800">Dashboard Admin</h1>
            </header>

            <main class="flex-1 overflow-y-auto p-6 lg:p-8 space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Aduan</p>
                            <p class="text-3xl font-extrabold text-slate-800 mt-1">{{ $stats['total'] ?? 0 }}</p>
                        </div>
                        <div class="p-3 bg-slate-100 rounded-xl text-2xl">📊</div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-amber-600 uppercase tracking-wider">Menunggu</p>
                            <p class="text-3xl font-extrabold text-slate-800 mt-1">{{ $stats['menunggu'] ?? 0 }}</p>
                        </div>
                        <div class="p-3 bg-amber-50 rounded-xl text-2xl">⏳</div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Selesai</p>
                            <p class="text-3xl font-extrabold text-slate-800 mt-1">{{ $stats['selesai'] ?? 0 }}</p>
                        </div>
                        <div class="p-3 bg-emerald-50 rounded-xl text-2xl">🎉</div>
                    </div>
                </div>

                <div class="bg-indigo-600 rounded-2xl p-8 text-white shadow-lg">
                    <h2 class="text-2xl font-bold">Halo, {{ Auth::user()->name }}! 👋</h2>
                    <p class="mt-2 text-indigo-100">Selamat datang kembali di panel administrasi kelurahan.</p>
                </div>

                <!-- Widget Laporan Terbaru -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100">
                        <h3 class="font-extrabold text-lg text-slate-800">Laporan Terbaru</h3>
                        <p class="text-xs text-slate-400 mt-1">5 laporan terbaru yang masuk dari warga.</p>
                    </div>
                    
                    <div class="divide-y divide-slate-100">
                       @forelse($recentReports ?? [] as $report)
                            <div class="p-4 hover:bg-slate-50 transition-colors flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white flex items-center justify-center font-bold text-sm shrink-0">
                                    {{ substr($report->user->name ?? 'U', 0, 1) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-slate-800 truncate">{{ $report->title }}</div>
                                    <div class="text-xs text-slate-500 mt-0.5">
                                        oleh {{ $report->user->name ?? 'Unknown' }} • {{ $report->created_at->diffForHumans() }}
                                    </div>
                                </div>
                                <span class="px-2 py-1 text-[10px] font-extrabold rounded-md border capitalize
                                    {{ $report->status == 'menunggu' ? 'bg-amber-50 text-amber-700 border-amber-200' : 
                                    ($report->status == 'diproses' ? 'bg-blue-50 text-blue-700 border-blue-200' : 
                                    'bg-emerald-50 text-emerald-700 border-emerald-200') }}">
                                    {{ $report->status }}
                                </span>
                            </div>
                        @empty
                            <div class="p-8 text-center text-slate-400">
                                <div class="text-3xl mb-2">📭</div>
                                <p class="text-sm">Belum ada laporan yang masuk.</p>
                            </div>
                        @endforelse
                    </div>
                    
                    @if(isset($recentReports) && $recentReports->count() > 0)
                        <div class="p-4 border-t border-slate-100 bg-slate-50/50 text-center">
                            <a href="{{ route('admin.reports.index') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800">
                                Lihat Semua Laporan →
                            </a>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</x-app-layout>