<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;

class GraficoCircularController extends Controller
{
    public function index(){

        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Debes estar logueado para ver esta página.']);
        }


        $data = Document::selectRaw('relevance, count(*) as count')
                        ->groupBy('relevance')
                        ->get();

        return view('auth.grafico_circular', compact('data'));
    }
}
