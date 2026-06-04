<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SANAR + | Inicio de Sesión</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#0f1115] text-white h-screen flex flex-col relative overflow-hidden font-sans antialiased">

    <div class="absolute top-8 left-8 text-2xl font-semibold z-20 tracking-wide">
        Inicio de sesión:
    </div>

    <div class="absolute top-[15%] left-[-5%] w-[110%] h-[70vh] bg-[#22705f] transform -rotate-3 rounded-[80px] z-0 opacity-90 shadow-2xl"></div>

    <div class="relative z-10 flex flex-1 items-center justify-center">

        <div class="flex w-full max-w-[750px] bg-[#121212] rounded-2xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-[#2a2a2a]">

            <div class="w-1/2 bg-[#0f1115] p-8 flex flex-col items-center justify-center border-r border-[#222]">
            <img src="{{ asset('image/foto.png') }}" alt="Ilustración Setrán" class="max-w-full h-auto opacity-80 rounded-lg">
              
            </div>

            <div class="w-1/2 bg-[#22705f] p-10 flex flex-col justify-center relative">

                <h2 class="text-3xl font-extrabold text-[#0f1115] text-center mb-8 tracking-wider">Setrán +</h2>

                <form action="#" method="POST" class="flex flex-col gap-5">
                    @csrf

                    <div>
                        <label class="block text-[#0f1115] text-sm font-bold mb-1">Usuario</label>
                        <input type="text" name="email" required class="w-full bg-[#121212] text-white border-none rounded-md px-3 py-2.5 outline-none focus:ring-2 focus:ring-black transition-all">
                    </div>

                    <div>
                        <label class="block text-[#0f1115] text-sm font-bold mb-1">Contraseña</label>
                        <input type="password" name="password" required class="w-full bg-[#121212] text-white border-none rounded-md px-3 py-2.5 outline-none focus:ring-2 focus:ring-black transition-all">
                    </div>

                    <button type="submit" class="mt-2 w-full bg-[#121212] text-[#22705f] font-bold py-2.5 rounded-md hover:bg-black hover:text-white transition-colors">
                        Iniciar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>