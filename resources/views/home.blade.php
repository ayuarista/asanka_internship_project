<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <h1 class="text-4xl font-bold text-black">Blog Website</h1>
        <p class="text-gray-400 text-sm text-pretty">The latest and best lifestyle articles selected by our editorial office</p>
    </div>

    <div class="flex items-center justify-center gap-4">
        <div class="grid grid-cols-2 gap-4 max-w-2xl mt-8">
            <div class="grid col-span-2">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1501843508755-af0829d48618?q=80&w=2106&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-md">
                    <div class="absolute top-8 left-8">
                        <p class="text-sm text-white/80">FOOD</p>
                        <h1 class="font-bold text-4xl text-white">Wake up and smell <br> the coffee</h1>
                    </div>
                    <div class="absolute bottom-10 left-8">
                        <a href="/posts/create" class="px-8 py-2 font-medium rounded-md bg-white text-black hover:bg-white/80
                         transition-all duration-300">Create Blog</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1531875456634-3f5418280d20?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full rounded-md">
                    <div class="absolute bottom-3 left-8">
                        <p class="text-sm text-emerald-700/80">EDUCATION</p>
                        <h1 class="font-bold text-3xl text-emerald-700">Time to learn anything</h1>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1594057720001-d1c340b36730?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full rounded-md shadown-xl">
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 max-w-2xl mt-8">
            <div class="grid grid-cols-1">
                <div class="relative">
                    <img src="https://plus.unsplash.com/premium_photo-1661311950994-d263ea9681a1?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full rounded-md shadown-xl">
                    <div class="absolute top-8 left-4">
                        <p class="text-sm text-emerald-800/80">TRAVELLING</p>
                        <h1 class="font-bold text-3xl text-emerald-800">Top 3 Best Place to Travel</h1>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1730033135221-cf2da5ab25cb?q=80&w=1972&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-md">
                    <div class="absolute bottom-3 left-5">
                        <p class="text-sm text-white/80">INTERIOR</p>
                        <h1 class="font-bold text-3xl text-white">The Ways Japanese people create home</h1>
                    </div>
                </div>
            </div>
            <div class="grid col-span-2">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1742317402143-449e8b4cbf91?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-md h-96 w-full">
                    <div class="absolute bottom-8 left-8">
                        <p class="text-sm text-white/80">FOOD</p>
                        <h1 class="font-bold text-4xl text-white">Wake up and smell <br> the coffee</h1>
                    </div>
                    <div class="absolute top-10 left-8">
                        <a href="/posts/create" class="px-8 py-2 font-medium rounded-md bg-white text-black hover:bg-white/80
                         transition-all duration-300">Create Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>