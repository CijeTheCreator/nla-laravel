<section class="container mx-auto px-4 py-12">
    <div class="flex items-center justify-between mb-12">
        <h1 class="text-4xl font-serif text-[#6ba439]">Journal Archive</h1>
        @auth
            <a
                href="{{ route("admin.archive.create") }}"
                class="px-4 py-2 bg-[#6ba439] text-white rounded-lg hover:bg-[#5a9030] transition-colors"
            >
                + New Volume
            </a>
        @endauth
    </div>

    @if ($volumes->isEmpty())
        <div class="text-center py-12">
            <p class="text-xl text-gray-600 mb-4">
                No volumes available at this time
            </p>
            <p class="text-gray-500">
                Please check back later for new journal volumes.
            </p>
        </div>
    @else
        <div class="space-y-6">
            @foreach ($volumes as $volume)
                <div
                    class="block p-6 border border-gray-200 rounded-lg hover:shadow-lg hover:border-[#6ba439] transition-all"
                >
                    <a
                        href="{{ route("archive.volume", $volume) }}"
                        class="flex items-center justify-between"
                    >
                        <div>
                            <h2 class="text-2xl font-serif text-[#6ba439] mb-2">
                                {{ $volume["name"] }} - {{ $volume["date"] }}
                            </h2>
                            <p class="text-gray-600">
                                {{ count($volume["articles"]) }} article(s)
                            </p>
                        </div>
                        <svg
                            class="h-6 w-6 text-[#6ba439]"
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

                    @auth
                        <div
                            class="mt-4 pt-4 border-t border-gray-100 space-y-2"
                        >
                            <div class="flex items-center justify-end text-sm">
                                <div class="flex gap-3">
                                    <a
                                        href="{{ route("admin.archive.edit", $volume) }}"
                                        class="text-blue-500 hover:text-blue-700 transition-colors"
                                    >
                                        Edit
                                    </a>
                                    <form
                                        action="{{ url("/admin/archive/" . $volume["id"] . "/delete") }}"
                                        method="POST"
                                        onsubmit="
                                            return confirm(
                                                'Delete this article?',
                                            );
                                        "
                                        class="inline"
                                    >
                                        @csrf
                                        @method("DELETE")
                                        <button
                                            type="submit"
                                            class="text-red-500 hover:text-red-700 transition-colors"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            @endforeach
        </div>
    @endif
</section>
