<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }

    public function update(Request $request, User $user)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'no_telepon' => 'required'
        ]);

        User::Where('id', $user->id)->update($validateData);

        return redirect()->back()->with('success', 'Berhasil Di Rubah');
    }
}
