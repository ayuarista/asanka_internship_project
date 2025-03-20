<x-layout>
    <x-slot:title>Edit Post</x-slot:title>

    <div class="max-w-6xl mx-auto container mt-8">
        @if (session()->has('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data"
            class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block font-medium">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                    class="w-full border p-2 rounded-md focus:outline-indigo-500 border-gray-900/25 mt-1">
            </div>

            <div>
                <label for="category" class="block font-medium">Category</label>
                <select name="category_id" id="category" class="mt-1 w-full border p-2 rounded-md focus:outline-indigo-500 border-gray-900/25">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="body" class="block font-medium">Content</label>
                <textarea name="body" id="body" rows="6" class="mt-1 w-full border p-2 rounded-md focus:outline-indigo-500 border-gray-900/25">{{ old('body', $post->body) }}</textarea>
            </div>

            <div>
                <label for="thumbnail" class="block font-medium">Previous Thumbnail</label>
                @if ($post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail"
                        class="w-40 h-40 object-cover rounded-md mb-2 mt-1">
                @endif
                <input type="file" name="thumbnail" id="thumbnail" class="w-full p-2 rounded-md border border-gray-900/25">
            </div>

            <button type="submit" class="bg-indigo-500 hover:bg-indigo-500/90 transition-all duration-300 cursor-pointer font-medium text-white px-4 py-2 rounded-md w-full">Update Post</button>
        </form>
    </div>
</x-layout>
