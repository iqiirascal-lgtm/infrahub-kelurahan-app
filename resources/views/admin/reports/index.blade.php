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
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-indigo-50 to-indigo-50/30 text-indigo-700 font-bold relative group border border-indigo-100">
                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-indigo-500 rounded-r-full"></span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
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
                <h1 class="text-lg font-bold text-slate-800">Manajemen Laporan</h1>
                
                <div class="flex items-center gap-3">
                    <div class="hidden md:flex items-center gap-4 text-xs font-bold">
                        <div class="flex items-center gap-2 text-slate-500">
                            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                            Total: {{ $reports->count() }}
                        </div>
                        <div class="flex items-center gap-2 text-amber-600">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            Menunggu: {{ $reports->where('status', 'menunggu')->count() }}
                        </div>
                        <div class="flex items-center gap-2 text-orange-600">
                            <span class="w-2 h-2 rounded-full bg-orange-400"></span>
                            Diproses: {{ $reports->where('status', 'diproses')->count() }}
                        </div>
                        <div class="flex items-center gap-2 text-emerald-600">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            Selesai: {{ $reports->where('status', 'selesai')->count() }}
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

                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h3 class="font-extrabold text-lg text-slate-800">Daftar Semua Laporan</h3>
                            <p class="text-xs text-slate-400 mt-1">Gunakan filter untuk mencari berdasarkan status laporan.</p>
                        </div>
                        
                        <form action="{{ route('admin.reports.index') }}" method="GET" class="flex flex-wrap items-center gap-2">
    {{-- Search --}}
    <input type="text" name="search" value="{{ request('search') }}" 
           placeholder="🔍 Cari laporan..." 
           class="text-sm rounded-lg border-slate-200 shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
    
    {{-- Filter Status --}}
    <select name="status" class="text-sm font-semibold rounded-lg border-slate-200 shadow-sm py-2 pl-3 pr-8 focus:ring-indigo-500 focus:border-indigo-500 appearance-none bg-white">
        <option value="">Semua Status</option>
        <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>🟡 Menunggu</option>
        <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>🟠 Diproses</option>
        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>🟢 Selesai</option>
    </select>

    {{-- Filter Kategori (tampil jika ada kategori) --}}
    @if(isset($categories) && $categories->count() > 0)
        <select name="category" class="text-sm font-semibold rounded-lg border-slate-200 shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">Semua Kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->name }}" {{ request('category') == $cat->name ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    @endif

    {{-- Sort --}}
    <select name="status" class="text-sm font-semibold rounded-lg border-slate-200 shadow-sm py-2 pl-3 pr-8 focus:ring-indigo-500 focus:border-indigo-500 appearance-none bg-white">
        <option value="latest" {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>Terbaru</option>
        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
    </select>

    <button type="submit" class="bg-indigo-600 text-white text-sm font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors">
        Filter
    </button>
    
    @if(request()->hasAny(['search', 'status', 'category', 'sort']))
        <a href="{{ route('admin.reports.index') }}" class="text-xs text-red-500 font-bold hover:underline">
            Reset
        </a>
    @endif
</form>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-100">
                            <thead>
                                <tr class="bg-slate-50">
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">Pelapor</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">Detail Masalah</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">Aksi & Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($reports as $report)
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white flex items-center justify-center font-bold text-xs">
                                                    {{ substr($report->user->name ?? 'U', 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="text-sm font-bold text-slate-900">{{ $report->user->name ?? 'User' }}</div>
                                                    <div class="text-[10px] text-slate-400 mt-0.5 flex items-center gap-1">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                                        {{ $report->location_rtrw }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-[10px] text-slate-400 mt-2 ml-12">{{ $report->created_at->format('d M Y, H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="mb-1.5">
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[10px] font-extrabold rounded-md bg-indigo-50 text-indigo-700 border border-indigo-200 uppercase tracking-wider">
                                                    {{ $report->category->name ?? 'Umum' }}
                                                </span>
                                            </div>
                                            <div class="text-sm font-bold text-slate-800 mt-1.5">{{ $report->title }}</div>
                                            <div class="text-xs text-slate-500 line-clamp-2 mt-1 leading-relaxed max-w-sm">
                                                {{ $report->description }}
                                            </div>
                                            @if($report->photo)
                                                <div class="mt-2">
                                                    <a href="{{ asset('storage/' . $report->photo) }}" target="_blank" class="inline-flex items-center gap-1 text-[10px] font-bold text-indigo-600 hover:text-indigo-800">
                                                        Lihat Foto Bukti
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('admin.reports.updateStatus', $report->id) }}" method="POST" class="flex flex-col gap-2">
                                                @csrf @method('PATCH')
                                                <select name="status" class="text-xs font-bold rounded-lg border-slate-200 shadow-sm py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500">
                                                    <option value="menunggu" {{ $report->status == 'menunggu' ? 'selected' : '' }}>🟡 Menunggu</option>
                                                    <option value="diproses" {{ $report->status == 'diproses' ? 'selected' : '' }}>🟠 Diproses</option>
                                                    <option value="selesai" {{ $report->status == 'selesai' ? 'selected' : '' }}>🟢 Selesai</option>
                                                </select>
                                                <button type="submit" class="bg-indigo-600 text-white text-xs font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-1">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                    Update
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-12 text-center">
                                            <div class="text-4xl mb-3">📭</div>
                                            <p class="text-slate-500 font-medium">Tidak ada laporan yang ditemukan.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if(method_exists($reports, 'hasPages') && $reports->hasPages())
                        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                            {{ $reports->links() }}
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</x-app-layout>