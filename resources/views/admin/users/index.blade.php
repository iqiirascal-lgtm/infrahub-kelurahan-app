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
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
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
                        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-indigo-50 to-indigo-50/30 text-indigo-700 font-bold relative group border border-indigo-100">
                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-indigo-500 rounded-r-full"></span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span>Data Warga</span>
                        </a>
                        <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>Profil</span>
                        </a>
                    </div>
                </div>
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

        <div class="flex-1 flex flex-col h-full overflow-hidden">
            
            <header class="h-16 bg-white/80 backdrop-blur-md border-b border-slate-200 px-6 flex items-center justify-between z-20">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-500 hover:bg-slate-100 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h1 class="text-lg font-bold text-slate-800">Data Warga</h1>
                
                <div class="flex items-center gap-3">
                    <div class="hidden md:flex items-center gap-4 text-xs font-bold">
                        <div class="flex items-center gap-2 text-emerald-600">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            Aktif: {{ $stats['active'] }}
                        </div>
                        <div class="flex items-center gap-2 text-slate-500">
                            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                            Total: {{ $stats['total'] }}
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 lg:p-8 space-y-6">
                
                @if(session('success'))
                    <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-bold shadow-sm flex items-center gap-3">
                        <span>✅</span> {{ session('success') }}
                    </div>
                @endif

                @if(session('warning'))
                    <div class="p-4 bg-amber-50 border border-amber-200 text-amber-800 rounded-xl text-sm font-bold shadow-sm flex items-center gap-3">
                        <span>⚠️</span> {{ session('warning') }}
                    </div>
                @endif

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Total Warga</p>
                                <h3 class="text-2xl font-extrabold text-slate-800">{{ $stats['total'] }}</h3>
                            </div>
                            <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 font-medium">Semua warga terdaftar</p>
                    </div>

                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Akun Aktif</p>
                                <h3 class="text-2xl font-extrabold text-emerald-600">{{ $stats['active'] }}</h3>
                            </div>
                            <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 font-medium">Dapat mengakses sistem</p>
                    </div>

                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Akun Non-Aktif</p>
                                <h3 class="text-2xl font-extrabold text-red-600">{{ $stats['inactive'] }}</h3>
                            </div>
                            <div class="p-2.5 bg-red-50 text-red-600 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 font-medium">Dinonaktifkan/banned</p>
                    </div>

                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Warga Baru</p>
                                <h3 class="text-2xl font-extrabold text-blue-600">{{ $stats['new_this_month'] }}</h3>
                            </div>
                            <div class="p-2.5 bg-blue-50 text-blue-600 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 font-medium">Bulan ini</p>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h3 class="font-extrabold text-lg text-slate-800">Daftar Warga Terdaftar</h3>
                            <p class="text-xs text-slate-400 mt-1">Kelola akun warga dan status keaktifan.</p>
                        </div>
                        
                        <form action="{{ route('admin.users.index') }}" method="GET" class="flex items-center gap-2">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari nama/email..." class="text-sm rounded-lg border-slate-200 shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                            
                            <select name="status" class="text-sm font-semibold rounded-lg border-slate-200 shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Semua Status</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                            </select>
                            
                            <button type="submit" class="bg-indigo-600 text-white text-sm font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors">
                                Filter
                            </button>
                            
                            @if(request()->hasAny(['search', 'status']))
                                <a href="{{ route('admin.users.index') }}" class="text-xs text-red-500 font-bold hover:underline">Reset</a>
                            @endif
                        </form>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-100">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">Warga</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">Kontak</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">Tanggal Daftar</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">Status</th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($users as $user)
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white flex items-center justify-center font-bold text-sm shrink-0">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="text-sm font-bold text-slate-800">{{ $user->name }}</div>
                                                    <div class="text-[10px] text-slate-400">ID: #{{ $user->id }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-slate-600">{{ $user->email }}</div>
                                            @if($user->phone)
                                                <div class="text-xs text-slate-400 mt-0.5">📱 {{ $user->phone }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-slate-600">{{ $user->created_at->format('d M Y') }}</div>
                                            <div class="text-xs text-slate-400">{{ $user->created_at->diffForHumans() }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($user->is_active)
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-bold rounded-full bg-emerald-100 text-emerald-700">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                    Aktif
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-bold rounded-full bg-red-100 text-red-700">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                    Non-Aktif
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="{{ route('admin.users.show', $user->id) }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 py-1.5 px-3 rounded-lg transition-colors">
                                                    Detail
                                                </a>
                                                
                                                <form action="{{ route('admin.users.toggle-status', $user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-xs font-bold {{ $user->is_active ? 'text-amber-600 hover:text-amber-800 bg-amber-50 hover:bg-amber-100' : 'text-emerald-600 hover:text-emerald-800 bg-emerald-50 hover:bg-emerald-100' }} py-1.5 px-3 rounded-lg transition-colors">
                                                        {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                                    </button>
                                                </form>
                                                
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus akun ini? Tindakan ini tidak dapat dibatalkan.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-xs font-bold text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 py-1.5 px-3 rounded-lg transition-colors">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="text-4xl mb-3">📭</div>
                                            <p class="text-slate-500 font-medium">Belum ada warga terdaftar.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if(method_exists($users, 'hasPages') && $users->hasPages())
                        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>

            </main>
        </div>
    </div>
</x-app-layout>