<div>


    <div class="flex my-4 justify-between">
        <h2 class="text-xl font-bold">Schedule a new Posts</h2>

        <a href="{{ route('home') }}" wire:navigate
            class="bg-blue-600 px-3 py-2 rounded-md hover:bg-blue-800 text-white">All Posts</a>
    </div>

    <div class="max-w-7xl mx-auto p-6 my-10 bg-white rounded-lg shadow-md">
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-4">
            <div>
                <label for="content" class="block text-sm font-medium mb-2">Post Content(*)</label>
                <textarea id="content" wire:model.defer="form.content"
                    class="block w-full p-2 border rounded-lg focus:ring focus:ring-blue-500"></textarea>
                @error('form.content')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="file" class="block text-sm font-medium mb-2">Upload File</label>
                <input type="file" id="file" wire:model="form.file"
                    class="block w-full p-2 border rounded-lg focus:ring focus:ring-blue-500">
                @error('form.file')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="file" class="block text-sm font-medium mb-2">Select an account</label>
                <select id="social_media_account_id" wire:change='accountChanged($event.target.value)'
                    wire:model.live.debounce="form.social_media_account_id"
                    class="block w-full p-2 border rounded-lg focus:ring focus:ring-blue-500">

                    <option value="" selected>Select an account</option>

                    @forelse ($socialMediaAccounts as $account)
                        <option :key="$account - > id" value="{{ $account->id }}">{{ $account->username }}</option>
                    @empty
                    @endforelse
                </select>
                @error('form.social_media_account_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                @if ($form->followers)
                <label class="block text-sm font-medium mb-2">Followers</label>
                    <ul class="h-48 overflow-scroll p-4 shadow-lg">
                        @foreach ($form->followers as $follower)
                            <li>Name: {{ $follower['full_name'] ?? 'N/A' }}, Username: {{ $follower['username'] }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div>
                <label for="scheduled_at" class="block text-sm font-medium mb-2">Schedule Time(*)</label>
                <input type="datetime-local" id="scheduled_at" wire:model.defer="form.scheduled_at"
                    class="block w-full p-2 border rounded-lg focus:ring focus:ring-blue-500">
                @error('form.scheduled_at')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-lg">Schedule
                Post</button>
        </form>
    </div>
</div>
