<x-layout>
    <x-slot:title>Edit Volume</x-slot>
    <section class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-serif text-[#6ba439] mb-8">Edit Volume</h1>

        <div class="max-w-lg border border-gray-200 rounded-lg p-8">
            <form
                method="POST"
                action="{{ route("admin.archive.update", $volume) }}"
            >
                @csrf
                @method("PUT")

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm text-gray-600 mb-1">
                        Name
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old("name", $volume->name) }}"
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
                        value="{{ old("date", $volume->date instanceof \Carbon\Carbon ? $volume->date->format("Y-m-d") : $volume->date) }}"
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
                        <!-- Hidden field ensures a value is always sent -->
                        <input type="hidden" name="isCurrent" value="0" />
                        <input
                            type="checkbox"
                            id="isCurrent"
                            name="isCurrent"
                            value="1"
                            {{ old("isCurrent", $volume->isCurrent) ? "checked" : "" }}
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
                        Save Changes
                    </button>
                    <a
                        href="{{ route("archive.volume", $volume) }}"
                        class="text-sm text-gray-500 hover:text-gray-700 transition-colors"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </section>
</x-layout>
