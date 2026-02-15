<section class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-serif text-[#6ba439] mb-12">Journal Archive</h1>

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
                <a
                    href="{{ url("/archive/" . $volume["id"]) }}"
                    class="block p-6 border border-gray-200 rounded-lg hover:shadow-lg hover:border-[#6ba439] transition-all"
                >
                    <div class="flex items-center justify-between">
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
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</section>
