<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SANAR + | Editar Diagnóstico</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#f4f6f9] font-sans antialiased min-h-screen p-8">
<div class="max-w-3xl mx-auto">

    <a href="{{ route('diagnosticos.index') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-[#5db7a1] mb-6 transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Volver a Diagnósticos
    </a>

    <h1 class="text-3xl font-extrabold text-[#2c3e50] mb-8 tracking-wide">Editar Diagnóstico</h1>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-6 py-4 mb-6 text-sm">
            <p class="font-bold mb-1">Por favor corrige los siguientes errores:</p>
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('diagnosticos.update', $diagnostico->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Cita</label>
                    <select name="date_id" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#5db7a1] transition bg-white" required>
                        @foreach($citas as $cita)
                            <option value="{{ $cita->id }}" {{ old('date_id', $diagnostico->date_id) == $cita->id ? 'selected' : '' }}>
                                Cita #{{ $cita->id }} — {{ $cita->patient->name ?? '' }} {{ $cita->patient->surname ?? '' }} ({{ $cita->appointment_date }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Enfermedad</label>
                    <input type="text" name="disease" value="{{ old('disease', $diagnostico->disease) }}"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#5db7a1] transition" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Descripción Clínica</label>
                    <textarea name="description_clinical" rows="4"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#5db7a1] transition resize-none" required>{{ old('description_clinical', $diagnostico->description_clinical) }}</textarea>
                </div>

            </div>
            <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                <a href="{{ route('diagnosticos.index') }}" class="px-5 py-2.5 text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">Cancelar</a>
                <button type="submit" class="px-6 py-2.5 text-sm font-semibold text-white bg-[#1a73e8] hover:bg-[#1557b0] rounded-lg shadow-sm transition-colors">Actualizar Diagnóstico</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>