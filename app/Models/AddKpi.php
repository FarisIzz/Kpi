<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddKpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'bil','teras', 'SO', 'negeri', 'user_id', 'kpi', 'pernyataan_kpi',
        'sasaran', 'jenis_sasaran', 'pencapaian', 'peratus_pencapaian', 'status', 'user_id'
    ];

    // Definisi hubungan dengan model User
    // In AddKpi.php
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
