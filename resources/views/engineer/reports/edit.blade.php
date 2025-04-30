@extends('layouts.app')

@section('title', 'Modifier le Rapport - GroundTech')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Modifier le rapport</h1>

        <form action="{{ route('engineer.reports.update', $report) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre du rapport</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $report->title) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="project_name" class="block text-sm font-medium text-gray-700">Nom du projet</label>
                    <input type="text" name="project_name" id="project_name" value="{{ old('project_name', $report->project_name) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('project_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Localisation</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $report->location) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
                    <input type="date" name="start_date" id="start_date" 
                        value="{{ old('start_date', $report->start_date ? $report->start_date->format('Y-m-d') : '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('start_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
                    <input type="date" name="end_date" id="end_date" 
                        value="{{ old('end_date', $report->end_date ? $report->end_date->format('Y-m-d') : '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('end_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $report->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Données du sol</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="soil_data[type]" class="block text-sm font-medium text-gray-700">Type de sol</label>
                        <input type="text" name="soil_data[type]" id="soil_data[type]" 
                            value="{{ old('soil_data.type', $report->soil_data['type'] ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="soil_data[depth]" class="block text-sm font-medium text-gray-700">Profondeur (m)</label>
                        <input type="number" step="0.01" name="soil_data[depth]" id="soil_data[depth]" 
                            value="{{ old('soil_data.depth', $report->soil_data['depth'] ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="soil_data[humidity]" class="block text-sm font-medium text-gray-700">Humidité (%)</label>
                        <input type="number" step="0.01" name="soil_data[humidity]" id="soil_data[humidity]" 
                            value="{{ old('soil_data.humidity', $report->soil_data['humidity'] ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Recommandations</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="recommendations[foundation_type]" class="block text-sm font-medium text-gray-700">Type de fondation recommandé</label>
                        <input type="text" name="recommendations[foundation_type]" id="recommendations[foundation_type]" 
                            value="{{ old('recommendations.foundation_type', $report->recommendations['foundation_type'] ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="recommendations[min_depth]" class="block text-sm font-medium text-gray-700">Profondeur minimale (m)</label>
                        <input type="number" step="0.01" name="recommendations[min_depth]" id="recommendations[min_depth]" 
                            value="{{ old('recommendations.min_depth', $report->recommendations['min_depth'] ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label for="conclusion" class="block text-sm font-medium text-gray-700">Conclusion</label>
                <textarea name="conclusion" id="conclusion" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('conclusion', $report->conclusion) }}</textarea>
                @error('conclusion')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('engineer.reports.show', $report) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
                    Annuler
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 