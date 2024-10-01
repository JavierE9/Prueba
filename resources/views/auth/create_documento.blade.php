@extends('layouts.templateApp')

@section('titulo', 'Crear Documento')

@section('contenido')
    <h1 class="text-3xl text-center font-bold">Crear Documento</h1>
    <div class="container mx-auto mt-5">
        
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('documentos.store') }}" enctype="multipart/form-data">
            @csrf 
            
            <div class="mb-4">
                <label for="name" class="block">Nombre:</label>
                <input type="text" name="name" id="name" class="border border-gray-300 rounded p-2 w-full" required value="{{ old('name') }}">
            </div>

            <div class="mb-4">
                <label for="description" class="block">Descripción:</label>
                <textarea name="description" id="description" class="border border-gray-300 rounded p-2 w-full" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="relevance" class="block">Relevancia:</label>
                <select name="relevance" id="relevance" class="border border-gray-300 rounded p-2 w-full" required>
                    <option value="alta" {{ old('relevance') == 'alta' ? 'selected' : '' }}>Alta</option>
                    <option value="media" {{ old('relevance') == 'media' ? 'selected' : '' }}>Media</option>
                    <option value="baja" {{ old('relevance') == 'baja' ? 'selected' : '' }}>Baja</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="pdf_path" class="block">Documento PDF:</label>
                <input type="file" name="pdf_path" id="pdf_path" class="border border-gray-300 rounded p-2 w-full" accept=".pdf" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white rounded p-2">Crear Documento</button>
        </form>
    </div>
@endsection
