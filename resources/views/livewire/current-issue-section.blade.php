<section class="container mx-auto px-4 py-12">
    @if (! $volume)
        No Issues yet
    @else
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-3xl font-normal text-[#6ba439]">
                Current Issue: {{ $currentIssue["name"] }} -
                {{ $currentIssue["date"] }}
            </h3>
            <a
                href="{{ route("archive.volume", $currentIssue) }}"
                class="flex items-center gap-2 text-[#6ba439] hover:text-[#5a8a2f] font-medium"
            >
                View Articles
                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />
                </svg>
            </a>
        </div>
    @endif

    @if (! $volume)
        <div class="text-center py-12">
            <p class="text-xl text-gray-600 mb-4">
                No articles available in the current issue
            </p>
            <p class="text-gray-500">
                Articles are being prepared for publication.
            </p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($currentIssue["articles"] as $article)
                <div
                    class="hover:shadow-lg transition-shadow border rounded-lg p-6"
                >
                    <div class="mb-4">
                        <h4 class="text-xl text-balance">
                            {{ $article->name }}
                        </h4>
                        <p class="text-sm">
                            {{ implode(", ", $article->authors) }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">
                            Pages {{ $article["pages"] }}
                        </span>
                        <a
                            href="{{ route("archive.article", ["volumeId" => $currentIssue["id"], "articleId" => $article["id"]]) }}"
                        >
                            <span
                                class="text-[#6ba439] hover:text-[#5a8a2f] p-0 inline-flex items-center"
                            >
                                Read more
                                <svg
                                    class="ml-1 h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    @endif
</section>
