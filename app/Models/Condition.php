<?php

namespace App\Models;

use App\Models\Counter;
use App\Models\Industrial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Condition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function counter()
    {
        return $this->belongsTo(Counter::class, 'counter_id');
    }

    public function industrial()
    {
        return $this->belongsTo(Industrial::class);
    }

    public function caseDetails()
    {
        return $this->hasMany(CaseDetails::class);
    }

    public function complete()
    {
        $this->update(['completed' => true]);
    }

    public function incomplete()
    {
        $this->update(['completed' => false]);
    }

}
