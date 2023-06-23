<div style="margin-left: 10px">
    <ul>
        <li>
            
            @foreach ($comment->comments as $comment)
                {{ $comment->content }}
                <livewire:comment-item :wire:key="rand(1000, 9999)" :comment="$comment"  />
            @endforeach
            <form wire:submit.prevent="addComment">
                <input style="border: 2px solid black" wire:model="newComment" >
                <button type="submit">Add Comment</button>
            </form>
        </li>
    </ul>

</div>
