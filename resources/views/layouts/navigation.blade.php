<div x-show="isOpen" 
     @click.away="isOpen = false"
     class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-100 p-4 z-[999]">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
        </svg>
    </button>

    <div x-show="isOpen" 
         @click.away="isOpen = false"
         class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-100 p-4 z-50">
        
        <h4 class="text-sm font-bold text-slate-800 mb-3">Notifikasi Baru</h4>
        
        <div class="space-y-3 max-h-60 overflow-y-auto">
            @forelse(Auth::user()->unreadNotifications as $notification)
                <div class="p-3 bg-slate-50 rounded-xl text-xs text-slate-700">
                    <p class="font-bold">{{ $notification->data['message'] }}</p>
                    <span class="text-[10px] text-slate-400">{{ $notification->created_at->diffForHumans() }}</span>
                </div>
            @empty
                <p class="text-xs text-slate-400 text-center py-4">Tidak ada notifikasi baru.</p>
            @endforelse
        </div>
        
        @if(Auth::user()->unreadNotifications->count() > 0)
            <form action="{{ route('notifications.read') }}" method="POST" class="mt-3 pt-3 border-t border-slate-100 text-center">
                @csrf
                <button type="submit" class="text-xs font-bold text-indigo-600 hover:text-indigo-800">
                    Tandai semua dibaca
                </button>
            </form>
        @endif
        </div>
</div>