<?php

namespace App\Policies;

use App\Models\Engineer;
use App\Models\GeotechnicalReport;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeotechnicalReportPolicy
{
    use HandlesAuthorization;

    /**
     * Détermine si l'ingénieur peut voir le rapport.
     */
    public function view(Engineer $engineer, GeotechnicalReport $report)
    {
        return $engineer->id === $report->engineer_id;
    }

    /**
     * Détermine si l'ingénieur peut mettre à jour le rapport.
     */
    public function update(Engineer $engineer, GeotechnicalReport $report)
    {
        return $engineer->id === $report->engineer_id && $report->status === 'draft';
    }

    /**
     * Détermine si l'ingénieur peut supprimer le rapport.
     */
    public function delete(Engineer $engineer, GeotechnicalReport $report)
    {
        return $engineer->id === $report->engineer_id && $report->status === 'draft';
    }
} 