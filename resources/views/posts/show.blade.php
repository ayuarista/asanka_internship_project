<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-7xl mx-auto container mt-4">
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <article>
            <div class="flex flex-col items-start">
                <a href="/posts" class="text-[15px] text-gray-400 hover:underline">Back to blog</a>
            </div>
            </div>
            <h1 class="font-bold text-5xl mt-2">{{ $post->title }}</h1>
            <div>
                <p class="text-indigo-400 mt-1"><b>Published </b>{{ $post->created_at->format('M d, Y')}}</p>
            </div>

            <div class="relative w-full h-80 mt-5">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail" class="w-full h-full object-cover rounded-lg">
            </div>

            <p class="text-black text-pretty mt-3 text-justify">{{ $post->body }}</p>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('posts.edit', $post->slug) }}" class="bg-indigo-500 hover:bg-indigo-500/80 transition-all duration-300 cursor-pointer text-white px-4 py-2 rounded-md">Edit</a>

                <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-500/80 transition-all duration-300 text-white px-4 py-2 rounded-md cursor-pointer" onclick="return confirm('Are you sure want to delete blog {{ $post->title }}?')">Delete</button>
                </form>
            </div>
        </article>
    </div>
</x-layout>
