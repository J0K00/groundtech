<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\GeotechnicalReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GeotechnicalReportController extends Controller
{
    public function create()
    {
        return view('engineer.reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'soil_data' => 'nullable|array',
            'recommendations' => 'nullable|array',
            'conclusion' => 'nullable|string',
        ]);

        $validated['engineer_id'] = Auth::guard('engineer')->id();
        $validated['status'] = 'draft';

        GeotechnicalReport::create($validated);

        return redirect()->route('engineer.reports.index')
            ->with('success', 'Rapport géotechnique créé avec succès.');
    }

    public function index()
    {
        $reports = GeotechnicalReport::where('engineer_id', Auth::guard('engineer')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('engineer.reports.index', compact('reports'));
    }

    public function show(GeotechnicalReport $report)
    {
        if (!Gate::allows('view', $report)) {
            abort(403);
        }
        return view('engineer.reports.show', compact('report'));
    }

    public function edit(GeotechnicalReport $report)
    {
        if (!Gate::allows('update', $report)) {
            abort(403);
        }
        return view('engineer.reports.edit', compact('report'));
    }

    public function update(Request $request, GeotechnicalReport $report)
    {
        if (!Gate::allows('update', $report)) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'soil_data' => 'nullable|array',
            'recommendations' => 'nullable|array',
            'conclusion' => 'nullable|string',
        ]);

        $report->update($validated);

        return redirect()->route('engineer.reports.show', $report)
            ->with('success', 'Rapport géotechnique mis à jour avec succès.');
    }

    public function submit(GeotechnicalReport $report)
    {
        if (!Gate::allows('update', $report)) {
            abort(403);
        }
        
        $report->update(['status' => 'submitted']);

        return redirect()->route('engineer.reports.show', $report)
            ->with('success', 'Rapport géotechnique soumis avec succès.');
    }
}
