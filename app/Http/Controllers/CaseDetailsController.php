<?php

namespace App\Http\Controllers;

use App\Models\CaseDetails;
use App\Models\Condition;
use Illuminate\Http\Request;

class CaseDetailsController extends Controller
{
    public function index()
    {
        $caseDetails = CaseDetails::all();

        return view('caseDetails.index', compact('caseDetails'));
    }

    // public function show(CaseDetails $caseDetails)
    // {
    //     return view('caseDetails.show', compact('caseDetails'));
    // }

    public function create()
    {
        return view('caseDetails.create');
    }

    public function store(Request $request, Condition $condition)
    {
        $request->validate([
            'notes' => 'required',
        ]);

        $caseDetails = new CaseDetails();

        $caseDetails->notes = $request->notes;
        $caseDetails->condition_id = $condition->id;

        $caseDetails->save();

        return back();
    }

    public function destroy(CaseDetails $caseDetails)
    {
        $caseDetails->delete();

        return back();
    }
}
