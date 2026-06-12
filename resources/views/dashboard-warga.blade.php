<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-emerald-800 leading-tight flex items-center gap-2">
            <span>InfraHub Kelurahan - Ruang Warga</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            @if(session('success'))
                <div class="p-4 bg-emerald-100 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-semibold">
                    🎉 {{ session('success') }}
                </div>
            @endif

            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 p-6 rounded-2xl shadow-sm text-white">
                <h3 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}!</h3>
                <p class="text-emerald-100 text-sm mt-1">Mari bersama-sama membangun lingkungan kelurahan yang aman, bersih, dan nyaman dengan melaporkan setiap kerusakan fasilitas umum.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 lg:col-span-1 h-fit">
                    <h3 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">Buat Pengaduan Baru</h3>
                    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase">Judul Pengaduan</label>
                            <input type="text" name="title" class="mt-1 block w-full border-gray-200 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 text-sm" placeholder="Contoh: Tiang Lampu Roboh" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase">Kategori Fasilitas</label>
                            <select name="category" class="mt-1 block w-full border-gray-200 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 text-sm" required>
                                <option value="Jalan">Infrastruktur Jalan</option>
                                <option value="Lampu">Penerangan / Lampu Jalan</option>
                                <option value="Kebersihan">Sampah / Kebersihan Lingkungan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase">Lokasi Wilayah (RT/RW)</label>
                            <input type="text" name="location_rtrw" class="mt-1 block w-full border-gray-200 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 text-sm" placeholder="Contoh: RT 03 / RW 09" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase">Deskripsi Kerusakan</label>
                            <textarea name="description" rows="3" class="mt-1 block w-full border-gray-200 rounded-xl focus:ring-emerald-500 focus:border-emerald-500 text-sm" placeholder="Jelaskan detail kondisi kerusakan..." required></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase">Foto Bukti Kerusakan</label>
                            <input type="file" name="photo" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        </div>

                        <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-2.5 px-4 rounded-xl hover:bg-emerald-700 transition shadow-sm text-sm"> Kirim Pengaduan </button>
                    </form>
                </div>

                <div class="lg:col-span-2 space-y-4">
                    <h3 class="text-base font-bold text-gray-800 flex items-center gap-2">Status Riwayat Laporan Anda</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @forelse($reports as $report)
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:border-emerald-300 transition">
                                <div>
                                    <div class="flex justify-between items-start gap-2">
                                        <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-emerald-50 text-emerald-700">{{ $report->location_rtrw }}</span>
                                        <span class="px-2.5 py-0.5 text-xs font-bold rounded-md capitalize
                                            {{ $report->status == 'menunggu' ? 'bg-amber-50 text-amber-700' : ($report->status == 'diproses' ? 'bg-orange-50 text-orange-700' : 'bg-green-50 text-green-700') }}">
                                            ● {{ $report->status }}
                                        </span>
                                    </div>
                                    <h4 class="font-bold text-gray-800 mt-3 text-base">[{{ $report->category }}] {{ $report->title }}</h4>
                                    <p class="text-sm text-gray-500 mt-1 line-clamp-3">{{ $report->description }}</p>
                                    
                                    @if($report->photo)
                                        <img src="{{ asset('storage/' . $report->photo) }}" alt="Foto Laporan" class="w-full h-48 object-cover rounded-xl mt-3 shadow-sm">
                                    @else
                                        <p class="text-xs text-gray-400 italic mt-2">Tidak ada foto bukti.</p>
                                    @endif
                                </div>
                                
                                <div class="mt-4 flex items-center justify-between border-t border-gray-50 pt-3">
                                    <form action="{{ route('report.upvote', $report->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center gap-1.5 text-xs text-gray-500 hover:text-emerald-600 transition bg-gray-50 hover:bg-emerald-50 px-2.5 py-1.5 rounded-lg font-medium">
                                            Dukung Laporan ({{ $report->upvotes_count ?? 0 }})
                                        </button>
                                    </form>
                                    
                                    <span class="text-xs text-gray-400 font-medium">
                                        {{ $report->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-2 text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
                                <p class="text-sm text-gray-400">Anda belum pernah mengirimkan laporan pengaduan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>