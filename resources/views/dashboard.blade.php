<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Ringkasan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-sm text-slate-500">Total Aduan</p>
                    <h3 class="text-2xl font-bold text-slate-800">{{ $data['total'] }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-sm text-slate-500">Menunggu</p>
                    <h3 class="text-2xl font-bold text-orange-500">{{ $data['menunggu'] }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-sm text-slate-500">Dalam Proses</p>
                    <h3 class="text-2xl font-bold text-blue-500">{{ $data['proses'] }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-sm text-slate-500">Selesai</p>
                    <h3 class="text-2xl font-bold text-green-500">{{ $data['selesai'] }}</h3>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-slate-100">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-slate-800">Aduan Terbaru</h3>
                    <a href="{{ route('reports.index') }}" class="text-xs text-indigo-600 hover:underline">Lihat Semua</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
                            <tr>
                                <th class="px-6 py-4">Pelapor</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($data['recentReports'] as $report)
                            <tr class="hover:bg-slate-50">
                                <td class="px-6 py-4 text-sm font-medium text-slate-800">{{ $report->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-slate-600">{{ $report->category }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold 
                                        {{ $report->status == 'selesai' ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600' }}">
                                        {{ strtoupper($report->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-400">{{ $report->created_at->format('d M Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>