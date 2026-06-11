<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight flex items-center gap-2">
            <span>Panel Kontrol Kelurahan - Ruang Eksekutif Admin</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="p-4 mb-4 bg-blue-100 text-blue-800 rounded-xl text-sm font-semibold">
                    💡 {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-5 bg-slate-900 text-white">
                    <h3 class="text-base font-bold">Daftar Konsolidasi Pengaduan Warga</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Otoritas peninjauan laporan, penentuan eskalasi status, dan manajemen keluhan warga kelurahan.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4">Pelapor</th>
                                <th class="px-6 py-4">Isi Keluhan & Wilayah</th>
                                <th class="px-6 py-4 text-center">Urgenitas Dukungan</th>
                                <th class="px-6 py-4">Status & Tindakan Eksekusi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($reports as $report)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $report->user->name }}
                                        <div class="text-xs text-gray-400 font-normal">{{ $report->user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-700">[{{ $report->category }}] {{ $report->title }}</div>
                                        <div class="text-xs text-gray-500 mt-1">{{ $report->description }}</div>
                                        <div class="text-xs text-gray-400 mt-1">Sektor: <span class="font-semibold text-gray-600">{{ $report->location_rtrw }}</span></div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-800 border border-amber-200">
                                            🔥 {{ $report->upvotes_count }} Dukungan Warga
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('report.status', $report->id) }}" method="POST" class="flex items-center gap-2">
                                            @csrf @method('PATCH')
                                            <select name="status" class="text-xs border-gray-200 rounded-xl focus:ring-slate-500 focus:border-slate-500">
                                                <option value="menunggu" {{ $report->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                <option value="diproses" {{ $report->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                <option value="selesai" {{ $report->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                            <button type="submit" class="bg-slate-800 text-white text-xs font-bold px-3 py-2 rounded-xl hover:bg-slate-700 transition shadow-sm">Simpan</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-400 text-sm">Sistem dalam keadaan bersih. Belum ada laporan masuk dari warga.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>