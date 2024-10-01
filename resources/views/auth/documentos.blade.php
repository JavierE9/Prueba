@extends('layouts.templateApp')

@section('titulo', 'Documentos')

@section('contenido')

<h1 class="text-3xl text-center font-bold">Documentos Corporativos</h1>

<div class="text-center mt-2">
    @if (Auth::check())
        <p class="text-lg">Rol: <strong>{{ Auth::user()->role }}</strong></p>
        <p class="text-md">
            @if (Auth::user()->role == 'admin')
                Tienes permiso para ver, crear, editar y borrar documentos.
            @elseif (Auth::user()->role == 'responsable')
                Tienes permiso para ver y crear documentos.
            @elseif (Auth::user()->role == 'asignado')
                Tienes permiso solo para ver documentos.
            @else
                No tienes permisos asignados.
            @endif
        </p>
    @endif
</div>

<div class="container mx-auto mt-5">
    <div class="flex justify-center mb-4">
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'responsable')
            <a href="{{ route('documentos.create') }}" class="bg-green-100 border border-green-500 rounded p-2 hover:scale-105 transition-transform duration-300 flex items-center mr-4">
                <span class="mr-1">Crear</span>
                <img src="{{ asset('lapiz.svg') }}" alt="Crear" class="w-8 h-8" />
            </a>
        @endif
    </div>

    <form method="GET" action="{{ route('documentos') }}" class="mb-4">
        <div class="flex flex-col sm:flex-row justify-center mb-4">
            <div class="mb-2 sm:mb-0 mx-2">
                <label for="relevance" class="mr-2">Relevancia:</label>
                <select name="relevance" id="relevance" class="border border-gray-300 rounded p-1 cursor-pointer" value="{{ request('relevance') }}">
                    <option value="">Seleccionar</option>
                    <option value="alta" {{ request('relevance') == 'alta' ? 'selected' : '' }}>Alta</option>
                    <option value="media" {{ request('relevance') == 'media' ? 'selected' : '' }}>Media</option>
                    <option value="baja" {{ request('relevance') == 'baja' ? 'selected' : '' }}>Baja</option>
                </select>
            </div>

            <div class="mb-2 sm:mb-0 mx-2">
                <label for="date_from" class="mr-2">Desde:</label>
                <input type="date" name="date_from" id="date_from" class="border border-gray-300 rounded p-1 cursor-pointer" value="{{ request('date_from') }}">
            </div>

            <div class="mb-2 sm:mb-0 mx-2">
                <label for="date_to" class="mr-2">Hasta:</label>
                <input type="date" name="date_to" id="date_to" class="border border-gray-300 rounded p-1 cursor-pointer" value="{{ request('date_to') }}">
            </div>

            <button type="submit" class="flex items-center border border-black rounded px-3 py-1 hover:scale-105 transition-transform duration-200">
                <span class="mr-1 text-sm">Buscar</span>
                <img src="{{ asset('lupa.svg') }}" alt="Buscar" class="w-6 h-6" />
            </button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-2 py-1">ID</th>
                    <th class="border border-gray-300 px-2 py-1">Nombre</th>
                    <th class="border border-gray-300 px-2 py-1">Descripción</th>
                    <th class="border border-gray-300 px-2 py-1 text-center">Relevancia</th>
                    <th class="border border-gray-300 px-2 py-1 text-center">Fecha de Aprobación</th>
                    <th class="border border-gray-300 px-2 py-1 text-center">Fecha de Subida</th>
                    <th class="border border-gray-300 px-2 py-1">Documento PDF</th>
                    @if (Auth::user()->role == 'admin')
                        <th class="border border-gray-300 px-2 py-1">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($documentos as $documento)
                    <tr>
                        <td class="border border-gray-300 px-2 py-1">{{ $documento->id }}</td>
                        <td class="border border-gray-300 px-2 py-1">{{ $documento->name }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ Str::limit($documento->description, 50, '...') }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ ucfirst($documento->relevance) }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-sm text-center">{{ \Carbon\Carbon::parse($documento->approval_date)->format('Y-m-d') }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-sm text-center">{{ \Carbon\Carbon::parse($documento->upload_date)->format('Y-m-d') }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">
                            <a href="{{ env('BASE_URL') . '/storage/app/public/' . $documento->pdf_path }}" target="_blank" class="hover:scale-110 transition-transform duration-300">
                                <img src="{{ asset('PDF.svg') }}" alt="PDF" class="inline-block w-8 h-8 hover:scale-110 transition-transform duration-300" />
                            </a>
                        </td>
                        @if (Auth::user()->role == 'admin')
                            <td class="border border-gray-300 px-2 py-1">
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('documentos.edit', $documento->id) }}" class="inline-block">
                                        <img src="{{ asset('lapiz.svg') }}" alt="Editar" class="w-8 h-8 hover:scale-110 transition-transform duration-300" />
                                    </a>
                                    <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block">
                                            <img src="{{ asset('papelera.svg') }}" alt="Borrar" class="w-6 h-6 hover:scale-110 transition-transform duration-300" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8 flex justify-center">
        {{ $documentos->appends(request()->except('page'))->links() }}
    </div>
</div>

@endsection
