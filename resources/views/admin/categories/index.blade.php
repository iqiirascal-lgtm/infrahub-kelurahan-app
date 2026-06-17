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
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            <span>Kelola Laporan</span>
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gradient-to-r from-indigo-50 to-indigo-50/30 text-indigo-700 font-bold relative group border border-indigo-100">
                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-indigo-500 rounded-r-full"></span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
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
                <h1 class="text-lg font-bold text-slate-800">Kategori Fasilitas</h1>
                
                <div class="flex items-center gap-3">
                    <div class="hidden md:flex items-center gap-4 text-xs font-bold">
                        <div class="flex items-center gap-2 text-slate-500">
                            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                            Total Kategori: {{ $categories->count() }}
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

                @error('name')
                    <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl text-sm font-bold shadow-sm flex items-center gap-3">
                        <span>⚠️</span> {{ $message }}
                    </div>
                @enderror

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- Form Tambah Kategori -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden sticky top-6">
                            <div class="p-6 border-b border-slate-100">
                                <h3 class="font-extrabold text-lg text-slate-800">Tambah Kategori Baru</h3>
                                <p class="text-xs text-slate-400 mt-1">Tambahkan kategori fasilitas untuk pilihan laporan warga.</p>
                            </div>
                            
                            <div class="p-6">
                                <form action="{{ route('admin.categories.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Kategori</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="Contoh: Jalan Rusak" required>
                                    </div>
                                    <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2.5 px-4 rounded-xl hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                        Simpan Kategori
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Kategori -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                            <div class="p-6 border-b border-slate-100">
                                <h3 class="font-extrabold text-lg text-slate-800">Daftar Kategori Tersedia</h3>
                                <p class="text-xs text-slate-400 mt-1">Kelola kategori fasilitas yang tersedia untuk pelaporan.</p>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-slate-100">
                                    <thead class="bg-slate-50">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">No</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">Nama Kategori</th>
                                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase">Tanggal Dibuat</th>
                                            <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        @forelse($categories as $index => $category)
                                            <tr class="hover:bg-slate-50 transition-colors">
                                                <td class="px-6 py-4 text-sm text-slate-600 font-medium">{{ $index + 1 }}</td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center gap-3">
                                                        <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-indigo-500 to-blue-500 text-white flex items-center justify-center font-bold text-xs shrink-0">
                                                            {{ substr($category->name, 0, 1) }}
                                                        </div>
                                                        <div>
                                                            <div class="text-sm font-bold text-slate-800">{{ $category->name }}</div>
                                                            <div class="text-[10px] text-slate-400">ID: #{{ $category->id }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-xs text-slate-500">
                                                    {{ $category->created_at->format('d M Y') }}
                                                </td>
                                                <td class="px-6 py-4 text-right">
                                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini? Data yang terhubung akan terpengaruh.');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-xs font-bold text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 py-1.5 px-3 rounded-lg transition-colors inline-flex items-center gap-1">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="px-6 py-12 text-center">
                                                    <div class="text-4xl mb-3">📭</div>
                                                    <p class="text-slate-500 font-medium">Belum ada kategori yang ditambahkan.</p>
                                                    <p class="text-xs text-slate-400 mt-1">Gunakan form di samping untuk menambah kategori pertama.</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</x-app-layout>