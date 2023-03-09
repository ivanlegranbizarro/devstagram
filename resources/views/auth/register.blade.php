@extends('layouts.app')

@section('titulo')
Regístrese en DevStagram
@endsection


@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
  <div class="md:w-6/12 p-5">
    <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen de Registro" />
  </div>
  <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
    <form action="{{ route('register') }}" method="POST" novalidate>
      @csrf
      <div class="mb-5">
        <label for="name" class="mb-2 block uppercase text-gray-500">
          Nombre
        </label>
        <input type="text" id="name" name="name" placeholder="Tu nombre..." class="border p-3 w-full rounded-lg
        @error('name') border-red-500 @enderror" value="{{ old('name') }}" />
        @error('name')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-5">
        <label for="username" class="mb-2 block uppercase text-gray-500">
          Username
        </label>
        <input type="text" id="username" name="username" placeholder="Tu username..."
          class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
          value="{{ old('username') }}" />
        @error('username')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-5">
        <label for="email" class="mb-2 block uppercase text-gray-500">
          Email
        </label>
        <input type="email" id="email" name="email" placeholder="Tu email..." class="border p-3 w-full rounded-lg
        @error('email') border-red-500 @enderror" value="{{ old('email') }}" />
        @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-5">
        <label for="password" class="mb-2 block uppercase text-gray-500">
          Contraseña
        </label>
        <input type="password" id="password" name="password" placeholder="Tu contraseña..."
          class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" />
        @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-5">
        <label for="password_confirmation" class="mb-2 block uppercase text-gray-500">
          Confirmar contraseña
        </label>
        <input type="password" id="password_confirmation" name="password_confirmation"
          placeholder="Confirma tu contraseña..." class="border p-3 w-full rounded-lg
          @error('password_confirmation') border-red-500 @enderror" />
        @error('password_confirmation')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-5">
        <button type="submit"
          class=" bg-blue-500 hover:bg-blue-600 transition-colors text-white font-bold py-2 px-4 rounded uppercase w-full">
          Crear cuenta
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
