@extends('layouts.app')

@section('titulo')
Iniciar sesión en DevStagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
  <div class="md:w-6/12 p-5">
    <img src="{{ asset('img/login.jpg') }}" alt="Imagen de Login" />
  </div>
  <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
    <form action="{{ route('login') }}" method="POST" novalidate>
      @csrf
      <div class="mb-5">
        <label for="email" class="mb-2 block uppercase text-gray-500">
          Email
        </label>
        <input type="email" id="email" name="email" placeholder="Tu email..." class="border p-3 w-full rounded-lg
        @error('email') border-red-500 @enderror" value="{{ old('email') }}" />
        @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        @if (session('status'))
        <span class="text-red-500 text-sm">{{session('status')}}</span>
        @endif
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
        <div class="flex items-center">
          <input type="checkbox" id="remember" name="remember" class="mr-2">
          <label for="remember" class="text-gray-500">
            Recuérdame
          </label>
        </div>
      </div>

      <div class="mb-5">
        <button type="submit"
          class="bg-blue-500 hover:bg-blue-600 transition-colors text-white font-bold py-2 px-4 rounded uppercase w-full">
          Iniciar sesión
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
