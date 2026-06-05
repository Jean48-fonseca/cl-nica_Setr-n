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

<body class="bg-[#0a0c10] text-white min-h-screen flex items-center justify-center relative overflow-hidden font-sans antialiased selection:bg-[#5db7a1] selection:text-white">

    <!-- Elementos de fondo decorativos -->
    <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-[#22705f] rounded-full mix-blend-screen filter blur-[120px] opacity-30 animate-pulse"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-[600px] h-[600px] bg-[#5db7a1] rounded-full mix-blend-screen filter blur-[150px] opacity-20"></div>

    <!-- Contenedor Principal (Efecto Glassmorphism) -->
    <div class="relative z-10 flex flex-col md:flex-row w-full max-w-[900px] mx-4 bg-[#12141a]/80 backdrop-blur-xl rounded-3xl overflow-hidden shadow-[0_20px_60px_-15px_rgba(0,0,0,0.7)] border border-white/10">

        <!-- Lado de la Imagen y Branding -->
        <div class="hidden md:flex flex-col justify-between w-1/2 p-10 relative overflow-hidden bg-gradient-to-br from-[#0f1115] to-[#1a1d24] border-r border-white/5">
            <!-- Capa superpuesta para oscurecer ligeramente la imagen -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0c10] via-transparent to-transparent z-10"></div>
            
            <!-- Tu imagen de la clínica -->
            <img src="{{ asset('image/foto.png') }}" alt="Ilustración Setrán" class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-luminosity hover:mix-blend-normal hover:opacity-60 transition-all duration-700">

            <div class="relative z-20">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-[#22705f] to-[#5db7a1] flex items-center justify-center shadow-lg">
                        <span class="font-bold text-white text-lg">+</span>
                    </div>
                    <span class="text-xl font-bold tracking-widest text-white/90">SENTRA +</span>
                </div>
            </div>

            <div class="relative z-20 mt-auto">
                <h3 class="text-3xl font-bold text-white mb-3 leading-tight">Transformando la <br><span class="text-[#5db7a1]">gestión médica.</span></h3>
                <p class="text-gray-400 text-sm leading-relaxed">Accede a tu panel de control para administrar pacientes, citas y tratamientos de forma intuitiva y segura.</p>
            </div>
        </div>

        <!-- Lado del Formulario -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-[#12141a]">

            <div class="text-center md:text-left mb-8">
                <h2 class="text-3xl font-extrabold text-white mb-2 tracking-wide">Bienvenido de vuelta</h2>
                <p class="text-gray-400 text-sm">Ingresa tus credenciales para continuar a <span class="text-[#5db7a1] font-semibold">Setrán +</span></p>
            </div>

            <form action="#" method="POST" class="flex flex-col gap-5">
                @csrf

                <!-- Input Usuario -->
                <div class="relative group">
                    <label class="block text-gray-400 text-xs font-bold mb-1.5 uppercase tracking-wider">Usuario / Correo</label>
                    <input type="text" name="email" required placeholder="tu@correo.com" class="w-full bg-[#0a0c10] text-white border border-white/10 rounded-lg px-4 py-3 outline-none focus:border-[#5db7a1] focus:ring-1 focus:ring-[#5db7a1] transition-all placeholder-gray-600">
                </div>

                <!-- Input Contraseña -->
                <div class="relative group">
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="block text-gray-400 text-xs font-bold uppercase tracking-wider">Contraseña</label>
                        <a href="#" class="text-xs text-[#5db7a1] hover:text-white transition-colors">¿Olvidaste tu contraseña?</a>
                    </div>
                    <input type="password" name="password" required placeholder="••••••••" class="w-full bg-[#0a0c10] text-white border border-white/10 rounded-lg px-4 py-3 outline-none focus:border-[#5db7a1] focus:ring-1 focus:ring-[#5db7a1] transition-all placeholder-gray-600">
                </div>

                <!-- Botón Principal -->
                <button type="submit" class="mt-2 w-full bg-gradient-to-r from-[#22705f] to-[#5db7a1] text-white font-bold py-3 rounded-lg hover:shadow-[0_0_20px_rgba(93,183,161,0.4)] hover:scale-[1.02] transition-all duration-300">
                    Iniciar sesión
                </button>
                
                <!-- Separador -->
                <div class="flex items-center my-3">
                    <div class="flex-grow border-t border-white/10"></div>
                    <span class="mx-4 text-gray-500 text-xs font-bold uppercase tracking-widest">O entrar con</span>
                    <div class="flex-grow border-t border-white/10"></div>
                </div>

                <!-- Botones de Redes Sociales -->
                <div class="flex gap-4">
                    <!-- Botón Google -->
                    <a href="{{ route('social.redirect', 'google') }}" class="flex-1 bg-[#0a0c10] border border-white/10 text-white font-semibold py-2.5 rounded-lg flex items-center justify-center gap-2 hover:bg-white hover:text-black hover:border-white transition-all duration-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-5 h-5 group-hover:scale-110 transition-transform">
                            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/>
                            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/>
                            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                        </svg>
                        Google
                    </a>

                    <!-- Botón GitHub -->
                    <a href="{{ route('social.redirect', 'github') }}" class="flex-1 bg-[#0a0c10] border border-white/10 text-white font-semibold py-2.5 rounded-lg flex items-center justify-center gap-2 hover:bg-white hover:text-black hover:border-white transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform text-white group-hover:text-black" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                        GitHub
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>