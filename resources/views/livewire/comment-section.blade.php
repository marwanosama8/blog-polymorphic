<div >
    <h2>Post ID: {{ $posts->id }}</h2>
    <ul>
        <li>
            @foreach ($posts->comments as $comment)
                <li>{{ $comment->content }}</li>
                <livewire:comment-item :wire:key="rand(1000, 9999)" :comment="$comment"  />
            @endforeach
        </li>
    </ul>

    <form wire:submit.stop="addComment">
        <textarea wire:model="newComment"></textarea>
        <button type="submit">Add Comment</button>
    </form>
</div>
