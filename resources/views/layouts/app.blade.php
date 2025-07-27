<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Livewire App' }}</title>
    @livewireStyles

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-7xl bg-white p-8 rounded-xl shadow-lg">
        <!-- Título -->
        <h1 class="text-3xl md:text-4xl font-extrabold text-center text-indigo-600 mb-6">
            {{ $heading ?? "First steps with a Livewire app, let's see what's the big deal" }}
        </h1>

        <div class="p-4 w-full">
            <!-- Contenido dinámico -->
            @yield('content')
        </div>
    </div>

    @livewireScripts
</body>
</html>
