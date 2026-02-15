<header className="sticky top-0 z-50 border-b border-gray-200 bg-white">
    <div
        className="container mx-auto px-4 py-4 flex items-center justify-between"
    >
        <a
            href="/"
            className="flex items-center gap-3 hover:opacity-80 transition-opacity"
        >
            <img src="/nla-logo.png" alt="NLA Logo" className="h-12" />
            <h1 className="text-lg font-normal text-foreground">
                Nigerian Library Association Enugu State Chapter
            </h1>
        </a>

        {{-- {/* Desktop Navigation */} --}}
        <nav className="hidden md:flex items-center gap-8">
            <a
                href="#"
                className="text-sm text-foreground hover:text-[#6ba439]"
            >
                Current
            </a>
            <a
                href="/archive"
                className="text-sm text-foreground hover:text-[#6ba439]"
            >
                Archive
            </a>
            <a
                href="/note-to-authors"
                className="text-sm text-foreground hover:text-[#6ba439]"
            >
                Note to Authors
            </a>
            <a
                href="/editorial-team"
                className="text-sm text-foreground hover:text-[#6ba439]"
            >
                Editorial Team
            </a>
            <a
                href="/contact"
                className="text-sm text-foreground hover:text-[#6ba439]"
            >
                Contact
            </a>
        </nav>

        {{-- {/* Mobile Menu Button */} --}}
        <button
            onClick="{toggleMenu}"
            className="md:hidden p-2 text-foreground hover:text-[#6ba439]"
            aria-label="Toggle menu"
        >
            <div>X</div>
            {{-- {isMenuOpen ? <X size={24} /> : <Menu size={24} />} --}}
        </button>
    </div>
</header>
