<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function index()
    {
        $conditions = Condition::all();

        return view('condition.index', compact('conditions'));
    }

    public function show(Condition $condition)
    {
        return view('condition.show', compact('condition'));
    }

    public function update(Condition $condition)
    {
        request('completed') ? $condition->complete() : $condition->incomplete();

        return back();
    }

    public function destroy(Condition $condition)
    {
        $condition->delete();

        return back();
    }
}
