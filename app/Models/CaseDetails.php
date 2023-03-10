<?php

namespace App\Models;

use App\Models\Condition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseDetails extends Model
{
    use HasFactory;

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }

    
}
