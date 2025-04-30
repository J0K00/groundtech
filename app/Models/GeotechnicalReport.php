<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeotechnicalReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'engineer_id',
        'title',
        'project_name',
        'location',
        'description',
        'status',
        'start_date',
        'end_date',
        'soil_data',
        'recommendations',
        'conclusion',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'soil_data' => 'array',
        'recommendations' => 'array',
    ];

    public function engineer()
    {
        return $this->belongsTo(Engineer::class);
    }
}
