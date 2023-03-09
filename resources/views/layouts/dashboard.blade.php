@extends('layouts.app')

@section('titulo')
@if(auth()->user()->id == $user->id)
Tu cuenta
@else
Perfil: {{$user->username}}
@endif
@endsection

@section('contenido')
<div class="flex justify-center">
  <div class="w-full md:w-8/12 lg:w-6/12 md:flex flex-col md:items-center md:justify-center">
    <div class="md:w-8/12 lg:w-6/12 px-5 mb-5">
      <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario" class="w-10/12 mx-auto" />
    </div>
    <div class="md:w-8/12 lg:w-6/12 px-5 text-center mt-10">
      <p class="text-gray-700 text-xl">{{$user->username}}</p>
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

<div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
  @if ($posts->count())
  @foreach ($posts as $post)
  <div>
    <a href="{{ route('posts.show', ['post'=> $post, 'user'=>$user ]) }}">
      <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen de post{{$post->titulo}}" />
    </a>
  </div>
  @endforeach
  @else
  <p class="text-gray-700 text-xl text-center">Todavía no hay publicaciones</p>
  @endif
</div>

<div class="flex justify-center mt-10">
  @if ($posts->currentPage() > 1)
  <a href="{{ $posts->previousPageUrl() }}#publicaciones"
    class="text-gray-500 transition duration-0 hover:text-gray-800">{{ __('Anterior') }}</a>
  @endif

  @if ($posts->hasMorePages())
  <a href="{{ $posts->nextPageUrl() }}#publicaciones"
    class="text-gray-500 transition duration-0 hover:text-gray-800">{{ __('Siguiente') }}</a>
  @endif
</div>

@endsection
