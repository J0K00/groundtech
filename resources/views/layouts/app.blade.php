<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GroundTech')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-50 min-h-screen">
    <!-- Navbar -->
    <x-navbar />

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white mt-auto">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <p>&copy; {{ date('Y') }} GroundTech. Tous droits réservés.</p>
                <div class="space-x-4">
                    <a href="#" class="hover:text-blue-200">Mentions légales</a>
                    <a href="#" class="hover:text-blue-200">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html> 