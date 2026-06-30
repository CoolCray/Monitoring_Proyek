<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>{{ $project->name }} - Detail Proyek</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-blue-500 selection:text-white">
    @include('layout.header')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb / Back Button -->
        <div class="mb-6">
            <a href="{{ url('/') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Daftar Proyek
            </a>
        </div>

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                    {{ $project->name }}
                </h1>
                <p class="text-slate-500 mt-2 flex items-center">
                    <svg class="w-5 h-5 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ $project->location ?? 'Lokasi tidak diketahui' }}
                </p>
            </div>
            <div>
                @php
                $statusColors = [
                'done' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                'progress' => 'bg-blue-100 text-blue-800 border-blue-200',
                'hold' => 'bg-amber-100 text-amber-800 border-amber-200',
                'cancelled' => 'bg-rose-100 text-rose-800 border-rose-200',
                ];
                $statusLabels = [
                'done' => 'Selesai',
                'progress' => 'Dalam Proses',
                'hold' => 'Tertunda',
                'cancelled' => 'Dibatalkan',
                ];
                $statusColor = $statusColors[$project->status] ?? 'bg-slate-100 text-slate-800 border-slate-200';
                $statusLabel = $statusLabels[$project->status] ?? ucfirst($project->status);
                @endphp
                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-sm font-medium border {{ $statusColor }} shadow-sm">
                    {{ $statusLabel }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 space-y-8">
                <!-- Info Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="p-6">
                        <h2 class="text-lg font-bold text-slate-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Proyek
                        </h2>
                        <div class="space-y-5">
                            <div>
                                <p class="text-sm font-medium text-slate-500">Pemilik Proyek (Owner)</p>
                                <p class="mt-1 text-slate-900 font-semibold">{{ $project->owner ?? '-' }}</p>
                            </div>
                            <div class="h-px bg-slate-100"></div>
                            <div>
                                <p class="text-sm font-medium text-slate-500">Arsitek</p>
                                <p class="mt-1 text-slate-900 font-semibold">{{ $project->architect ?? '-' }}</p>
                            </div>
                            <div class="h-px bg-slate-100"></div>
                            <div>
                                <p class="text-sm font-medium text-slate-500">Site Manager</p>
                                <p class="mt-1 text-slate-900 font-semibold">{{ $project->sm ?? '-' }}</p>
                            </div>
                            <div class="h-px bg-slate-100"></div>
                            <div>
                                <p class="text-sm font-medium text-slate-500">Supervisor</p>
                                <p class="mt-1 text-slate-900 font-semibold">{{ $project->supervisor ?? '-' }}</p>
                            </div>
                            <div class="h-px bg-slate-100"></div>
                            <div>
                                <p class="text-sm font-medium text-slate-500">Drafter</p>
                                <p class="mt-1 text-slate-900 font-semibold">{{ $project->drafter ?? '-' }}</p>
                            </div>
                            <div class="h-px bg-slate-100"></div>
                            @if($project->progress_project)
                            <div>
                                <p class="text-sm font-medium text-slate-500">Progress Proyek</p>
                                <a href="{{ $project->progress_project }}" target="_blank" class="mt-2 inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Buka Link Progress
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Documentation Card -->
                @if($project->documentation)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="p-6">
                        <h2 class="text-lg font-bold text-slate-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Dokumentasi
                        </h2>
                        <p class="text-sm text-slate-600 mb-4">Dokumentasi tersimpan dalam Google Drive.</p>
                        <a href="{{ $project->documentation }}" target="_blank" class="w-full flex justify-center items-center px-4 py-2.5 bg-blue-50 text-blue-700 text-sm font-semibold rounded-xl hover:bg-blue-100 transition-colors border border-blue-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Buka Link Google Drive
                        </a>
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column: Map Preview & Extended Info -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Map Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <h2 class="text-lg font-bold text-slate-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            Peta Lokasi
                        </h2>
                        <span class="text-xs font-mono text-slate-600 bg-white border border-slate-200 px-3 py-1.5 rounded-full shadow-sm">
                            Lat: {{ $project->latitude ?? '-' }}, Lng: {{ $project->longitude ?? '-' }}
                        </span>
                    </div>
                    <div class="p-3">
                        @if($project->latitude && $project->longitude)
                        @php
                        $lat = str_replace(',', '.', $project->latitude);
                        $lng = str_replace(',', '.', $project->longitude);
                        @endphp
                        <iframe
                            class="h-[450px] w-full rounded-xl z-0 border border-slate-200 shadow-inner"
                            frameborder="0"
                            scrolling="no"
                            marginheight="0"
                            marginwidth="0"
                            src="https://maps.google.com/maps?q={{ $lat }},{{ $lng }}&hl=id&z=15&output=embed">
                        </iframe>
                        @else
                        <div class="h-[450px] w-full rounded-xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-400">
                            <svg class="w-16 h-16 mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <p class="text-lg font-medium text-slate-500">Koordinat lokasi belum diatur</p>
                            <p class="text-sm mt-1">Tambahkan latitude dan longitude pada data proyek.</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Weather Card -->
                @if($project->latitude && $project->longitude)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <h2 class="text-lg font-bold text-slate-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                            </svg>
                            Cuaca Saat Ini
                        </h2>
                    </div>
                    <div class="p-6">
                        <div id="weather-loading" class="text-slate-500 text-sm flex items-center justify-center py-4">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memuat data cuaca...
                        </div>
                        <div id="weather-container" class="hidden grid grid-cols-2 sm:grid-cols-5 gap-4">
                            <div class="col-span-2 sm:col-span-2 flex items-center space-x-4">
                                <div id="weather-icon" class="text-5xl">☀️</div>
                                <div>
                                    <div id="weather-temp" class="text-3xl font-extrabold text-slate-900">--°C</div>
                                    <div id="weather-desc" class="text-slate-500 font-medium">--</div>
                                </div>
                            </div>
                            <div class="col-span-1 bg-slate-50 p-3 rounded-xl border border-slate-100 flex flex-col justify-center">
                                <span class="text-xs text-slate-500 font-medium mb-1">Terasa Seperti</span>
                                <span id="weather-feels-like" class="text-lg font-bold text-slate-800">--°C</span>
                            </div>
                            <div class="col-span-1 bg-slate-50 p-3 rounded-xl border border-slate-100 flex flex-col justify-center">
                                <span class="text-xs text-slate-500 font-medium mb-1">Kelembapan</span>
                                <span id="weather-humidity" class="text-lg font-bold text-slate-800">--%</span>
                            </div>
                            <div class="col-span-1 bg-slate-50 p-3 rounded-xl border border-slate-100 flex flex-col justify-center">
                                <span class="text-xs text-slate-500 font-medium mb-1">Kec. Angin</span>
                                <span id="weather-wind" class="text-lg font-bold text-slate-800">--</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($project->youtube)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="p-6">
                        <h2 class="text-lg font-bold text-slate-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            YouTube
                        </h2>
                        <p class="text-sm text-slate-600 mb-4">Video YouTube</p>
                        <iframe class="w-full h-100" src="{{ $project->youtube_embed_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </main>

    <div id="weather-data-mount" data-lat="{{ $project->latitude ?? '' }}" data-lng="{{ $project->longitude ?? '' }}" class="hidden"></div>



    <script>
        (function() {
            const mountNode = document.getElementById('weather-data-mount');
            const latStr = mountNode.getAttribute('data-lat');
            const lngStr = mountNode.getAttribute('data-lng');

            if (latStr && lngStr) {
                function parseCoordinate(coordStr) {
                    if (!coordStr) return {
                        val: NaN,
                        dir: null
                    };
                    let str = String(coordStr).trim().replace(',', '.');

                    // Format DMS: 8°30'23.2"S atau 115°15'3.60"E
                    const regex = /(\d+)[^\d]+(\d+)[^\d]+([\d.]+)[^\d]+([NSWE])/i;
                    const match = str.match(regex);
                    if (match) {
                        let degrees = parseFloat(match[1]);
                        let minutes = parseFloat(match[2]);
                        let seconds = parseFloat(match[3]);
                        let direction = match[4].toUpperCase();

                        let decimal = degrees + (minutes / 60) + (seconds / 3600);
                        if (direction === 'S' || direction === 'W') {
                            decimal = decimal * -1;
                        }
                        return {
                            val: decimal,
                            dir: direction
                        };
                    }

                    return {
                        val: parseFloat(str),
                        dir: null
                    };
                }

                let parsedLat = parseCoordinate(latStr);
                let parsedLng = parseCoordinate(lngStr);

                let cleanLat = parsedLat.val;
                let cleanLng = parsedLng.val;

                if (parsedLat.dir === 'E' || parsedLat.dir === 'W' || parsedLng.dir === 'N' || parsedLng.dir === 'S' || Math.abs(cleanLat) > 90) {
                    let temp = cleanLat;
                    cleanLat = cleanLng;
                    cleanLng = temp;
                }

                if (isNaN(cleanLat) || isNaN(cleanLng)) {
                    document.getElementById('weather-loading').innerHTML = '<span class="text-rose-500 font-medium">Format koordinat tidak valid atau gagal dibaca.</span>';
                    return;
                }

                const url = `https://api.open-meteo.com/v1/forecast?latitude=${cleanLat}&longitude=${cleanLng}&current=temperature_2m,relative_humidity_2m,apparent_temperature,is_day,precipitation,rain,weather_code,wind_speed_10m&timezone=auto`;

                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(errData => {
                                throw new Error(errData.reason || `HTTP error! status: ${response.status}`);
                            }).catch(() => {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.current) {
                            const temp = data.current.temperature_2m;
                            const apparentTemp = data.current.apparent_temperature;
                            const humidity = data.current.relative_humidity_2m;
                            const windSpeed = data.current.wind_speed_10m;
                            const weatherCode = data.current.weather_code;
                            const isDay = data.current.is_day;

                            let weatherDesc = "Cerah";
                            let weatherIcon = "☀️";

                            if (weatherCode === 0) {
                                weatherDesc = "Cerah";
                                weatherIcon = isDay ? "☀️" : "🌙";
                            } else if (weatherCode >= 1 && weatherCode <= 3) {
                                weatherDesc = "Berawan";
                                weatherIcon = "⛅";
                            } else if (weatherCode >= 45 && weatherCode <= 48) {
                                weatherDesc = "Berkabut";
                                weatherIcon = "🌫️";
                            } else if (weatherCode >= 51 && weatherCode <= 67) {
                                weatherDesc = "Hujan";
                                weatherIcon = "🌧️";
                            } else if (weatherCode >= 71 && weatherCode <= 77) {
                                weatherDesc = "Salju";
                                weatherIcon = "❄️";
                            } else if (weatherCode >= 80 && weatherCode <= 82) {
                                weatherDesc = "Hujan Lebat";
                                weatherIcon = "🌧️";
                            } else if (weatherCode >= 95 && weatherCode <= 99) {
                                weatherDesc = "Badai Petir";
                                weatherIcon = "⛈️";
                            }

                            document.getElementById('weather-temp').innerText = temp + '°C';
                            document.getElementById('weather-desc').innerText = weatherDesc;
                            document.getElementById('weather-icon').innerText = weatherIcon;
                            document.getElementById('weather-humidity').innerText = humidity + '%';
                            document.getElementById('weather-wind').innerText = windSpeed + ' km/h';
                            document.getElementById('weather-feels-like').innerText = apparentTemp + '°C';

                            document.getElementById('weather-container').classList.remove('hidden');
                            document.getElementById('weather-loading').classList.add('hidden');
                        } else {
                            throw new Error('Data cuaca saat ini tidak tersedia di respons API.');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching weather:', error);
                        document.getElementById('weather-loading').innerHTML = '<span class="text-rose-500 font-medium flex items-center"><svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Gagal memuat data cuaca: ' + error.message + '</span>';
                    });
            }
        })();
    </script>
</body>

</html>