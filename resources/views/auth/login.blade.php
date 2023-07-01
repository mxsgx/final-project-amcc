<x-layouts.base>
    <x-slot:title>Sign In - {{ config('app.name') }}</x-slot:title>
    <div class="h-screen">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <a
                    href="{{ route('root') }}"
                    class="flex justify-center items-center py-4 space-x-2 font-extrabold text-gray-900 md:py-0"
                >
                    <span class="text-4xl text-rose-500">ABM</span>
                </a>
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                    account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('auth.login') }}" method="POST">
                    <div>
                        <label for="email" class="block text-md font-medium leading-6 text-gray-900">
                            Email address
                        </label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md @error('email') border-red-500 @else border-neutral-300 @enderror ring-offset-background placeholder:text-neutral-500 focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400 disabled:cursor-not-allowed disabled:opacity-50">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label
                                for="password"
                                class="block text-md font-medium leading-6 text-gray-900"
                            >
                                Password
                            </label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                   required
                                   class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400 disabled:cursor-not-allowed disabled:opacity-50">
                        </div>
                    </div>

                    <div>
                        @csrf
                        <button type="submit"
                                class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-rose-500 hover:bg-rose-600 focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 focus:shadow-outline focus:outline-none">
                            Sign In
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Don't have account?
                    <a href="{{ route('auth.register') }}"
                       class="relative font-semibold leading-6 text-rose-500 hover:text-rose-600 group">
                        <span>Sign up for free</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 group-hover:w-full ease-out duration-300 h-0.5 bg-rose-500"></span>
                    </a>
                </p>
                <p class="px-8 mt-1 text-sm text-center text-neutral-500">By continuing, you agree to our
                    <a class="underline underline-offset-4 hover:text-primary" href="#">Terms</a> and <a
                        class="underline underline-offset-4 hover:text-primary" href="#">Policy</a>.</p>
            </div>
        </div>
    </div>

</x-layouts.base>
