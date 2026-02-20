<x-layout>
    <x-slot:title>Sign In</x-slot>
    <section
        class="container mx-auto px-4 py-12 min-h-[calc(100vh-16rem)] flex items-center justify-center"
    >
        <div class="w-full max-w-md">
            <h1 class="text-4xl font-serif text-[#6ba439] mb-8 text-center">
                Admin Sign In
            </h1>

            <div class="border border-gray-200 rounded-lg p-8">
                <form method="POST" action="{{ route("login.attempt") }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-6">
                        <label
                            for="email"
                            class="block text-sm text-gray-600 mb-1"
                        >
                            Email
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="mail@example.com"
                            value="{{ old("email") }}"
                            class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors @error('email') border-red-400 @else border-gray-200 @enderror"
                            required
                            autofocus
                        />
                        @error("email")
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label
                            for="password"
                            class="block text-sm text-gray-600 mb-1"
                        >
                            Password
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            class="w-full border rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-[#6ba439] transition-colors @error('password') border-red-400 @else border-gray-200 @enderror"
                            required
                        />
                        @error("password")
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center mb-8">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            class="w-4 h-4 accent-[#6ba439] cursor-pointer"
                        />
                        <label
                            for="remember"
                            class="ml-2 text-sm text-gray-600 cursor-pointer"
                        >
                            Remember me
                        </label>
                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="w-full border border-[#6ba439] text-[#6ba439] rounded-lg px-6 py-2 text-sm font-medium hover:bg-[#6ba439] hover:text-white transition-all"
                    >
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layout>
