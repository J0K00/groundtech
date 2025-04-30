@extends('layouts.app')

@section('title', 'Inscription Ingénieur - GroundTech')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-600">Inscription Ingénieur</h1>
            <p class="text-gray-600 mt-2">Créez votre compte professionnel</p>
        </div>

        <form method="POST" action="{{ route('engineer.register') }}" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email professionnel</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="specialization" class="block text-sm font-medium text-gray-700">Spécialisation</label>
                <select id="specialization" name="specialization" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Sélectionnez votre spécialisation</option>
                    <option value="geotechnical">Géotechnique</option>
                    <option value="structural">Structure</option>
                    <option value="environmental">Environnement</option>
                    <option value="hydraulic">Hydraulique</option>
                </select>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    S'inscrire
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Déjà inscrit ?
                <a href="/engineer/login" class="font-medium text-blue-600 hover:text-blue-500">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
@endsection 