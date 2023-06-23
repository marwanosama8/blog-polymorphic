<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentSection extends Component
{
    public $newComment;
    public $posts;

    public function mount(Post $post)
    {
        $this->posts = $post;
    }

    public function render()
    {

        return view('livewire.comment-section');
    }

    public function addComment()
    {
        $validatedData = $this->validate([
            'newComment' => 'required'
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->content = $this->newComment;
        $comment->commentable_id = $this->posts->id;
        $comment->commentable_type = get_class($this->posts);
        $comment->save();

        // Reset the newComment input field
        $this->newComment = '';

        // Refresh the post and comments
        $this->posts->refresh();
    }
}