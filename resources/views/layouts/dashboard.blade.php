@extends('layouts.app')

@section('titulo')
@auth
@if(auth()->user()->id == $user->id)
Tu cuenta
@else
Perfil: {{$user->username}}
@endif
@endauth
@endsection

@section('contenido')
<div class="flex justify-center">
  <div class="w-full md:w-8/12 lg:w-6/12 md:flex flex-col md:items-center md:justify-center">
    <div class="md:w-8/12 lg:w-6/12 px-5 mb-5">
      <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario" class="w-10/12 mx-auto" />
    </div>
    <div class="md:w-8/12 lg:w-6/12 px-5 text-center mt-10">
      @auth
      @if($user->id == auth()->user()->id)
      <a href="" class="hover:font-bold">
        <p class="text-gray-700 text-xl">{{$user->username}}
      </a>
      @endif
      @endauth
      @guest
      <p class="text-gray-700 text-xl">{{$user->username}}
      </p>
      @endguest
      <p class="text-gray-800 text-sm mb-3 font-bold">
        0
        <span class="font-normal">
          Seguidores
        </span>
      </p>
      <p class="text-gray-800 text-sm mb-3 font-bold">
        0
        <span class="font-normal">
          Siguiendo
        </span>
      </p>
      <p class="text-gray-800 text-sm mb-3 font-bold">
        0
        <span class="font-normal">
          Posts
        </span>
      </p>
    </div>
  </div>
</div>

<section class="container mx-auto mt-10" id="publicaciones">
  <h2 class="text-4xl font-black my-10 text-center">Publicaciones</h2>
</section>

<div>
  <livewire:posts-component :posts="$posts" :user="$user" />

</div>


@endsection
