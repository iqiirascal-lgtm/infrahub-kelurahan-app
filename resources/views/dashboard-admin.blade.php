<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-indigo-800 leading-tight flex items-center gap-2">
            <span>InfraHub - Panel Admin Kelurahan</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="p-4 bg-indigo-100 border border-indigo-200 text-indigo-800 rounded-xl text-sm font-semibold">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-xs font-bold text-gray-500 uppercase">Total Aduan</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $reports->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-xs font-bold text-amber-500 uppercase">Menunggu</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $reports->where('status', 'menunggu')->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-xs font-bold text-emerald-500 uppercase">Selesai</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $reports->where('status', 'selesai')->count() }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-gray-100">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4 text-gray-800">Daftar Masuk Pengaduan Infrastruktur</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Pelapor & Lokasi</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Detail Laporan</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Foto</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Status & Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($reports as $report)
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-bold text-gray-900">{{ $report->user->name }}</div>
                                            <div class="text-xs text-indigo-600 font-semibold">{{ $report->location_rtrw }}</div>
                                            <div class="text-[10px] text-gray-400 mt-1">{{ $report->created_at->format('d/m/Y H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-xs font-bold text-gray-400 uppercase">[{{ $report->category }}]</div>
                                            <div class="text-sm font-bold text-gray-800">{{ $report->title }}</div>
                                            <div class="text-xs text-gray-500 line-clamp-2 mt-1">{{ $report->description }}</div>
                                            <div class="text-xs mt-2 text-emerald-600 font-bold">👍 {{ $report->upvotes_count }} Dukungan</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($report->photo)
                                                <a href="{{ asset('storage/' . $report->photo) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $report->photo) }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200 hover:scale-110 transition">
                                                </a>
                                            @else
                                                <span class="text-xs text-gray-300 italic">No Photo</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('report.status', $report->id) }}" method="POST" class="flex flex-col gap-2">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="text-xs rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">
                                                    <option value="menunggu" {{ $report->status == 'menunggu' ? 'selected' : '' }}>🟡 Menunggu</option>
                                                    <option value="diproses" {{ $report->status == 'diproses' ? 'selected' : '' }}>🟠 Diproses</option>
                                                    <option value="selesai" {{ $report->status == 'selesai' ? 'selected' : '' }}>🟢 Selesai</option>
                                                </select>
                                                <button type="submit" class="bg-indigo-600 text-white text-[10px] font-bold py-1 px-2 rounded-md hover:bg-indigo-700 transition">
                                                    Update Status
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-400 italic text-sm">
                                            Belum ada laporan warga yang masuk.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>