@extends('layouts.app')

@section('title', 'Choisir votre profil - GroundTech')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-600">Rejoignez GroundTech</h1>
            <p class="text-gray-600 mt-2">Choisissez votre type de compte pour commencer</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Client Button -->
            <div class="flex flex-col items-center">
                <a href="{{ route('user.register') }}" 
                   class="w-full p-6 bg-white border-2 border-blue-500 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center group">
                    <div class="text-5xl mb-4">👤</div>
                    <h2 class="text-xl font-bold text-blue-600 mb-2">Client</h2>
                    <p class="text-gray-600">Accédez à nos services et suivez vos projets géotechniques</p>
                    <div class="mt-4 bg-blue-600 text-white py-2 px-4 rounded group-hover:bg-blue-700 transition duration-300">
                        S'inscrire comme client
                    </div>
                </a>
            </div>

            <!-- Engineer Button -->
            <div class="flex flex-col items-center">
                <a href="{{ route('engineer.register') }}" 
                   class="w-full p-6 bg-white border-2 border-blue-500 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center group">
                    <div class="text-5xl mb-4">👷</div>
                    <h2 class="text-xl font-bold text-blue-600 mb-2">Ingénieur</h2>
                    <p class="text-gray-600">Rejoignez notre équipe d'experts en géotechnique</p>
                    <div class="mt-4 bg-blue-600 text-white py-2 px-4 rounded group-hover:bg-blue-700 transition duration-300">
                        S'inscrire comme ingénieur
                    </div>
                </a>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
                Déjà inscrit ?
                <a href="/login" class="font-medium text-blue-600 hover:text-blue-500">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
@endsection
