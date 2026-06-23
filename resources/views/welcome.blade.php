<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layout.header')
    <div class="p-5 h-full">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 mb-6">Daftar Proyek</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            @foreach ($projects as $data )
            <a href="{{ route('login', ['id' => $data->id]) }}" class="block cursor-pointer my-2 bg-white shadow-sm border border-slate-100 rounded-2xl w-full text-left p-6 hover:bg-blue-50 hover:border-blue-200 transition-all duration-300">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-bold text-slate-900">{{ $data->name }}</h2>
                    <span class="px-3 py-1 rounded-full text-xs font-medium 
                        {{ $data->status == 'done' ? 'bg-emerald-100 text-emerald-800' : 
                           ($data->status == 'progress' ? 'bg-blue-100 text-blue-800' : 
                           ($data->status == 'hold' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-800')) }}">
                        {{ ucwords($data->status) }}
                    </span>
                </div>
                <p class="text-sm text-slate-500 flex items-center mt-3">
                    <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $data->location ?: 'Lokasi belum diset' }}
                </p>
            </a>
            @endforeach
        </div>
    </div>

</body>

</html>