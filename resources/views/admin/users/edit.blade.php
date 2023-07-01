<x-layouts.base>
    <x-admin.navbar/>

    <div class="container px-2 py-5 mx-auto max-w-7xl">
        <div class="flex justify-between py-8">
            <h3 class="font-bold text-2xl">Edit User</h3>
        </div>
        <form action="{{ route('admin.users.update', compact('user')) }}" method="post">
            @method('PATCH')
            @csrf

            <div class="space-y-12">

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be
                        careful what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" autocomplete="given-name" required
                                       value="{{ $user->name }}"
                                       class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md @error('name') border-red-500 @else border-neutral-300 @enderror ring-offset-background placeholder:text-neutral-500 focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400 disabled:cursor-not-allowed disabled:opacity-50">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                       value="{{ $user->email }}"
                                       class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md @error('email') border-red-500 @else border-neutral-300 @enderror ring-offset-background placeholder:text-neutral-500 focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400 disabled:cursor-not-allowed disabled:opacity-50">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Roles and Permissions</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This section will give user role or permissions.</p>

                    <div class="mt-10 space-y-10">
                        <fieldset>
                            <legend class="text-sm font-semibold leading-6 text-gray-900">By Roles</legend>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Each role have set of permissions.</p>
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="admin-role" name="role" type="radio" required
                                               @checked($user->hasRole(\App\Enums\UserRole::Admin))
                                               value="{{ \App\Enums\UserRole::Admin }}"
                                               class="h-4 w-4 rounded-full border-gray-300 text-rose-500 focus:ring-rose-500">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="admin-role" class="font-medium text-gray-900">Admin</label>
                                        <p class="text-gray-500">Manage all resources</p>
                                    </div>
                                </div>
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="instructor-role" name="role" type="radio" required
                                               @checked($user->hasRole(\App\Enums\UserRole::Instructor))
                                               value="{{ \App\Enums\UserRole::Instructor }}"
                                               class="h-4 w-4 rounded-full border-gray-300 text-rose-500 focus:ring-rose-500">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="instructor-role"
                                               class="font-medium text-gray-900">Instructor</label>
                                        <p class="text-gray-500">Can create courses.</p>
                                    </div>
                                </div>
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="student-role" name="role" type="radio" required
                                               @checked($user->hasRole(\App\Enums\UserRole::Student))
                                               value="{{ \App\Enums\UserRole::Student }}"
                                               class="h-4 w-4 rounded-full border-gray-300 text-rose-500 focus:ring-rose-500">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="student-role" class="font-medium text-gray-900">Student</label>
                                        <p class="text-gray-500">Can learn courses.</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('admin.users.index') }}"
                   class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-rose-500 border border-transparent rounded-md shadow-sm hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600">
                    Save
                </button>
            </div>
        </form>
    </div>

    <x-footer/>
</x-layouts.base>
