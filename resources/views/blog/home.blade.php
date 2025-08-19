<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Latest Posts') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($posts as $post)
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mb-4 rounded">
                        @endif

                        <h3 class="text-lg font-bold text-blue-600 dark:text-blue-400">
                            <a href="#">{{ $post->title }}</a>
                        </h3>

                        <p class="text-gray-500 text-sm mt-1">
                            By {{ $post->user->name ?? 'Unknown' }} • {{ $post->created_at->format('M d, Y') }}
                        </p>

                        <p class="text-gray-700 dark:text-gray-300 mt-3">
                            {{ Str::limit($post->content, 100) }}
                        </p>

                        <a href="#" class="inline-block mt-4 text-blue-600 dark:text-blue-400 hover:underline">
                            Read More →
                        </a>
                    </div>
                @endforeach

            </div>

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
