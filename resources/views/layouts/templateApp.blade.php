<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo') - Prueba Técnica</title>
    <link rel="icon" href="{{ asset('logo.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="{{ asset('Tailwind/tailwind.js') }}"></script>
</head>

<body class="bg-gray-200 text-gray-800">
    <nav class="flex items-center justify-between p-5 bg-white shadow-md rounded-lg flex-wrap relative">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('logo.jpg') }}" alt="Logo" class="w-12 h-12">
            <div class="text-2xl font-bold text-gray-800 whitespace-nowrap">Prueba Técnica
            @if(auth()->check())
                <p class="text-sm text-gray-600 mt-1">Bienvenido <b>{{ auth()->user()->name }}</b></p>
            @endif
            </div>
        </div>

        <div class="flex items-center w-full justify-between mt-4 lg:mt-0 lg:w-auto">
            @if(auth()->check())
                <ul class="flex flex-wrap space-x-4">
                    <li>
                        <a href="{{ route('documentos') }}" class="font-semibold py-2 px-4 rounded-md hover:bg-gray-200 transition">Documentos</a>
                    </li>
                    <li>
                        <a href="{{ route('grafico.lineal') }}" class="font-semibold py-2 px-4 rounded-md hover:bg-gray-200 transition">Gráfico Lineal</a>
                    </li>
                    <li>
                        <a href="{{ route('grafico.circular') }}" class="font-semibold py-2 px-4 rounded-md hover:bg-gray-200 transition">Gráfico Circular</a>
                    </li>
                </ul>

                <a href="{{ route('login.destroy') }}" class="font-semibold py-2 px-4 rounded-md bg-red-500 hover:bg-red-600 text-white flex items-center transition absolute top-0 right-0 mt-3 mr-6 lg:relative lg:mt-0 lg:mr-0 lg:bg-red-500 lg:hover:bg-red-600 @if(request()->routeIs('login.destroy')) bg-red-600 @endif">
                    Cerrar
                </a>
            @else
                <ul class="flex flex-wrap space-x-4">
                    <li>
                        <a href="{{ route('login.index') }}" class="font-semibold py-3 px-4 rounded-md hover:bg-gray-300 transition">Iniciar sesión</a>
                    </li>
                    <li>
                        <a href="{{ route('registrar.index') }}" class="font-semibold border-2 border-gray-400 py-2 px-4 rounded-md hover:bg-gray-400 hover:text-white transition">Registrarse</a>
                    </li>
                </ul>
            @endif
        </div>
    </nav>

    <main class="container mx-auto mt-8 p-4 bg-white rounded-lg shadow-md">
        @yield('contenido')
    </main>

</body>
</html>
