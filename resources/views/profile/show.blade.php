<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Profile</title>
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
                    <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-900 transition">Articles</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Profile Header -->
    <header class="luxury-gradient text-white py-20">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-32 h-32 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-4xl font-bold mb-6 md:mb-0 md:mr-8">
                    {{ substr($user->name ?? 'A', 0, 1) }}
                </div>
                <div>
                    <h1 class="font-serif text-4xl font-bold mb-2">{{ $user->name }}</h1>
                    <div class="flex items-center space-x-4">
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                            {{ $user->posts->count() ?? 0 }} Articles
                        </span>
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                            Member since {{ $user->created_at->format('M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Profile Content -->
    <main class="container mx-auto px-6 py-12">
        <div class="max-w-6xl mx-auto">
       
            <!-- Stats Section -->
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                    <div class="text-3xl font-bold text-purple-600 mb-2">{{ $user->posts->count() ?? 0 }}</div>
                    <div class="text-gray-600">Articles Published</div>
                </div>
               

            <!-- Articles Section -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="font-serif text-2xl font-bold text-gray-900 mb-6">Latest Articles</h2>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($user->posts as $post)
                        <article class="border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                            <div class="flex items-center mb-3">
                                <span class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</span>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('post.show', $post->id) }}" 
                               class="text-purple-600 font-semibold hover:text-purple-800 transition">
                                Read Article →
                            </a>
                        </article>
                    @endforeach
                </div>
                @if($user->posts->count() == 0)
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        <p class="text-gray-500">No articles published yet</p>
                    </div>
                @endif
                <h2 class="font-serif text-2xl font-bold text-gray-900 mb-6">Liked Articles</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($user->likes as $like)
                        <article class="border border-gray-200 rounded-xl p-6 hover:shadow-lg transition">
                            <div class="flex items-center mb-3">
                                <span class="text-sm text-gray-500">{{ $like->post->created_at->format('M d, Y') }}</span>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-900 mb-2">{{ $like->post->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($like->post->content, 100) }}</p>
                            <a href="{{ route('post.show', $like->post->id) }}" 
                               class="text-purple-600 font-semibold hover:text-purple-800 transition">
                                Read Article →
                            </a>
                        </article>
                    @endforeach
                </div>
                @if($user->likes->count() == 0)
                    <div class="text-center py-12">
                        <p class="text-gray-500">No liked articles yet</p>
                    </div>
                @endif
           
               </div>     
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6 text-center">
            <h3 class="font-serif text-2xl font-bold mb-2">{{ $user->name }}</h3>
            <p class="text-gray-400 mb-4">Author Profile</p>
            <p class="text-sm text-gray-500">&copy; 2024 Elegant Blog. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
