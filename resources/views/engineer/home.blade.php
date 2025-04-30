@extends('layouts.app')

@section('title', 'Accueil Ingénieur - GroundTech')

@section('content')
    <div class="space-y-6">
        <!-- En-tête -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-3xl font-bold text-blue-600">Bienvenue, {{ Auth::guard('engineer')->user()->name }}</h1>
            <p class="text-gray-600 mt-2">Gérez vos projets et vos études géotechniques</p>
        </div>

        <!-- Projets en cours -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Projets en cours</h2>
            <div class="space-y-4">
                @forelse($reports->take(5) as $report)
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-blue-50 transition duration-300">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-medium text-blue-600">{{ $report->project_name }}</h3>
                                <p class="text-gray-600">{{ $report->title }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-medium
                                @if($report->status === 'draft') bg-yellow-100 text-yellow-800
                                @elseif($report->status === 'submitted') bg-blue-100 text-blue-800
                                @elseif($report->status === 'approved') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($report->status) }}
                            </span>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <div class="text-sm text-gray-500">
                                <span>Début: {{ $report->start_date ? $report->start_date->format('d/m/Y') : 'Non spécifiée' }}</span>
                                <span class="mx-2">•</span>
                                <span>Échéance: {{ $report->end_date ? $report->end_date->format('d/m/Y') : 'Non spécifiée' }}</span>
                            </div>
                            <a href="{{ route('engineer.reports.show', $report) }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Voir les détails</a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-gray-500">Aucun projet en cours</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Actions rapides -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Actions rapides</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('engineer.reports.create') }}" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-300">
                    <div class="p-2 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <span class="ml-3 text-gray-700">Nouveau rapport</span>
                </a>
                <a href="{{ route('engineer.reports.index') }}" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-300">
                    <div class="p-2 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <span class="ml-3 text-gray-700">Mes rapports</span>
                </a>
                <a href="{{ route('engineer.reports.index') }}" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-300">
                    <div class="p-2 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="ml-3 text-gray-700">Calendrier</span>
                </a>
                <a href="#" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-300">
                    <div class="p-2 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="ml-3 text-gray-700">Paramètres</span>
                </a>
            </div>
        </div>
    </div>
@endsection 