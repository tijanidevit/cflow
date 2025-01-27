<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'IG Scheduler' }}</title>
</head>

<body>
    <header class="text-black shadow-md p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">

            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" wire:navigate class="text-2xl font-bold">IG Scheduler</a>
            </div>

            {{-- @auth
                <nav class="space-x-6">
                    <a href="{{ route('home') }}" class="hover:bg-blue-100 px-3 py-2 rounded-md">Posts</a>
                    <a href="{{ route('home') }}" class="hover:bg-blue-100 px-3 py-2 rounded-md">Search IG User</a>
                </nav>
            @endauth --}}
        </div>

    </header>

    <div class="max-w-7xl mx-auto mt-4 px-4">
        {{ $slot }}
    </div>


</body>

</html>
