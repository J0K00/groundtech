@extends('layouts.app')

@section('title', 'Nouveau Rapport Géotechnique - GroundTech')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Nouveau Rapport Géotechnique</h1>

        <form action="{{ route('engineer.reports.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Titre -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre du rapport</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <!-- Nom du projet -->
                <div>
                    <label for="project_name" class="block text-sm font-medium text-gray-700">Nom du projet</label>
                    <input type="text" name="project_name" id="project_name" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <!-- Localisation -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Localisation</label>
                    <input type="text" name="location" id="location" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <!-- Dates -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
                    <input type="date" name="start_date" id="start_date" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
                    <input type="date" name="end_date" id="end_date"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <!-- Données du sol -->
            <div>
                <label for="soil_data" class="block text-sm font-medium text-gray-700">Données du sol</label>
                <div id="soil-data-container" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Type de sol</label>
                            <input type="text" name="soil_data[type]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Profondeur (m)</label>
                            <input type="number" step="0.01" name="soil_data[depth]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Humidité (%)</label>
                            <input type="number" step="0.01" name="soil_data[humidity]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recommandations -->
            <div>
                <label for="recommendations" class="block text-sm font-medium text-gray-700">Recommandations</label>
                <div id="recommendations-container" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Type de fondation recommandé</label>
                            <input type="text" name="recommendations[foundation_type]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Profondeur minimale (m)</label>
                            <input type="number" step="0.01" name="recommendations[min_depth]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conclusion -->
            <div>
                <label for="conclusion" class="block text-sm font-medium text-gray-700">Conclusion</label>
                <textarea name="conclusion" id="conclusion" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <!-- Boutons -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('engineer.reports.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
                    Annuler
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    Créer le rapport
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 