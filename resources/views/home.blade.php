<x-layout>
    <x-slot:title>Welcome</x-slot>

    <div>
        <section
            class="relative h-[600px] overflow-hidden py-16"
            style="
                background-image: url('/nla-background.png');
                background-size: cover;
                background-position: center;
            "
        >
            <div
                class="relative container mx-auto px-4 py-16 h-full flex items-center"
            >
                <div class="max-w-2xl">
                    <h2
                        class="text-5xl md:text-6xl font-serif text-white mb-6 leading-tight"
                    >
                        Trends in Libraries, Information Science and Technology
                    </h2>
                    <p class="text-white text-lg mb-8">
                        A Journal of Nigeria Library Association Enugu State
                        Chapter
                    </p>
                    <a href="{{ url("/archive") }}">
                        <button
                            class="bg-[#6ba439] hover:bg-[#5a8a2f] text-white px-8 py-6 text-base lg:text-lg flex items-center"
                        >
                            Our archive
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="ml-2 h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                                />
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <livewire:current-issue-section />
    </div>
</x-layout>
