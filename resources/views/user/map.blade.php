@extends('layouts.app')

@section('title', 'Carte des Projets - GroundTech')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Carte des Projets</h1>
            <div class="flex space-x-4">
                <button id="zoomIn" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
                <button id="zoomOut" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="map" class="h-[600px] w-full rounded-lg"></div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($reports as $report)
                <div class="border border-gray-200 rounded-lg p-4 hover:bg-blue-50 transition duration-300">
                    <h3 class="text-lg font-medium text-blue-600">{{ $report->project_name }}</h3>
                    <p class="text-gray-600">{{ $report->title }}</p>
                    <p class="text-sm text-gray-500 mt-2">
                        <span class="font-medium">Localisation:</span> {{ $report->location }}
                    </p>
                    <p class="text-sm text-gray-500">
                        <span class="font-medium">Ingénieur:</span> {{ $report->engineer->name }}
                    </p>
                    <button onclick="centerMap({{ $report->latitude }}, {{ $report->longitude }})" 
                            class="mt-2 text-blue-600 hover:text-blue-700 text-sm font-medium">
                        Voir sur la carte
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    #map {
        z-index: 1;
        min-height: 600px;
    }
    .leaflet-control-zoom {
        border: none !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24) !important;
    }
    .leaflet-control-zoom a {
        background-color: white !important;
        color: #3B82F6 !important;
        border: none !important;
    }
    .leaflet-control-zoom a:hover {
        background-color: #F3F4F6 !important;
    }
    .leaflet-container {
        width: 100%;
        height: 100%;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisation de la carte
        const map = L.map('map').setView([36.8065, 10.1815], 13); // Coordonnées par défaut (Tunis)

        // Ajout de la couche OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajout des marqueurs pour chaque rapport
        @foreach($reports as $report)
            @if($report->latitude && $report->longitude)
                const marker{{ $report->id }} = L.marker([{{ $report->latitude }}, {{ $report->longitude }}])
                    .addTo(map)
                    .bindPopup(`
                        <div class="p-2">
                            <h3 class="font-bold text-blue-600">{{ $report->project_name }}</h3>
                            <p class="text-gray-600">{{ $report->title }}</p>
                            <p class="text-sm text-gray-500">
                                <span class="font-medium">Ingénieur:</span> {{ $report->engineer->name }}
                            </p>
                            <p class="text-sm text-gray-500">
                                <span class="font-medium">Statut:</span> 
                                <span class="px-2 py-1 rounded-full text-xs
                                    @if($report->status === 'draft') bg-yellow-100 text-yellow-800
                                    @elseif($report->status === 'submitted') bg-blue-100 text-blue-800
                                    @elseif($report->status === 'approved') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($report->status) }}
                                </span>
                            </p>
                            <a href="{{ route('user.reports.show', $report) }}" 
                               class="mt-2 inline-block text-blue-600 hover:text-blue-700 text-sm font-medium">
                                Voir les détails
                            </a>
                        </div>
                    `);
            @endif
        @endforeach

        // Fonction pour centrer la carte sur un point
        window.centerMap = function(lat, lng) {
            map.setView([lat, lng], 15);
        }

        // Contrôles de zoom
        document.getElementById('zoomIn').addEventListener('click', () => {
            map.zoomIn();
        });

        document.getElementById('zoomOut').addEventListener('click', () => {
            map.zoomOut();
        });
    });
</script>
@endpush
@endsection 