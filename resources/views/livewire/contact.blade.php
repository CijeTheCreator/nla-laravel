<section class="container mx-auto px-4 py-12">
    <a
        href="{{ url("/") }}"
        class="flex items-center gap-2 text-[#6ba439] hover:text-[#5a8a2f] mb-8"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7"
            />
        </svg>
        Back to Home
    </a>

    <article class="max-w-3xl">
        <h1 class="text-4xl font-serif text-[#6ba439] mb-8">Contact Us</h1>

        <div class="prose prose-lg max-w-none text-gray-700 space-y-6">
            <p>
                We would love to hear from you. Whether you have questions about
                the journal, wish to submit a manuscript, or would like to get
                involved with the Trends in Libraries, Information Science and
                Technology journal, please don't hesitate to reach out.
            </p>

            <h2 class="text-2xl font-serif text-[#6ba439] mt-8 mb-4">
                Contact Information
            </h2>

            <div class="bg-gray-50 p-6 rounded-lg space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-2">
                        Contact Address
                    </h3>
                    <p>
                        The Editor-in-Chief
                        <br />
                        Enugu State University of Science and Technology,
                        Library,
                        <br />
                        Enugu State, Nigeria
                        <br />
                        Tel: +2348033555811
                        <br />
                        Email:
                        <a
                            href="mailto:editortlist@gmail.com"
                            class="text-[#6ba439] hover:underline"
                        >
                            editortlist@gmail.com
                        </a>
                    </p>
                </div>
            </div>

            <h2 class="text-2xl font-serif text-[#6ba439] mt-8 mb-4">
                Quick Links
            </h2>
            <ul class="list-disc list-inside space-y-2">
                <li>
                    <a
                        href="{{ url("/note-to-authors") }}"
                        class="text-[#6ba439] hover:underline"
                    >
                        Note to Authors
                    </a>
                </li>
                <li>
                    <a
                        href="{{ url("/archive") }}"
                        class="text-[#6ba439] hover:underline"
                    >
                        Journal Archive
                    </a>
                </li>
                <li>
                    <a
                        href="{{ url("/editorial-team") }}"
                        class="text-[#6ba439] hover:underline"
                    >
                        Editorial Team
                    </a>
                </li>
            </ul>

            <p class="text-sm text-gray-600 mt-8">
                We typically respond to inquiries within 2-3 business days.
            </p>
        </div>
    </article>
</section>
