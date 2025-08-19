<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Elegant Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
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
        .gold-gradient {
            background: linear-gradient(135deg, #d4af37 0%, #ffd700 50%, #ffed4e 100%);
        }
        .prose-custom {
            line-height: 1.8;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="{{ route('posts.index') }}" class="font-serif text-2xl font-bold text-gray-900">Elegant Blog</a>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-900 transition">Home</a>
                    <a href="{{ route('profile.show', $post->user->id) }}" class="text-gray-600 hover:text-gray-900 transition">Author Profile</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative h-96 overflow-hidden">
        @if($post->image)
            <div class="absolute inset-0">
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>
            </div>
        @else
            <div class="absolute inset-0 luxury-gradient"></div>
        @endif
        
        <div class="relative container mx-auto px-6 h-full flex items-center">
            <div class="max-w-4xl">
                <div class="flex items-center mb-4">
                    <span class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-medium">Featured Article</span>
                    <span class="text-white/80 ml-4">{{ $post->created_at->format('M d, Y') }}</span>
                </div>
                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">{{ $post->title }}</h1>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <main class="container mx-auto px-6 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Author Section -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="flex items-center">
                    <a href="{{ route('profile.show', $post->user->id) }}" 
                       class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-xl font-bold">
                        {{ substr($post->user->name ?? 'A', 0, 1) }}
                    </a>
                    <div class="ml-4">
                        <a href="{{ route('profile.show', $post->user->id) }}" 
                           class="font-semibold text-gray-900 text-lg hover:text-purple-600 transition">
                            {{ $post->user->name ?? 'Anonymous Author' }}
                        </a>
                        <p class="text-gray-600">{{ $post->user->posts->count() ?? 0 }} articles published</p>
                    </div>
                </div>
            </div>

            <!-- Article Body -->
            <article class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="prose-custom text-gray-700 leading-relaxed">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </article>

            <!-- Tags Section -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <h3 class="font-semibold text-gray-900 mb-4">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Technology</span>
                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Lifestyle</span>
                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Business</span>
                </div>
            </div>

            <!-- Navigation -->
            <div class="flex justify-between items-center">
                <a href="{{ route('posts.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gray-900 text-white rounded-full hover:bg-gray-800 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Articles
                </a>
                
                <div class="flex space-x-4">
                    <button class="p-3 bg-gray-100 rounded-full hover:bg-gray-200 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m9.632 4.316C18.114 15.062 18 15.518 18 16c0 .482.114.938.316 1.342m0-2.684a3 3 0 110 2.684M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </button>
                    <button class="p-3 bg-gray-100 rounded-full hover:bg-gray-200 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6 text-center">
            <h3 class="font-serif text-2xl font-bold mb-2">Elegant Blog</h3>
            <p class="text-gray-400 mb-4">Curated insights for the discerning reader</p>
            <p class="text-sm text-gray-500">&copy; 2024 Elegant Blog. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
