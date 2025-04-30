@props(['userType' => null])

<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('index') }}" class="text-2xl font-bold text-blue-600">
                        GroundTech
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    @if(auth()->check())
                        @if(auth()->guard('engineer')->check())
                            <a href="{{ route('engineer.home') }}" class="border-transparent text-gray-500 hover:border-blue-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Accueil
                            </a>
                            <a href="{{ route('engineer.reports.index') }}" class="border-transparent text-gray-500 hover:border-blue-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Mes Rapports
                            </a>
                        @elseif(auth()->guard('admin')->check())
                            <a href="{{ route('admin.dashboard') }}" class="border-transparent text-gray-500 hover:border-blue-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Tableau de bord
                            </a>
                        @else
                            <a href="{{ route('user.home') }}" class="border-transparent text-gray-500 hover:border-blue-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Accueil
                            </a>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Right side of navbar -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @if(auth()->check())
                    <div class="ml-3 relative">
                        <div class="flex items-center">
                            <span class="text-gray-700 mr-4">
                                {{ auth()->user()->name }}
                            </span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Inscription
                        </a>
                    </div>
                @endif
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            @if(auth()->check())
                @if(auth()->guard('engineer')->check())
                    <a href="{{ route('engineer.home') }}" class="bg-blue-50 border-blue-500 text-blue-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        Accueil
                    </a>
                    <a href="{{ route('engineer.reports.index') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        Mes Rapports
                    </a>
                @elseif(auth()->guard('admin')->check())
                    <a href="{{ route('admin.dashboard') }}" class="bg-blue-50 border-blue-500 text-blue-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        Tableau de bord
                    </a>
                @else
                    <a href="{{ route('user.home') }}" class="bg-blue-50 border-blue-500 text-blue-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        Accueil
                    </a>
                @endif
            @endif
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            @if(auth()->check())
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <span class="text-gray-700">
                            {{ auth()->user()->name }}
                        </span>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                            Déconnexion
                        </button>
                    </form>
                </div>
            @else
                <div class="mt-3 space-y-1">
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Inscription
                    </a>
                </div>
            @endif
        </div>
    </div>
</nav>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('button[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
@endpush 