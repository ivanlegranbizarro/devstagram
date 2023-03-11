@extends('layouts.app')

@section('titulo')
Editar perfil de {{auth()->user()->username}}
@endsection

@section('contenido')
<div class="md:flex md:justify-center">
  <div class="md:w-1/2 bg-white shadow p-6">
    <form action="{{ route('perfil.store', $user) }}" enctype="multipart/form-data" method="POST" class="mt-10 md:mt-0">
      @csrf
      <div class="mb-5">
        <label for="username" class="mb-2 block uppercase text-gray-500">
          Username
        </label>
        <input type="text" id="username" name="username" placeholder="Tu username..." class="border p-3 w-full rounded-lg
        @error('username') border-red-500 @enderror" value="{{auth()->user()->username }}" />
        @error('username')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-5">
        <label for="imagen" class="mb-2 block uppercase text-gray-500">
          Imagen de perfil
        </label>
        <input type="file" id="imagen" name="imagen" class="border p-3 w-full rounded-lg"
          value="{{auth()->user()->imagen }}" accept=".jpg, .jpeg, .png" />
      </div>
      <div class="mb-5">
        <button type="submit"
          class=" bg-blue-500 hover:bg-blue-600 transition-colors text-white font-bold py-2 px-4 rounded uppercase w-full">
          Guardar
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
