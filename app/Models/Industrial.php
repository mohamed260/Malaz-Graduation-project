<?php

namespace App\Models;

use App\Models\Condition;
use App\Models\CaseDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industrial extends Model
{
    use HasFactory;

    public function condition()
    {
        return $this->hasOne(Condition::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function caseDetails()
    {
        return $this->hasMany(CaseDetails::class);
    }
}
