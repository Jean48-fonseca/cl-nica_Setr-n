<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SANAR + | Citas</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#f4f6f9] font-sans antialiased min-h-screen p-8">
<div class="max-w-7xl mx-auto">

    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-[#5db7a1] mb-6 transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Volver al Panel
    </a>

    <h1 class="text-3xl font-extrabold text-[#2c3e50] mb-6 tracking-wide">Tabla de Citas</h1>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-6 py-3 mb-4 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('citas.create') }}">
        <button class="bg-[#1a73e8] hover:bg-[#1557b0] text-white font-semibold py-2 px-5 rounded-md shadow-sm mb-6 transition-colors text-sm">
            Agregar Cita
        </button>
    </a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-[#1a73e8] text-sm font-bold bg-white border-b border-gray-100">
                        <th class="py-4 px-6">ID</th>
                        <th class="py-4 px-6">Paciente</th>
                        <th class="py-4 px-6">Médico</th>
                        <th class="py-4 px-6">Fecha y Hora</th>
                        <th class="py-4 px-6">Motivo</th>
                        <th class="py-4 px-6">Estado</th>
                        <th class="py-4 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700 font-medium">
                    @forelse($citas as $cita)
                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                        <td class="py-4 px-6">{{ $cita->id }}</td>
                        <td class="py-4 px-6">{{ $cita->patient->name ?? $cita->patient_id }} {{ $cita->patient->surname ?? '' }}</td>
                        <td class="py-4 px-6">{{ $cita->doctor->name ?? $cita->doctor_id }} {{ $cita->doctor->surname ?? '' }}</td>
                        <td class="py-4 px-6">{{ $cita->appointment_date }}</td>
                        <td class="py-4 px-6">{{ $cita->motivo }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-1 rounded-full text-xs font-bold
                                {{ $cita->status === 'scheduled' ? 'bg-blue-100 text-blue-700' : '' }}
                                {{ $cita->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $cita->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}">
                                {{ ucfirst($cita->status) }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            <a href="{{ route('citas.edit', $cita->id) }}">
                                <button class="bg-[#ffc107] hover:bg-[#e0a800] text-white font-bold py-1.5 px-3 rounded text-xs mr-1 transition-colors">Editar</button>
                            </a>
                            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('¿Eliminar esta cita?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-[#dc3545] hover:bg-[#c82333] text-white font-bold py-1.5 px-3 rounded text-xs transition-colors">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-8 text-center text-gray-500">No hay citas registradas aún.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>