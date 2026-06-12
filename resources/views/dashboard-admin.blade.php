<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Kelurahan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Daftar Pengaduan Warga</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelapor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul Pengaduan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($reports as $report)
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                        {{ $report->user->name ?? 'Warga Anonim' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <div class="font-bold text-gray-800">{{ $report->title }}</div>
                                        <div class="text-xs">{{ $report->description }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                            {{ $report->status === 'menunggu' ? 'bg-amber-100 text-amber-800' : '' }}
                                            {{ $report->status === 'diproses' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $report->status === 'selesai' ? 'bg-emerald-100 text-emerald-800' : '' }}">
                                            {{ $report->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <form action="{{ route('report.status', $report->id) }}" method="POST" class="inline-flex items-center gap-2">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="text-xs rounded border-gray-300 py-1">
                                                <option value="menunggu" {{ $report->status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                <option value="diproses" {{ $report->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                <option value="selesai" {{ $report->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                            <button type="submit" class="bg-indigo-600 text-white text-xs px-2 py-1 rounded hover:bg-indigo-700">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-400 italic">Belum ada pengaduan masuk.</td>
                                </tr>
                            @endempty
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>