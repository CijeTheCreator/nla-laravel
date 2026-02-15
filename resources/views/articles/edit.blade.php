<x-layout>
    <x-slot:title>Edit Article</x-slot>
    <section class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-serif text-[#6ba439] mb-12">Edit Article</h1>

        <form
            method="POST"
            action="/admin/article/{{ $article["id"] }}/edit"
            class="max-w-2xl space-y-8"
        >
            @csrf
            @method("PUT")

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm text-gray-600 mb-1">
                    Article Title
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old("name", $article->name) }}"
                    class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors @error('name') border-red-400 @else border-gray-200 @enderror"
                    required
                />
                @error("name")
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="volume_id" class="block text-sm text-gray-600 mb-1">
                    Volume
                </label>
                <select
                    id="volume_id"
                    name="volume_id"
                    class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors @error('volume_id') border-red-400 @else border-gray-200 @enderror"
                    required
                >
                    <option value="" disabled selected>Select a volume</option>
                    @foreach ($volumes as $volume)
                        <option
                            value="{{ old("volume_id", $volume->id) }}"
                            {{ old("volume_id") == $volume->id ? "selected" : "" }}
                        >
                            {{ $volume->name }}
                        </option>
                    @endforeach
                </select>
                @error("volume_id")
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Authors --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">
                    Authors
                    <span class="text-gray-400 font-normal ml-1">
                        (one per line)
                    </span>
                </label>
                <textarea
                    id="authors"
                    name="authors"
                    rows="4"
                    placeholder="Jane Smith&#10;John Doe"
                    class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors resize-none @error('authors') border-red-400 @else border-gray-200 @enderror"
                    required
                >
{{ old("authors", implode("\n", $article->authors ?? [])) }}</textarea
                >
                @error("authors")
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Pages & Publish Date (side by side) --}}
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="pages" class="block text-sm text-gray-600 mb-1">
                        Pages
                    </label>
                    <input
                        type="text"
                        id="pages"
                        name="pages"
                        placeholder="1–12"
                        value="{{ old("pages", $article->pages) }}"
                        class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors @error('pages') border-red-400 @else border-gray-200 @enderror"
                        required
                    />
                    @error("pages")
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label
                        for="publishDate"
                        class="block text-sm text-gray-600 mb-1"
                    >
                        Publish Date
                    </label>
                    <input
                        type="date"
                        id="publishDate"
                        name="publishDate"
                        value="{{ old("publishDate", $article->publishDate) }}"
                        class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors @error('publishDate') border-red-400 @else border-gray-200 @enderror"
                        required
                    />
                    @error("publishDate")
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- PDF URL --}}
            <div>
                <label for="pdfUrl" class="block text-sm text-gray-600 mb-1">
                    PDF URL
                </label>
                <input
                    type="url"
                    id="pdfUrl"
                    name="pdfUrl"
                    placeholder="https://example.com/article.pdf"
                    value="{{ old("pdfUrl", $article->pdfUrl) }}"
                    class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors @error('pdfUrl') border-red-400 @else border-gray-200 @enderror"
                />
                @error("pdfUrl")
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Stats (read-only) --}}
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm text-gray-600 mb-1">
                        Views
                    </label>
                    <input
                        type="number"
                        name="views"
                        value="{{ old("views", $article->views) }}"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-gray-400 bg-gray-50 cursor-not-allowed"
                        readonly
                    />
                </div>
                <div>
                    <label class="block text-sm text-gray-600 mb-1">
                        Downloads
                    </label>
                    <input
                        type="number"
                        name="downloads"
                        value="{{ old("downloads", $article->downloads) }}"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-gray-400 bg-gray-50 cursor-not-allowed"
                        readonly
                    />
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-4 pt-4 border-t border-gray-200">
                <button
                    type="submit"
                    class="border border-[#6ba439] text-[#6ba439] rounded-lg px-6 py-2 text-sm font-medium hover:bg-[#6ba439] hover:text-white transition-all"
                >
                    Save Changes
                </button>
                <a
                    href="{{ url("archive/" . $article["volume_id"] . "/" . $article["id"]) }}"
                    class="text-sm text-gray-500 hover:text-gray-700 transition-colors"
                >
                    Cancel
                </a>
            </div>
        </form>
    </section>
</x-layout>
