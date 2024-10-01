<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SesionController extends Controller {
    
    public function create() {
        
        return view('auth.login');
    }

    public function store() {
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Los datos introducidos son incorrectos, prueba otra vez',
            ]);

        } else {


                return redirect()->to('/');
   
        }
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }
}