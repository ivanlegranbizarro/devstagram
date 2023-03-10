<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsComponent extends Component
{
    use WithPagination;

    public $user;

    public function render()
    {
        $posts = Post::where('user_id', $this->user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('livewire.posts-component', [
            'posts' => $posts
        ]);
    }
}
