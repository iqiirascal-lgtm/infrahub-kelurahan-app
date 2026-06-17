<x-app-layout>
    <div x-data="{ sidebarOpen: false }" class="fixed inset-0 z-[100] flex h-screen bg-slate-50 font-sans overflow-hidden">
        
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-[264px] bg-white border-r border-slate-200 flex flex-col transition-transform duration-300 lg:translate-x-0 lg:static">
            <div class="pt-6 border-b border-slate-100">
                <div class="flex justify-center mb-4">
                    <a href="/"><x-application-logo class="h-14 w-auto" /></a>
                </div>
            </div>
            
            <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
                <div>
                    <p class="px-2 text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Manajemen</p>
                    <div class="space-y-1">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-indigo-50 text-indigo-700 font-bold border border-indigo-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            <span>Kelola Laporan</span>
                        </a>
                    </div>
                </div>
            </nav>
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
                            <p class="text-3xl font-extrabold text-slate-800 mt-1">{{ $data['total'] }}</p>
                        </div>
                        <div class="p-3 bg-slate-100 rounded-xl text-2xl">📊</div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-amber-600 uppercase tracking-wider">Menunggu</p>
                             <p class="text-3xl font-extrabold text-slate-800 mt-1">{{ $data['menunggu'] }}</p>
                        </div>
                        <div class="p-3 bg-amber-50 rounded-xl text-2xl">⏳</div>
                    </div>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Selesai</p>
                             <p class="text-3xl font-extrabold text-slate-800 mt-1">{{ $data['selesai'] }}</p>
                        </div>
                        <div class="p-3 bg-emerald-50 rounded-xl text-2xl">🎉</div>
                    </div>
                </div>

                <div class="bg-indigo-600 rounded-2xl p-8 text-white shadow-lg">
                    <h2 class="text-2xl font-bold">Halo, {{ Auth::user()->name }}! 👋</h2>
                    <p class="mt-2 text-indigo-100">Selamat datang kembali di panel administrasi kelurahan.</p>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>