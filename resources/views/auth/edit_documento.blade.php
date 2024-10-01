@extends('layouts.templateApp')

@section('titulo', 'Editar Documento')

@section('contenido')
<h1 class="text-3xl text-center font-bold">Editar Documento</h1>

<div class="container mx-auto mt-5">
    <form method="POST" action="{{ route('documentos.update', $documento->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ $documento->name }}" class="border border-gray-300 rounded p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block">Descripción:</label>
            <textarea name="description" id="description" class="border border-gray-300 rounded p-2 w-full" required>{{ $documento->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="relevance" class="block">Relevancia:</label>
            <select name="relevance" id="relevance" class="border border-gray-300 rounded p-2 w-full" required>
                <option value="alta" {{ $documento->relevance == 'alta' ? 'selected' : '' }}>Alta</option>
                <option value="media" {{ $documento->relevance == 'media' ? 'selected' : '' }}>Media</option>
                <option value="baja" {{ $documento->relevance == 'baja' ? 'selected' : '' }}>Baja</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="pdf_path" class="block">Archivo PDF (opcional):</label>
            <input type="file" name="pdf_path" id="pdf_path" class="border border-gray-300 rounded p-2 w-full" accept="application/pdf">
        </div>

        <button type="submit" class="bg-blue-500 text-white rounded p-2">Actualizar Documento</button>
    </form>

    @if (session('success'))
        <div class="mt-4 text-green-500">{{ session('success') }}</div>
    @endif
</div>

@endsection
