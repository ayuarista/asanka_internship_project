<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-7xl mx-auto container mt-4">
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <article>
            <div class="flex items-center justify-between mb-10">
                <a href="/posts" class="text-lg text-gray-600 underline">Back to blog</a>
                <div class="flex gap-3">
                    <a href="{{ route('posts.edit', $post->slug) }}" class="bg-indigo-500 hover:bg-indigo-500/80 transition-all duration-300 cursor-pointer text-white px-4 py-2 rounded-md">Edit</a>

                    <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-500/80 transition-all duration-300 text-white px-4 py-2 rounded-md cursor-pointer" onclick="return confirm('Are you sure want to delete blog {{ $post->title }}?')">Delete</button>
                    </form>
                </div>
            </div>
            </div>
            <h1 class="font-bold text-5xl mt-2">{{ $post->title }}</h1>
            <div>
                <p class="text-indigo-500 mt-1"><b>Published </b>{{ $post->created_at->format('l, d F Y H:i')}}</p>
            </div>

            <div class="relative w-full h-80 mt-5">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail" class="w-full h-full object-cover rounded-lg object-center">
            </div>

            <p class="text-black text-pretty mt-3 text-justify text-lg">{{ $post->body }}</p>
        </article>
    </div>
</x-layout>
