<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - InfraHub Kelurahan</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 text-slate-800 font-sans selection:bg-emerald-500 selection:text-white min-h-screen w-full grid place-items-center m-0 p-0 relative overflow-x-hidden">

    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-r from-emerald-200/30 via-teal-100/20 to-indigo-200/30 blur-3xl rounded-full -z-10"></div>

    <div class="w-full max-w-md z-10 px-4 py-12">
        
        <div class="text-center mb-8">
            <span class="text-4xl">🏢</span>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900">
                Selamat Datang Kembali
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Masuk ke akun <span class="font-semibold bg-gradient-to-r from-emerald-600 to-indigo-600 bg-clip-text text-transparent">InfraHub Kelurahan</span> Anda
            </p>
        </div>

        <div class="bg-white py-8 px-6 shadow-xl rounded-2xl border border-slate-100 w-full block">
            
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-600 uppercase tracking-wide">Alamat Email</label>
                    <div class="mt-1">
                        <input id="email" type="text" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                            class="appearance-none block w-full px-3 py-2.5 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                    </div>
                    @error('email')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center">
                        <label for="password" class="block text-xs font-bold text-slate-600 uppercase tracking-wide">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700">
                                Lupa Password?
                            </a>
                        @endif
                    </div>
                    <div class="mt-1">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="appearance-none block w-full px-3 py-2.5 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                    </div>
                    @error('password')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-slate-300 rounded-md">
                    <label for="remember_me" class="ml-2 block text-xs font-medium text-slate-500">
                        Ingat saya di perangkat ini
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200">
                        Masuk Ke Sistem
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="px-2 bg-white text-slate-400 font-semibold tracking-wider">Atau masuk dengan</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <a href="#" class="inline-flex justify-center py-2.5 px-4 border border-slate-200 rounded-xl bg-white text-sm font-medium text-slate-600 shadow-sm hover:bg-slate-50 transition">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/>
                        </svg>
                        <span class="font-bold text-xs text-slate-700 self-center">Google</span>
                    </a>

                    <a href="#" class="inline-flex justify-center py-2.5 px-4 border border-slate-200 rounded-xl bg-white text-sm font-medium text-slate-600 shadow-sm hover:bg-slate-50 transition">
                        <svg class="w-5 h-5 mr-2" fill="#1877F2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span class="font-bold text-xs text-slate-700 self-center">Facebook</span>
                    </a>
                </div>
            </div>

            <div class="mt-6 text-center">
                <p class="text-xs text-slate-500">
                    Belum punya akun warga? 
                    <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:text-indigo-700 ml-1">
                        Daftar Sekarang
                    </a>
                </p>
            </div>

        </div>
    </div>

</body>
</html>