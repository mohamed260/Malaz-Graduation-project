<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index()
    {
        $counters = Counter::paginate(10);

        return view('counter.index', compact('counters'));
    }

    public function search()
    {
        $counters = Counter::where('counter_number', 'like', '%' . request('search') . '%')->paginate();


        return view('counter.index', compact('counters'));
    }

    public function show(Counter $counter)
    {
        return view('counter.show', compact('counter'));
    }

    public function create()
    {
        return view('counter.create');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'counter_number' => 'required',
            'address' => 'required',
            'location' => 'required',
            'location_number' => 'required',
            'column_number' => 'required',
            'street_number' => 'required',
            'phone' => 'required',
        ]);

        $counter = new Counter();

        $counter->name = $request->name;
        $counter->counter_number = $request->counter_number;
        $counter->address = $request->address;
        $counter->location = $request->location;
        $counter->location_number = $request->location_number;
        $counter->column_number = $request->column_number;
        $counter->street_number = $request->street_number;
        $counter->phone = $request->phone;

        $counter->save();

        return redirect()->route('counter.index');
    }

    public function edit(Counter $counter)
    {
        return view('counter.edit', compact('counter'));
    }

    public function update(Counter $counter, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'counter_number' => 'required',
            'address' => 'required',
            'location' => 'required',
            'location_number' => 'required',
            'column_number' => 'required',
            'street_number' => 'required',
            'phone' => 'required',
        ]);

        $counter->fill($request->post())->save();

        return redirect()->route('counter.index');
    }

    public function destroy(Counter $counter)
    {
        $counter->delete();

        return redirect()->route('counter.index');
    }
}
