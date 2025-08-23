<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeButton extends Component
{
    public $post;
    public $isLiked;
    public $likeCount;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->updateLikeStatus();
    }

    public function toggleLike()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($this->isLiked) {
            $this->post->likes()->where('user_id', Auth::id())->delete();
        } else {
            $this->post->likes()->create([
                'user_id' => Auth::id(),
            ]);
        }

        $this->updateLikeStatus();
    }

    private function updateLikeStatus()
    {
        $this->isLiked = Auth::check() && $this->post->likes()
            ->where('user_id', Auth::id())
            ->exists();
            
        $this->likeCount = $this->post->likes()->count();
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
