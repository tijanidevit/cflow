<div>
    <div class="mb-4 flex items-center space-x-2">
        <input type="text" wire:model.live.debounce="search" class="p-2 border border-gray-300 rounded-md w-full md:w-1/2"
            placeholder="Search">
    </div>


    @if (session()->has('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full table-auto border-collapse bg-white shadow-lg">
        <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
            <tr>
                <th class="px-4 py-2">Content</th>
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2">Created At</th>
                <th class="px-4 py-2">Scheduled At</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-700">
            @foreach ($posts as $post)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ \Str::limit($post->content, 50) }}</td>
                    <td class="px-4 py-2">
                        @if ($post->file_path)
                            <img src="{{ asset("storage/$post->file_path") }}" width="120" alt="post">
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                    <td class="px-4 py-2">{{ $post->scheduled_at->format('Y-m-d H:i') }}</td>
                    <td class="px-4 py-2">
                        <button wire:click="delete('{{ $post->id }}')"
                            wire:confirm='Are you sure you want to delete this post'
                            class="text-red-500 focus:text-red-900 hover:underline">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm">
            Showing {{ $posts->firstItem() ?? 0 }} to {{ $posts->lastItem() ?? 0 }} of {{ $posts->total() }} posts
        </div>
        <div>
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
</div>
