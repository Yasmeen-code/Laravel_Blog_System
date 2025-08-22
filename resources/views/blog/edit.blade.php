<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - Elegant Blog</title>
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
    </style>
</head>
<body class="bg-gray-50">
    <header class="luxury-gradient text-white py-16">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center">
                <h1 class="font-serif text-4xl font-bold">Edit Post</h1>
                <a href="{{ route('posts.index') }}" 
                   class="bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full hover:bg-white/20 transition">
                    Back to Home
                </a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               value="{{ old('title', $post->title) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                               placeholder="Enter your post title"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Content</label>
                        <textarea name="content" 
                                  id="content" 
                                  rows="8"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                  placeholder="Write your post content here..."
                                  required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Featured Image</label>
                        <input type="file" 
                               name="image" 
                               id="image"
                               accept="image/*"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @if($post->image)
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="mt-2 rounded-lg w-full h-48 object-cover">
                        @endif
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('posts.index') }}" 
                           class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            Update Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
</create_file>
