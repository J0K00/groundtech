<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reports = auth()->guard('engineer')->user()->reports()
            ->latest()
            ->get();

        return view('engineer.home', compact('reports'));
    }

    public function map()
    {
        $reports = auth()->guard('engineer')->user()->reports()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->latest()
            ->get();

        return view('engineer.map', compact('reports'));
    }
} 