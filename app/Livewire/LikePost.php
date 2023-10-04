<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{

    public $post;
    public $isLiked;
    public $ctnLikes;

    // Constructor para recibir el post
    public function mount($post) 
    {
        $this->isLiked = $post->checkLike(auth()->user());
        $this->ctnLikes = $post->likes->count();
    }

    /**
     * Metodo para dar like o dislike a un post
     */
    public function like() 
    {
        if ($this->post->checkLike(auth()->user())) {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->ctnLikes--;
        } else {
            $this->post->likes()->create(['user_id' => auth()->user()->id]);
            $this->isLiked = true;
            $this->ctnLikes++;

        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
