<header class="sticky top-0 z-50 border-b border-gray-200 bg-white">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <a
            href="/"
            class="flex items-center gap-3 hover:opacity-80 transition-opacity"
        >
            <img src="/nla-logo.png" alt="NLA Logo" class="h-12" />
            <h1 class="text-lg font-normal text-foreground">
                Nigerian Library Association Enugu State Chapter
            </h1>
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden md:flex items-center gap-8">
            @if ($currentVolume)
                <a
                    href="{{ url("/archive/" . $currentVolume["id"]) }}"
                    class="text-sm text-foreground hover:text-[#6ba439]"
                >
                    Current
                </a>
            @endif

            <a
                href="/archive"
                class="text-sm text-foreground hover:text-[#6ba439]"
            >
                Archive
            </a>
            <a
                href="/note-to-authors"
                class="text-sm text-foreground hover:text-[#6ba439]"
            >
                Note to Authors
            </a>
            <a
                href="/editorial-team"
                class="text-sm text-foreground hover:text-[#6ba439]"
            >
                Editorial Team
            </a>
            <a
                href="/contact"
                class="text-sm text-foreground hover:text-[#6ba439]"
            >
                Contact
            </a>

            @auth
                <form method="POST" action="/logout">
                    @csrf
                    <button
                        type="submit"
                        class="text-sm text-foreground hover:text-[#6ba439]"
                    >
                        Log Out
                    </button>
                </form>
            @endauth

            @guest
                <a
                    href="/login"
                    class="text-sm text-foreground hover:text-[#6ba439]"
                >
                    Sign in as Admin
                </a>
            @endguest
        </nav>

        {{-- Mobile Menu Button --}}
        <button
            class="md:hidden p-2 text-foreground hover:text-[#6ba439]"
            aria-label="Toggle menu"
        >
            ☰
        </button>
    </div>
</header>
