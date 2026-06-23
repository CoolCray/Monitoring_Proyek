<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login - {{ $project->name ?? 'Proyek' }}</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-blue-500 selection:text-white min-h-screen flex flex-col">
    @include('layout.header')
    
    <div class="flex-grow flex items-center justify-center p-5">
        <div class="w-full max-w-md bg-white p-8 shadow-xl rounded-3xl border border-slate-100">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-slate-900">Akses Proyek</h2>
                <p class="text-slate-500 text-sm mt-2">Masukkan password untuk melihat detail proyek <br><span class="font-semibold text-slate-700">{{ $project->name ?? '' }}</span></p>
            </div>

            @if(session('error'))
                <div class="bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl mb-6 text-sm flex items-center">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl mb-6 text-sm flex items-center">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.submit', ['id' => $id]) }}" method="post" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2" for="password">Password Proyek</label>
                    <input class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" type="password" name="password" id="password" placeholder="Masukkan password..." required>
                </div>
                
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition-colors shadow-sm flex justify-center items-center" type="submit">
                    Login ke Proyek
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="text-sm text-slate-500 hover:text-blue-600 transition-colors">
                    Kembali ke daftar proyek
                </a>
            </div>
        </div>
    </div>

</body>

</html>