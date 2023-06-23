<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public $comment = []; 
    public $newComment;

    public function render()
    {

        return view('livewire.comment-item');
    }

    public function addComment()
    {
        $validatedData = $this->validate([
            'newComment' => 'required'
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->content = $this->newComment;
        $comment->commentable_id = $this->comment->id;
        $comment->commentable_type = get_class($this->comment);
        $comment->save();

        // Reset the newComment input field
        $this->newComment = '';

        // Refresh the post and comments
        $this->comment->refresh();
    }

}
