<section class="container mx-auto px-4 py-12">
    <div class="flex items-center justify-between mb-12">
        <h1 class="text-4xl font-serif text-[#6ba439]">Journal Articles</h1>
        @if (auth()->check())
            <a
                href="{{ url("admin/article/create") }}"
                class="px-4 py-2 bg-[#6ba439] text-white rounded-lg hover:bg-[#5a9030] transition-colors"
            >
                + New Article
            </a>
        @endif
    </div>

    @if ($articles->isEmpty())
        <div class="text-center py-12">
            <p class="text-xl text-gray-600 mb-4">
                No articles available at this time
            </p>
            <p class="text-gray-500">
                Please check back later for new journal articles.
            </p>
        </div>
    @else
        <div class="space-y-6">
            @foreach ($articles as $article)
                <div
                    class="block p-6 border border-gray-200 rounded-lg hover:shadow-lg hover:border-[#6ba439] transition-all"
                >
                    <a
                        href="{{ url("/archive/" . $volume["id"] . "/" . $article["id"]) }}"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <h2
                                    class="text-2xl font-serif text-[#6ba439] mb-2"
                                >
                                    {{ $article["name"] }}
                                </h2>
                                <p class="text-gray-600">
                                    {{ implode(", ", $article["authors"]) }}
                                </p>
                                <p class="text-gray-600">
                                    Pages {{ $article["pages"] }}
                                </p>
                            </div>
                            <svg
                                class="h-6 w-6 text-[#6ba439]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                ></path>
                            </svg>
                        </div>
                    </a>

                    @if (auth()->check())
                        <div
                            class="flex gap-3 mt-4 pt-4 border-t border-gray-100 items-center justify-end"
                        >
                            <a
                                href="{{ url("/admin/article/" . $article["id"] . "/edit") }}"
                                class="text-sm text-blue-500 hover:text-blue-700 transition-colors"
                            >
                                Edit
                            </a>
                            <form
                                action="{{ url("/admin/article/" . $article["id"] . "/delete") }}"
                                method="POST"
                                onsubmit="
                                    return confirm('Delete this article?');
                                "
                                class="inline"
                            >
                                @csrf
                                @method("DELETE")
                                <button
                                    type="submit"
                                    class="text-sm text-red-500 hover:text-red-700 transition-colors"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</section>
