<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        if(request('search')) {
            $sectors = Sector::where('name', 'like', '%' . request('search') . '%')->get();
        }else{
            $sectors = Sector::all();
        };

        return view('sector.index', compact('sectors'));
    }

    public function show(Sector $sector)
    {
        return view('sector.show', compact('sector'));
    }

    public function create()
    {
        return view('sector.create');
    }

    public function store(Request $request)
    {   
        $sector = new Sector();

        $sector->name = $request->name;
        $sector->location = $request->location;

        $sector->save();

        return redirect()->route('sector.index');
    }

    public function edit(Sector $sector)
    {
        return view('sector.edit', compact('sector'));
    }

    public function update(Sector $sector, Request $request)
    {
        $sector->update([
            'name' => $request->name,
            'location' => $request->location
        ]);

        return redirect()->route('sector.index');
    }

    public function destroy(Sector $sector)
    {
        $sector->delete();

        return back();
    }

    public function userUpdate(Request $request,$id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $sector = Sector::find($id);

        $sector->name = $request->name;

        $sector->save();

        return back();
    }

    
}
