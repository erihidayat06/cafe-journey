<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function create(Request $request)
    {
        $validatData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nomor' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $validatData['password'] = Hash::make($validatData['password']);

        User::create($validatData);

        return redirect('/login');
    }
}
