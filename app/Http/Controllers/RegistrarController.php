<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrarController extends Controller
{
    public function create() 
    {
        return view('auth.registrar');
    }

    public function store(Request $request) 
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,responsable,asignado',
        ]);

        
        $user = User::create($request->only(['name', 'email', 'password', 'role']));

       
        auth()->login($user);

        return redirect()->to('/');
    }
}
