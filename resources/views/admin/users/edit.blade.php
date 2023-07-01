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
                                @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                       value="{{ $user->email }}"
                                       class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md @error('email') border-red-500 @else border-neutral-300 @enderror ring-offset-background placeholder:text-neutral-500 focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400 disabled:cursor-not-allowed disabled:opacity-50">
                                @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Roles and Permissions</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This section will give user role or permissions.</p>

                    @error('role')
                    <span class="text-red-500 text-sm my-4">{{ $message }}</span>
                    @enderror

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
                @can('delete', $user)
                    <div x-data="{ modalOpen: false }"
                         @keydown.escape.window="modalOpen = false"
                         :class="{ 'z-40': modalOpen }" class="inline-block relative w-auto h-auto">
                        <button type="button" @click="modalOpen=true"
                                class="text-sm font-semibold leading-6 text-rose-500">
                            Delete
                        </button>
                        <template x-teleport="body">
                            <form action="{{ route('admin.users.delete', compact('user')) }}"
                                  method="post" x-show="modalOpen"
                                  class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                  x-cloak>
                                <div x-show="modalOpen"
                                     x-transition:enter="ease-out duration-300"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     x-transition:leave="ease-in duration-300"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     @click="modalOpen=false"
                                     class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-70"></div>
                                <div x-show="modalOpen"
                                     x-trap.inert.noscroll="modalOpen"
                                     x-transition:enter="ease-out duration-300"
                                     x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave="ease-in duration-200"
                                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                                     class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg">
                                    <div class="flex items-center justify-between pb-3">
                                        <h3 class="text-lg font-semibold">
                                            Delete {{ $user->name }}
                                            ?</h3>
                                        <button @click="modalOpen=false"
                                                class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                            <svg class="w-5 h-5"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="relative w-auto pb-8">
                                        @csrf
                                        @method('DELETE')
                                        <p>Are you sure want to delete this user? Any relation
                                            to
                                            this data will removed!</p>
                                    </div>
                                    <div
                                        class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                        <button @click="modalOpen=false" type="button"
                                                class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2">
                                            Cancel
                                        </button>
                                        <button @click="modalOpen=false" type="submit"
                                                class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 bg-red-500 hover:bg-red-600">
                                            Delete Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </template>
                    </div>
                @endcan
                <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-rose-500 border border-transparent rounded-md shadow-sm hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600">
                    Save
                </button>
            </div>
        </form>
    </div>

    <x-footer/>
</x-layouts.base>
