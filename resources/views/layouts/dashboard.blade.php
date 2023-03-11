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
      @if ($user->imagen)
      <img src="{{ asset('perfiles/' . $user->imagen) }}" alt="Imagen de usuario" class="w-10/12 mx-auto" />
      @else
      <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario" class="w-10/12 mx-auto" />
      @endif
    </div>
    <div class="md:w-8/12 lg:w-6/12 px-5 text-center mt-10">
      @auth
      @if($user->id == auth()->user()->id)
      <a href="{{ route('perfil.index', $user) }}" class="hover:font-bold">
        <p class="text-gray-700 text-xl">{{$user->username}}
      </a>
      @endif
      @endauth
      @guest
      <p class="text-gray-700 text-xl">{{$user->username}}
      </p>
      @endguest
      <p class="text-gray-800 text-sm mb-3 font-bold">
        {{ $user->followers->count() }}
        <span class="font-normal">
          @choice('Seguidor|Seguidores', $user->followers->count())
        </span>
      </p>
      <p class="text-gray-800 text-sm mb-3 font-bold">
        {{ $user->following->count() }}
        <span class="font-normal">
          Siguiendo
        </span>
      </p>
      <p class="text-gray-800 text-sm mb-3 font-bold">
        {{ $user->posts->count() }}
        <span class="font-normal">
          @choice('Publicación|Publicaciones', $user->posts->count())
        </span>
      </p>

      @auth
      @if ($user->id != auth()->user()->id)
      @if ($followerController->checkFollowing($user))
      <form action="{{ route('users.dejar', $user) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit"
          class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
          value="Dejar de seguir" />
      </form>
      @else
      <form action="{{ route('users.seguir', $user) }}" method="POST">
        @csrf
        <input type="submit"
          class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
          value="Seguir" />
      </form>

      @endif
      @endif
      @endauth

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
