<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reports = auth()->user()->reports()
            ->latest()
            ->get();

        return view('user.home', compact('reports'));
    }

    public function map()
    {
        $reports = auth()->user()->reports()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->with('engineer')
            ->latest()
            ->get();

        return view('user.map', compact('reports'));
    }
} 