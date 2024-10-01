@extends('layouts.templateApp')

@section('titulo', 'Registrarse')

@section('contenido')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">

  <h1 class="text-3xl text-center font-bold">Registrarse</h1>

  <form class="mt-4" method="POST" action="">
    @csrf
        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Nombre" id="name" name="name">
    @error('name')        
        <p class="border border-red-600 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{ 'El nombre introducido es incorrecto'  }}</p>
    @enderror
        <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Correo Electrónico" id="email" name="email">
    @error('email')        
      <p class="border border-red-600 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{ 'El email introducido es incorrecto' }}</p>
    @enderror
        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Contraseña" id="password" name="password">
    @error('password')        
      <p class="border border-red-600 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{ 'La contraseña introducida es incorrecta.' }}</p>
    @enderror
    <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Confirmar Contraseña" id="password_confirmation" name="password_confirmation">
    
    <label for="role" class="block text-lg my-2">Rol:</label>
        <select name="role" id="role" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white cursor-pointer" required>
            <option value="">Seleccione un rol</option>
            <option value="admin">Admin</option>
            <option value="responsable">Responsable</option>
            <option value="asignado">Asignado</option>
        </select>
        @error('role')        
            <p class="border border-red-600 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{ $message }}</p>
        @enderror

    <button type="submit" class="rounded-md bg-blue-800 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-blue-900">Registrarse</button>
  </form>

</div>

@endsection
