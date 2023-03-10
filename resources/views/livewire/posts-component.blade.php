<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($posts as $post)
        <a href="{{ route('posts.show', ['user'=>$user, 'post' =>$post]) }}">
            <div class="bg-white shadow-sm rounded-md p-4">
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

</div>
