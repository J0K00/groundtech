@extends('layouts.app')

@section('title', 'Accueil - GroundTech')

@section('content')
    <!-- Hero Section -->
    <section class="bg-blue-500 text-white rounded-lg shadow-lg p-8 mb-8">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Bienvenue sur GroundTech</h1>
            <p class="text-xl mb-6">Votre partenaire de confiance pour les études géotechniques</p>
            <a href="/register" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-100 transition duration-300">
                Commencer maintenant
            </a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-bold text-blue-700 mb-8 text-center">Nos Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="text-blue-600 text-4xl mb-4">🏗️</div>
                <h3 class="text-xl font-semibold mb-2">Études Géotechniques</h3>
                <p class="text-gray-600">Analyses approfondies des sols pour vos projets de construction.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="text-blue-600 text-4xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold mb-2">Expertise Technique</h3>
                <p class="text-gray-600">Solutions techniques adaptées à vos besoins spécifiques.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="text-blue-600 text-4xl mb-4">📊</div>
                <h3 class="text-xl font-semibold mb-2">Rapports Détaillés</h3>
                <p class="text-gray-600">Documentation complète et analyses précises.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-blue-100 rounded-lg p-8 text-center">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Prêt à commencer votre projet ?</h2>
        <p class="mb-6 text-gray-700">Contactez-nous dès aujourd'hui pour une consultation gratuite.</p>
        <a href="/contact" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
            Nous contacter
        </a>
    </section>
@endsection
