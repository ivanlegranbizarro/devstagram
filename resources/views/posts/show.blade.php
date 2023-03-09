@extends('layouts.app')

@section('titulo')

@endsection

@section('contenido')

<div class="container mx-auto md:flex">
  <div class="md:w-1/2">
    <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen de {{$post->titulo}}" />
    <div class="p-3 flex items-center gap-2">
      @auth
      @if ($post->checkLike(auth()->user()))
      <form method="POST" action="{{ route('posts.likes.destroy', $post) }}" id="like">
        @csrf
        @method('DELETE')
        <div class="my-4 px-2">
          <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-6 h-6">
              <path
                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
            </svg>

          </button>
        </div>
      </form>
      @else
      <form method="POST" action="{{ route('posts.likes.store', $post) }}" id="like">
        @csrf
        <div class="my-4 px-2">
          <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
            </svg>
          </button>
        </div>
      </form>
      @endif
      @endauth
      <p>{{ $post->likes->count()}} Likes</p>
    </div>
    <div>
      <p class="font-bold">{{$post->user->username}}</p>
      <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
      <p class="mt-5">
        {{$post->descripcion}}
      </p>
    </div>
    @auth
    @if ( $post->user->id == auth()->user()->id )
    <form action="{{ route('posts.destroy', $post) }}" method="POST"
      onsubmit="return confirm('¿Estás seguro de querer eliminar este post?')">
      @csrf
      @method('DELETE')
      <input type="submit" value="Eliminar"
        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-lg cursor-pointer transition-colors duration-300 mt-2" />
    </form>
    @endif
    @endauth
  </div>
  <div class="md:w-1/2 p-5">
    <div class="shadow bg-white p-5 mb-5">
      @auth
      <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
      @if(session('mensaje'))
      <div class="bg-green-500 p-3 rounded-lg mb-5 text-white text-center" id="mensaje">
        {{ session('mensaje') }}
      </div>
      @endif
      <form action="{{ route('comentarios.store', ['post' => $post->id, 'user' => $user->username]) }}" method="POST">

        @csrf
        <div class="mb-5">
          <label for="comentario" class="mb-2 block uppercase text-gray-500"></label>
          <textarea id="comentario" name="comentario" placeholder="Escribe aquí..."
            class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
          @error('comentario')
          <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <input type="submit" value="Enviar"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition-colors duration-300" />
      </form>
      @endauth
      <div class="bg-white shadow mb-5 max-h-96 overflow-y-auto mt-10">
        @if ($post->comentarios->count() > 0)
        @foreach ($post->comentarios as $comentario)
        <div class="p-5 border-gray-300 border-b">
          <p class="font-bold">{{$comentario->user->username}}</p>
          <p class="text-gray-500 text-sm">{{$comentario->created_at->diffForHumans()}}</p>
          <p>{{$comentario->comentario}}</p>
        </div>
        @endforeach
        @else
        <p class="p-10 text-center">
          No hay comentarios todavía
        </p>
        @endif
      </div>

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  setTimeout(function() {
            const mensaje = document.getElementById('mensaje');
            if (mensaje) {
                mensaje.style.display = 'none';
            }
        }, 2000);
</script>
@endpush
