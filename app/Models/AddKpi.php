<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddKpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'bil','teras', 'SO', 'negeri', 'pemilik', 'kpi', 'pernyataan_kpi',
        'sasaran', 'jenis_sasaran', 'pencapaian', 'peratus_pencapaian', 'status'
    ];
}
