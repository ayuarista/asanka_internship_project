<x-layout>
    <x-slot:title>Edit Post</x-slot:title>

    <div class="max-w-4xl mx-auto container mt-8">
        @if (session()->has('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif


        <h1 class="text-2xl font-bold">Edit Post</h1>

        <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data"
            class="mt-4 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block font-semibold">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                    class="w-full border p-2 rounded-md">
            </div>

            <div>
                <label for="category" class="block font-semibold">Category</label>
                <select name="category_id" id="category" class="w-full border p-2 rounded-md">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="body" class="block font-semibold">Body</label>
                <textarea name="body" id="body" rows="6" class="w-full border p-2 rounded-md">{{ old('body', $post->body) }}</textarea>
            </div>

            <div>
                <label for="thumbnail" class="block font-semibold">Thumbnail</label>
                @if ($post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail"
                        class="w-40 h-40 object-cover rounded-md mb-2">
                @endif
                <input type="file" name="thumbnail" id="thumbnail" class="w-full border p-2 rounded-md">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Post</button>
        </form>
    </div>
</x-layout>
