<x-layouts.base>
    <x-admin.navbar/>

    <div class="container px-2 py-5 mx-auto max-w-7xl">
        <div class="flex justify-between py-8">
            <h3 class="font-bold text-2xl">Manage Users</h3>
            <div>
                <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-rose-500 border border-transparent rounded-md shadow-sm hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600">Add User</a>
            </div>
        </div>
        <div class="flex flex-col space-y-4">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden border rounded-lg">
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead>
                            <tr class="text-neutral-900 bg-gray-100">
                                <th class="px-5 py-4 text-sm font-bolder text-left uppercase">Name</th>
                                <th class="px-5 py-4 text-sm font-bolder text-left uppercase">Email</th>
                                <th class="px-5 py-4 text-sm font-bolder text-left uppercase">Roles</th>
                                <th class="px-5 py-4 text-sm font-bolder text-right uppercase">Action</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                            @foreach($users as $user)
                                <tr class="text-neutral-800 hover:bg-gray-100">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $user->roles->map(fn($role) => str($role->name)->replace('-', ' ')->title())->join(', ') }}</td>
                                    <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap space-x-4">
                                        @can('update', $user)
                                            <a class="text-rose-500 hover:text-rose-600"
                                               href="{{ route('admin.users.edit', compact('user')) }}">Edit</a>
                                        @endcan
                                        @can('delete', $user)
                                            <div x-data="{ modalOpen: false }"
                                                 @keydown.escape.window="modalOpen = false"
                                                 :class="{ 'z-40': modalOpen }" class="inline-block relative w-auto h-auto">
                                                <button @click="modalOpen=true"
                                                        class="text-rose-500 hover:text-rose-600">
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
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{ $users->links() }}
        </div>
    </div>

    <x-footer/>
</x-layouts.base>
