<x-layout>
    <x-slot:title>Create Volume</x-slot>
    <section class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-serif text-[#6ba439] mb-8">Create Volume</h1>

        <div class="max-w-lg border border-gray-200 rounded-lg p-8">
            <form method="POST" action="/admin/archive/create">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm text-gray-600 mb-1">
                        Name
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old("name") }}"
                        class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors @error('name') border-red-400 @else border-gray-200 @enderror"
                        required
                    />
                    @error("name")
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date -->
                <div class="mb-6">
                    <label for="date" class="block text-sm text-gray-600 mb-1">
                        Date
                    </label>
                    <input
                        type="date"
                        id="date"
                        name="date"
                        value="{{ old("date") }}"
                        class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors @error('date') border-red-400 @else border-gray-200 @enderror"
                        required
                    />
                    @error("date")
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Current -->
                <div class="mb-8">
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="isCurrent"
                            name="isCurrent"
                            class="w-4 h-4 accent-[#6ba439] cursor-pointer"
                            {{ old("isCurrent") ? "checked" : "" }}
                        />
                        <label
                            for="isCurrent"
                            class="ml-2 text-sm text-gray-600 cursor-pointer"
                        >
                            Mark as current volume
                        </label>
                    </div>
                    @error("isCurrent")
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-4">
                    <button
                        type="submit"
                        class="border border-[#6ba439] text-[#6ba439] rounded-lg px-6 py-2 text-sm font-medium hover:bg-[#6ba439] hover:text-white transition-all"
                    >
                        Create Volume
                    </button>
                    <a
                        href="{{ "/archive" }}"
                        class="text-sm text-gray-500 hover:text-gray-700 transition-colors"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </section>
</x-layout>
