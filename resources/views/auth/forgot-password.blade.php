<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Kata Sandi - InfraHub Kelurahan</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 text-slate-800 font-sans selection:bg-emerald-500 selection:text-white min-h-screen w-full grid place-items-center m-0 p-0 relative overflow-x-hidden">

    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-r from-emerald-200/30 via-teal-100/20 to-indigo-200/30 blur-3xl rounded-full -z-10"></div>

    <div class="w-full max-w-md z-10 px-4 py-8">
        
        <div class="text-center mb-6">
            <div class="flex justify-center mb-4">
                <a href="/">
                    <x-application-logo class="h-14 w-auto" />
                </a>
            </div>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">
                Atur Ulang Kata Sandi
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Sistem Pengaduan <span class="font-semibold bg-gradient-to-r from-emerald-600 to-indigo-600 bg-clip-text text-transparent">InfraHub Kelurahan</span>
            </p>
        </div>

        <div class="bg-white py-8 px-6 shadow-xl rounded-2xl border border-slate-100 w-full block">
            
            <div class="mb-5 text-sm text-slate-500 leading-relaxed text-center sm:text-left">
                Lupa kata sandi Anda? Tidak masalah. Cukup masukkan alamat email yang terdaftar di bawah ini, dan kami akan mengirimkan tautan pemulihan untuk membuat kata sandi baru.
            </div>

            @if (session('status'))
                <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs font-semibold shadow-sm flex items-center gap-2">
                    <span>📧</span>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-600 uppercase tracking-wide">Alamat Email</label>
                    <div class="mt-1">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="appearance-none block w-full px-3 py-2.5 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 text-sm" placeholder="email@contoh.com">
                    </div>
                    @error('email')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200">
                        Kirim Tautan Pemulihan
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center border-t border-slate-100 pt-4">
                <p class="text-xs text-slate-500">
                    Ingat kata sandi Anda?
                    <a href="{{ route('login') }}" class="font-bold text-emerald-600 hover:text-emerald-700 ml-1 transition">
                        Kembali Masuk
                    </a>
                </p>
            </div>

        </div>
    </div>

</body>
</html>