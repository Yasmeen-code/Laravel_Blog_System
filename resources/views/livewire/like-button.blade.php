<div>
    @auth
        <button 
            wire:click="toggleLike"
            class="p-3 rounded-full transition flex items-center space-x-2
                   {{ $isLiked ? 'bg-red-100 hover:bg-red-200' : 'bg-gray-100 hover:bg-gray-200' }}"
            title="{{ $isLiked ? 'Unlike this post' : 'Like this post' }}"
        >
            <svg class="w-5 h-5 {{ $isLiked ? 'text-red-500 fill-red-500' : 'text-gray-500' }}" 
                 viewBox="0 0 24 24" 
                 fill="{{ $isLiked ? 'currentColor' : 'none' }}" 
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                </path>
            </svg>
            
            @if($likeCount > 0)
                <span class="text-sm font-medium {{ $isLiked ? 'text-red-600' : 'text-gray-600' }}">
                    {{ $likeCount }}
                </span>
            @endif
        </button>
    @else
        <a href="{{ route('login') }}" 
           class="p-3 rounded-full bg-gray-100 hover:bg-gray-200 transition flex items-center space-x-2"
           title="Login to like this post">
            <svg class="w-5 h-5 text-gray-500" 
                 viewBox="0 0 24 24" 
                 fill="none" 
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                </path>
            </svg>
            
            @if($likeCount > 0)
                <span class="text-sm font-medium text-gray-600">
                    {{ $likeCount }}
                </span>
            @endif
        </a>
    @endauth
</div>
