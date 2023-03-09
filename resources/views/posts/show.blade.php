@extends('layouts.app')

@section('titulo')

@endsection

@section('contenido')

<div class="container mx-auto md:flex">
  <div class="md:w-1/2">
    <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen de {{$post->titulo}}" />
    <div class="p-3 flex items-center gap-2">
      @auth
      <form action="{{ route('posts.likes.toggle', $post) }}" method="POST" class="like-form"
        hx-post="{{ route('posts.likes.toggle', $post) }}" hx-swap="outerHTML" hx-target=".like-counter">
        @csrf
        @if ($post->checkLike(auth()->user()))
        @method('DELETE')
        @endif
        <button type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="w-6 h-6 fill-current text-red-500 @if ($post->checkLike(auth()->user())) liked @endif">
            <path
              d="M12 21.35L5.11 17.23l1.64-7.32L2.5 9.64l7.22-.62L12 3l2.28 5.02 7.22.62-4.25 3.27 1.64 7.32L12 21.35z" />
          </svg>
        </button>
      </form>
      @endauth
      <span class="like-counter">{{ $post->likes->count() }}</span>
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
<script>
  // Manejar el envío del formulario
  const likeForm = document.querySelector('.like-form');
  likeForm.addEventListener('htmx:afterSwap', (event) => {
    // Comprobar si el evento fue disparado por el envío del formulario
    if (event.detail.trigger === 'submit') {
      // Actualizar el botón de like
      const likeButton = event.target.querySelector('button');
      const likeCounter = event.target.querySelector('.like-counter');
      if (likeButton.classList.contains('liked')) {
        likeButton.classList.remove('liked');
        likeCounter.innerText = parseInt(likeCounter.innerText) - 1;
      } else {
        likeButton.classList.add('liked');
        likeCounter.innerText = parseInt(likeCounter.innerText) + 1;
      }
      // Actualizar el contador de likes
      const likeCount = event.detail.xhr.responseJSON.count;
      likeCounter.innerText = likeCount;
    }
  });
</script>

@endpush
