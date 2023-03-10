<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sector;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        $sectors = Sector::all();

        return view('user.index', compact('users','sectors'));
    }

    public function update(Request $request,$id)
    {
        // $request->validate([
        //     'role' => 'required',
        // ]);

        // $user->update([
        //     'role' => $request->role,
        // ]);
            $user = User::find($id);

            $user->role = $request->role;

            $user->save();


        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }

    public function userDestroy(Request $request,$id)
    {
        $user = User::find($id);

        $user->sector_id = NULL;

        $user->save();

        return back();
    }

    public function userUpdate(Request $request,$id)
    {

        $request->validate([
            'sector_id' => 'required',
        ]);

        $user = User::find($id);

        $user->sector_id = $request->sector_id;

        $user->save();

        return back();
    }
}
