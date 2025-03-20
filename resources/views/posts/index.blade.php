<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="bg-white py-3">
        @if(session('success'))
            <div class="bg-emerald-500 text-white p-3 mx-5 rounded-md mb-4">
            {{ session('success') }}
            </div>
        @endif
        <form action="/posts" class="flex items-center justify-center mt-5 space-x-4">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="relative w-1/2">
                <label for="search" class="sr-only">Search Blog</label>
                <input type="search" placeholder="Search Blog" required autocomplete="off" name="search" id="search"
                    class="w-full py-2 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <button type="submit" class="py-2 px-4 bg-indigo-500 text-white text-[15px] rounded-lg hover:bg-blue-600 focus:outline-none">
                Search
            </button>
        </form>

        <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($posts as $post)
                    <article class="flex flex-col items-start justify-between bg-white p-5 rounded-lg border border-gray-200">
                        <a href="/posts/{{ $post->slug }}" class="relative block w-full h-48">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                 class="w-full h-full object-cover object-center rounded-lg">
                        </a>
                        <div class="flex items-center gap-x-4 text-xs mt-2">
                            <time datetime="{{ $post->created_at }}"
                                class="text-gray-500">{{ $post->created_at->diffForHumans() }}</time>
                            @if ($post->category)
                                <a href="/posts?category={{ optional($post->category)->slug }}"
                                    class="relative z-10 rounded-full bg-indigo-400 px-3 py-1.5 font-medium text-white hover:bg-gray-200">
                                    {{ optional($post->category)->name }}
                                </a>
                            @endif
                        </div>
                        <div class="group relative">
                            <h3 class="mt-2 text-xl font-semibold text-gray-900 group-hover:text-gray-500">
                                <a href="/posts/{{ $post->slug }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-3 line-clamp-3 text-justify text-pretty text-sm text-gray-600">
                                {{ Str::limit($post->body, 100) }}
                            </p>
                        </div>
                        {{-- <div class="relative mt-8 flex items-center gap-x-4">
                            <img src="{{ optional($post->author)->avatar ?? asset('default-avatar.png') }}"
                                alt="{{ optional($post->author)->name }}"
                                class="size-10 rounded-full bg-gray-50">
                            <div class="text-sm">
                                <p class="font-semibold hover:underline text-gray-900">
                                    <a href="/posts?author={{ optional($post->author)->username }}">
                                        <span class="absolute inset-0"></span>
                                        {{ optional($post->author)->name }}
                                    </a>
                                </p>
                                <p class="text-gray-600">{{ optional($post->author)->job }}</p>
                            </div>
                        </div> --}}
                    </article>
                @empty
                    <p class="text-gray-500 font-semibold text-3xl">No posts found.</p>
                    <a href="/posts" class="block text-blue-500 hover:underline">&laquo; Back to Posts</a>
                @endforelse
            </div>
        </div>

        @if ($posts->count())
            {{ $posts->links() }}
        @endif
    </div>
</x-layout>



{{-- @foreach ($posts as $post)
    <article class="max-w-xl p-5 border-b mx-5 border-gray-300 ">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h1 class="font-bold text-3xl mt-2">{{ $post['title'] }}</h1>
        </a>
        <div class="text-black text-sm mt-2">
            By
            <a href="/authors/{{ $post->author->username }}"
                class="hover:underline text-gray-400">{{ $post->author->name }}</a> in
                <a
                href="/categories/{{ $post->category->slug }}"
                class="hover:underline text-gray-400">{{ $post->category->name }}</a> |
            {{ $post->created_at->format('d M, Y') }}
        </div>
        <p class="text-black text-pretty mt-3 text-justify">{{ Str::limit($post['body'], 100) }}</p>
        <a href="/posts/{{ $post['slug'] }}" class="text-blue-600 hover:underline py-2">Read More &raquo;</a>
    </article>
@endforeach --}}
