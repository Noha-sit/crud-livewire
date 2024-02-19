<div>
    <form wire:submit.prevent="create">
        <input type="text" wire:model="title" placeholder="Title">
        <input type="text" wire:model="content" placeholder="Content">
        <button type="submit">Create</button>
    </form>

    @foreach($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <button wire:click="edit({{ $post->id }})">Edit</button>
            <button wire:click="delete({{ $post->id }})">Delete</button>
        </div>
    @endforeach

    @if($postId)
        <form wire:submit.prevent="update">
            <input type="text" wire:model="title" placeholder="Title">
            <input type="text" wire:model="content" placeholder="Content">
            <button type="submit">Update</button>
        </form>
    @endif
</div>
