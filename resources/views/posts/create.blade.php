<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-medium text-gray-900">Title</label>
            <input type="text" name="title" class="w-full p-2 border rounded focus:outline-indigo-500 border-gray-900/25" value="{{ old('title') }}" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium text-gray-900">Content</label>
            <textarea name="body" class="w-full p-2 border rounded focus:outline-indigo-500 border-gray-900/25" required>{{ old('body') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block font-medium text-gray-900">Select Category</label>
            <select name="category_id" id="category" class="w-full mt-1 border-gray-900/25 border focus:outline-indigo-500 p-2 rounded-md">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-span-full">
            <div class="flex gap-2">
                <label for="cover-photo" class="block font-medium text-gray-900">Thumbnail</label>
                <p class="text-red-600 text-sm">*max file size 2MB</p>
            </div>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="mt-4 flex flex-col items-center text-sm text-gray-600">
                    <label for="imageInput"
                        class="relative cursor-pointer rounded-md bg-white border border-gray-300 px-4 py-2 text-indigo-600 font-semibold hover:bg-indigo-500 hover:text-white transition-all duration-300">
                        Choose Image
                    </label>

                    <input type="file" id="imageInput" name="thumbnail" class="hidden" required>

                    <div id="filePlaceholder"
                        class="mt-2 w-full max-w-xs p-2 text-center border border-gray-300 rounded bg-gray-100 text-gray-500">
                        No file has choosen
                    </div>

                    <img id="imagePreview" class="hidden w-40 h-40 object-cover mt-4 rounded-lg">

                    <p id="fileError" class="text-red-500 text-sm hidden mt-2">File is too large! 2MB maximum.</p>
                </div>
            </div>
        </div>

        <button type="submit" class="bg-indigo-500 hover:bg-indigo-500/90 transition-all duration-300 cursor-pointer mt-3 w-full text-white px-4 py-2 rounded font-medium">
            Create Post
        </button>
    </form>

    <script>
        document.getElementById("imageInput").addEventListener("change", function (event) {
            const file = event.target.files[0];
            const preview = document.getElementById("imagePreview");
            const placeholder = document.getElementById("filePlaceholder");
            const errorText = document.getElementById("fileError");

            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    errorText.classList.remove("hidden");
                    event.target.value = "";
                    preview.src = "";
                    preview.classList.add("hidden");
                    placeholder.textContent = "Belum ada gambar dipilih";
                } else {
                    errorText.classList.add("hidden");
                    placeholder.textContent = file.name;

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.classList.remove("hidden");
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                placeholder.textContent = "Belum ada gambar dipilih";
                preview.classList.add("hidden");
            }
        });
    </script>
</x-layout>
