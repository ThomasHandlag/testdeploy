<x-layout>
    <div class="mx-4">
        <x-card class="p-10 max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Log In
                </h2>
                <p class="mb-4">Log in to post notes</p>
            </header>

            <form method="POST" action="/users/auth">
                @csrf
                <div class="mb-6">
                    <label for="username" class="inline-block text-lg mb-2">Username</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="username"
                        value="{{ old('username') }}" />
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">Password</label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">
                        Log In
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Don't have an account?
                        <a href="/register" class="text-blue-500 hover:underline">
                            Register
                        </a>
                    </p>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>