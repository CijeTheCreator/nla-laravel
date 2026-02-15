<section class="container mx-auto px-4 py-12">
    <a
        href="{{ url("/archive/" . $volumeId) }}"
        class="flex items-center gap-2 text-[#6ba439] hover:text-[#5a8a2f] mb-8"
    >
        {{-- Arrow Left Icon --}}
        <svg
            class="h-4 w-4"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7"
            />
        </svg>
        Back to Volume
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Main Content --}}
        <div class="lg:col-span-2">
            <h1 class="text-3xl font-serif text-black mb-4 leading-tight">
                {{ $article->name }}
            </h1>

            <p class="text-gray-700 mb-6">
                {{ implode(", ", $article->authors ?? []) }}
            </p>

            <div class="border-t border-b border-gray-200 py-4 mb-8">
                <div class="text-center">
                    <p class="text-sm font-semibold text-gray-600">Published</p>
                    <p class="text-lg text-gray-900">
                        {{ $article->publishDate }}
                    </p>
                </div>
            </div>

            {{-- PDF Viewer --}}
            <div class="bg-gray-100 rounded-lg overflow-hidden mb-8">
                <div class="w-full h-96">
                    <iframe
                        src="{{ $article->pdfUrl }}"
                        class="w-full h-full"
                        frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="lg:col-span-1">
            <div class="sticky top-4 space-y-6">
                {{-- PDF Download Button --}}
                <a
                    href="{{ $article->pdfUrl }}"
                    download
                    class="w-full flex items-center bg-[#6ba439] hover:bg-[#5a8a2f] text-white py-6 px-4 text-base rounded-lg"
                >
                    <svg
                        class="w-5 h-5 mr-2"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2m0 0v-8m0 8l-4-2m4 2l4-2"
                        />
                    </svg>
                    PDF
                    <svg
                        class="ml-auto h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"
                        />
                    </svg>
                </a>

                {{-- Stats --}}
                <div class="bg-gray-50 rounded-lg p-6 space-y-6">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Views</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $article->views }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Downloads</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $article->downloads }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
