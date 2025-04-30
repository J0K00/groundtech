@extends('layouts.app')

@section('title', 'Détails du Rapport - GroundTech')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $report->title }}</h1>
            <span class="px-3 py-1 rounded-full text-sm font-medium
                @if($report->status === 'draft') bg-yellow-100 text-yellow-800
                @elseif($report->status === 'submitted') bg-blue-100 text-blue-800
                @elseif($report->status === 'approved') bg-green-100 text-green-800
                @else bg-red-100 text-red-800 @endif">
                {{ ucfirst($report->status) }}
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h3 class="text-sm font-medium text-gray-500">Nom du projet</h3>
                <p class="mt-1 text-gray-900">{{ $report->project_name }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Localisation</h3>
                <p class="mt-1 text-gray-900">{{ $report->location }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Date de début</h3>
                <p class="mt-1 text-gray-900">{{ $report->start_date ? $report->start_date->format('d/m/Y') : 'Non spécifiée' }}</p>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Date de fin</h3>
                <p class="mt-1 text-gray-900">{{ $report->end_date ? $report->end_date->format('d/m/Y') : 'Non spécifiée' }}</p>
            </div>
        </div>

        @if($report->description)
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-500">Description</h3>
                <p class="mt-1 text-gray-900">{{ $report->description }}</p>
            </div>
        @endif

        @if($report->soil_data)
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Données du sol</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @if(isset($report->soil_data['type']))
                        <div>
                            <h4 class="text-xs font-medium text-gray-500">Type de sol</h4>
                            <p class="mt-1 text-gray-900">{{ $report->soil_data['type'] }}</p>
                        </div>
                    @endif
                    @if(isset($report->soil_data['depth']))
                        <div>
                            <h4 class="text-xs font-medium text-gray-500">Profondeur</h4>
                            <p class="mt-1 text-gray-900">{{ $report->soil_data['depth'] }} m</p>
                        </div>
                    @endif
                    @if(isset($report->soil_data['humidity']))
                        <div>
                            <h4 class="text-xs font-medium text-gray-500">Humidité</h4>
                            <p class="mt-1 text-gray-900">{{ $report->soil_data['humidity'] }}%</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        @if($report->recommendations)
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Recommandations</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if(isset($report->recommendations['foundation_type']))
                        <div>
                            <h4 class="text-xs font-medium text-gray-500">Type de fondation recommandé</h4>
                            <p class="mt-1 text-gray-900">{{ $report->recommendations['foundation_type'] }}</p>
                        </div>
                    @endif
                    @if(isset($report->recommendations['min_depth']))
                        <div>
                            <h4 class="text-xs font-medium text-gray-500">Profondeur minimale</h4>
                            <p class="mt-1 text-gray-900">{{ $report->recommendations['min_depth'] }} m</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        @if($report->conclusion)
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-500">Conclusion</h3>
                <p class="mt-1 text-gray-900">{{ $report->conclusion }}</p>
            </div>
        @endif

        <div class="flex justify-end space-x-4">
            <a href="{{ route('engineer.reports.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
                Retour
            </a>
            @if($report->status === 'draft')
                <a href="{{ route('engineer.reports.edit', $report) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    Modifier
                </a>
                <form action="{{ route('engineer.reports.submit', $report) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                        Soumettre
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection 