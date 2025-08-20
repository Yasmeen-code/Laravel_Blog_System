<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Blog - Latest Articles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
        .luxury-gradient {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        }
        .gold-accent {
            background: linear-gradient(135deg, #d4af37 0%, #ffd700 100%);
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>
<body class="bg-gray-50">
   <header class="luxury-gradient text-white py-20 relative">
    <div class="container mx-auto px-6">
        <div class="absolute top-6 right-6 flex items-center space-x-4">
            @auth
                <a href="{{ route('profile.show', auth()->user()->id) }}" 
                   class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full hover:bg-white/20 transition">
                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full hover:bg-white/20 transition text-sm">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full hover:bg-white/20 transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-white text-gray-900 px-4 py-2 rounded-full hover:bg-gray-100 transition">
                    Register
                </a>
            @endauth
        </div>

        <div class="text-center">
            <h1 class="font-serif text-5xl md:text-6xl font-bold mb-4">Elegant Insights</h1>
            <p class="text-xl opacity-90 tracking-wide">Discover refined perspectives and curated wisdom</p>
        </div>
    </div>
</header>


    <main class="container mx-auto px-6 py-16">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts->slice(0) as $post)
                <article class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
                    <div class="h-48 w-full">
                        @if($post->image)
                            <img src="{{ asset($post->image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <a href="{{ route('profile.show', $post->user->id ?? 1) }}" 
                               class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                {{ substr($post->user->name ?? 'A', 0, 1) }}
                            </a>
                            <div class="ml-2">
                                <a href="{{ route('profile.show', $post->user->id ?? 1) }}" 
                                   class="text-sm font-semibold text-gray-900 hover:text-indigo-600 transition">
                                    {{ $post->user->name ?? 'Author' }}
                                </a>
                                <p class="text-xs text-gray-500">{{ $post->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>

                        <h3 class="font-serif text-xl font-bold text-gray-900 mb-3 leading-tight">{{ $post->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ Str::limit($post->content, 70) }}</p>
                        
                        <a href="{{ route('post.show', $post->id) }}" 
                           class="inline-flex items-center text-indigo-600 font-semibold hover:text-indigo-800 transition group">
                            Read More
                            <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-16 flex justify-center">
            <div class="bg-white rounded-full shadow-lg px-6 py-3">
                {{ $posts->links() }}
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6 text-center">
            <div class="mb-4">
                <h3 class="font-serif text-2xl font-bold mb-2">Elegant Blog</h3>
                <p class="text-gray-400">Curated insights for the discerning reader</p>
            </div>
            <p class="text-sm text-gray-500">&copy; 2024 Elegant Blog. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
