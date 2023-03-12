@extends('layouts.app')

@section('titulo')
Página principal
@endsection

@section('contenido')
@if ($posts->count())
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
  @foreach ($posts as $post)
  <a href="{{ route('posts.show', ['user'=>$post->user, 'post' =>$post]) }}">
    <div class="bg-white shadow-sm rounded-md p-4">
      <h3 class="text-sm text-gray-500">{{ $post->user->name }}</h3>
      <h2 class="text-lg font-medium text-gray-800">{{ $post->titulo }}</h2>
      <p class="text-sm text-gray-500 mt-2">{{ $post->descripcion }}</p>
      <img src="{{ asset('uploads/' . $post->imagen) }}" alt="{{ $post->titulo }}" class="mt-4">
    </div>
  </a>
  @endforeach
</div>
<div class="my-10 flex justify-center">
  <div class="livewire-pagination">{{$posts->links()}}</div>
</div>
@else
<p>Todavía no hay publicaciones de la gente a la que sigues</p>
@endif
@endsection
