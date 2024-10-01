<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller{
    
    public function index(Request $request){

        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Debes estar logueado para ver esta página.']);
        }

        $relevanceFilter = $request->input('relevance');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $query = Document::query();

        if ($relevanceFilter) {
            $query->where('relevance', $relevanceFilter);
        }

        if ($dateFrom) {
            $query->where('approval_date', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->where('approval_date', '<=', $dateTo);
        }

        $documentos = $query->paginate(10); 

        return view('auth.documentos', compact('documentos'));
    }
    
    public function edit($id){
        $documento = Document::findOrFail($id);
        return view('auth.edit_documento', compact('documento')); 
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'relevance' => 'required|string',
            'pdf_path' => 'nullable|file|mimes:pdf|max:2048', 
        ]);

        $documento = Document::findOrFail($id);

        if ($request->hasFile('pdf_path')) {
            if ($documento->pdf_path) {
                Storage::disk('public')->delete($documento->pdf_path); 
            }
            $path = $request->file('pdf_path')->store('documentos_corporativos', 'public');
            $documento->pdf_path = $path; 
        }

        $documento->name = $request->name;
        $documento->description = $request->description;
        $documento->relevance = $request->relevance;
        $documento->save(); 

        return redirect()->route('documentos')->with('success', 'Documento actualizado exitosamente.');
    }

    public function create() {
        return view('auth.create_documento'); 
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'relevance' => 'required',
            'pdf_path' => 'required|file|mimes:pdf',
        ]);

        $document = new Document();
        $document->name = $request->input('name');
        $document->description = $request->input('description');
        $document->relevance = $request->input('relevance');
        $document->approval_date = now(); 
        $document->upload_date = now(); 
        $document->pdf_path = $request->file('pdf_path')->store('documentos_corporativos', 'public'); 

        $document->save();

        return redirect()->route('documentos')->with('success', 'Documento creado exitosamente.');
    }

    public function destroy($id){
        
        $documento = Document::findOrFail($id);

        if ($documento->pdf_path) {
            Storage::disk('public')->delete($documento->pdf_path); 
        }

        $documento->delete();

        return redirect()->route('documentos')->with('success', 'Documento eliminado exitosamente.');
    }
}
