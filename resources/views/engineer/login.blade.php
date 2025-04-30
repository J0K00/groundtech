@extends('layouts.app')

@section('title', 'Connexion Ingénieur - GroundTech')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-600">Connexion Ingénieur</h1>
            <p class="text-gray-600 mt-2">Accédez à votre espace professionnel</p>
        </div>

        <form method="POST" action="{{ route('engineer.login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email professionnel</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Se souvenir de moi
                    </label>
                </div>

                <a href="#" class="text-sm text-blue-600 hover:text-blue-500">
                    Mot de passe oublié ?
                </a>
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Se connecter
                </button>
            </div>
        </form>

        <div class="mt-6 text-center space-y-4">
            <p class="text-sm text-gray-600">
                Pas encore de compte ?
                <a href="/engineer/register" class="font-medium text-blue-600 hover:text-blue-500">
                    S'inscrire
                </a>
            </p>
            <div class="border-t border-gray-200 pt-4">
                <p class="text-sm text-gray-600 mb-2">Vous êtes :</p>
                <div class="flex justify-center space-x-4">
                    <a href="/user/login" class="text-sm text-blue-600 hover:text-blue-500">Utilisateur</a>
                    <span class="text-gray-400">|</span>
                    <a href="/admin/login" class="text-sm text-blue-600 hover:text-blue-500">Administrateur</a>
                </div>
            </div>
        </div>
    </div>
@endsection 