<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SANAR + | Sistema de Gestión</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-white h-screen relative overflow-hidden font-sans antialiased">

    <div class="absolute top-[15%] left-[-5%] w-[120%] h-[75%] bg-[#5db7a1] rounded-[100px] transform -rotate-3 z-0 shadow-xl"></div>

    <main class="relative z-10 h-full flex flex-col items-center justify-center w-full px-4">
        
        <h2 class="text-xl md:text-2xl font-medium text-white/90 mb-1 drop-shadow-sm text-center tracking-wide">
            ¡Bienvenido, <span class="font-extrabold text-white">{{ auth()->user()->name }}</span>!
        </h2>

        <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-12 uppercase tracking-wide drop-shadow-md text-center">
            Sistema de Gestión SENTRA +
        </h1>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 w-full max-w-6xl">
            
            <a href="{{ route('pacientes.index') }}" class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                <div class="text-[#5db7a1] mb-3 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <span class="text-sm font-bold text-gray-800 tracking-wide">Pacientes</span>
            </a>

            <a href="{{ route('medicos.index') }}" class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                <div class="text-[#5db7a1] mb-3 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 12v.01M12 15v.01" />
                    </svg>
                </div>
                <span class="text-sm font-bold text-gray-800 tracking-wide">Médicos</span>
            </a>

            <a href="{{ route('citas.index') }}"class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                <div class="text-[#5db7a1] mb-3 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-sm font-bold text-gray-800 tracking-wide">Citas</span>
            </a>

            <a href="{{ route('diagnosticos.index') }}" class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                <div class="text-[#5db7a1] mb-3 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <span class="text-sm font-bold text-gray-800 tracking-wide">Diagnósticos</span>
            </a>

            <a href="{{ route('tratamientos.index') }}" class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                <div class="text-[#5db7a1] mb-3 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3L22 4" />
                    </svg>
                </div>
                <span class="text-sm font-bold text-gray-800 tracking-wide">Tratamientos</span>
            </a>

            <a href="{{ route('medicamentos.index') }}" class="bg-white rounded-2xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                <div class="text-[#5db7a1] mb-3 group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <span class="text-sm font-bold text-gray-800 tracking-wide">Medicamentos</span>
            </a>

        </div>
    </main>

    <div class="absolute bottom-[10%] right-[10%] z-20">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-[#ff4d4d] hover:bg-red-600 text-white text-sm font-bold py-2.5 px-6 rounded-md shadow-lg transition-colors tracking-wide">
                Cerrar sesión
            </button>
        </form>
    </div>

</body>
</html>