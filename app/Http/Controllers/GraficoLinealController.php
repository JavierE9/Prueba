<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Carbon\Carbon;

class GraficoLinealController extends Controller{
    
    public function index(){

        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Debes estar logueado para ver esta página.']);
        }

 
        $now = Carbon::now();
        $oneYearAgo = $now->copy()->subYear();

        $documentos = Document::whereNotNull('approval_date')
            ->whereBetween('approval_date', [$oneYearAgo, $now])
            ->selectRaw('YEAR(approval_date) as year, MONTH(approval_date) as month, COUNT(*) as total')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        
        $monthsData = array_fill(1, 12, 0); 

        
        foreach ($documentos as $documento) {
            $monthsData[$documento->month] = $documento->total;
        }

        
        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create($now->year, $i)->format('F Y'); 
            $data[] = $monthsData[$i]; 
        }

        return view('auth.grafico_lineal', compact('labels', 'data'));
    }
}
