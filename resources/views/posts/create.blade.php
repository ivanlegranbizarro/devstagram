@extends('layouts.app')
@section('titulo')
Nueva publicación
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
  <div class="md:w-6/12 p-5">
    <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
      name="dropzone"
      class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
      @csrf

    </form>
  </div>
  <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
    <form action="{{ route('posts.store') }}" method="POST" novalidate>
      @csrf
      <div class="mb-5">
        <label for="titulo" class="mb-2 block uppercase text-gray-500">Título</label>
        <input type="text" id="titulo" name="titulo" placeholder="Título..."
          class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror" value="{{ old('titulo') }}" />
        @error('titulo')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-5">
        <label for="descripcion" class="mb-2 block uppercase text-gray-500">Descripción</label>
        <textarea id="descripcion" name="descripcion" placeholder="Descripción del post..."
          class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
        @error('descripcion')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-5">
        <input name="imagen" type="hidden" id="imagen" value="{{ old('imagen') }}" />
        @error('imagen')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
      <input type="submit" value="Crear publicación"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition-colors duration-300" />
    </form>
  </div>
</div>
@endsection
