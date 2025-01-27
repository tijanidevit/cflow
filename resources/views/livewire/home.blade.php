<div>
    <div class="flex my-4 justify-between">
        <h2 class="text-xl font-bold">All Posts</h2>

        <a href="{{route('create-post')}}" wire:navigate class="bg-blue-600 px-3 py-2 rounded-md hover:bg-blue-800 text-white">Schedule a Post</a>
    </div>
    @livewire('post.post-table')
</div>
