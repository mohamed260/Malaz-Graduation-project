<?php

namespace App\Models;

use App\Models\Condition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Counter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function condition()
    {
        return $this->hasMany(Condition::class);
    }

    
}
