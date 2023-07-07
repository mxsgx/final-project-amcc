<x-layouts.base>
    <x-admin.navbar/>

    <div class="container px-2 py-5 mx-auto max-w-7xl">
        <div class="flex justify-between py-8">
            <h3 class="font-bold text-2xl">Edit Category</h3>
        </div>
        <form action="{{ route('admin.categories.update', compact('category')) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="space-y-12">

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Category</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Category information.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" required
                                       value="{{ $category->name }}"
                                       class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md @error('name') border-red-500 @else border-neutral-300 @enderror ring-offset-background placeholder:text-neutral-500 focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400 disabled:cursor-not-allowed disabled:opacity-50">
                                @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                            <div class="mt-2">
                                <input type="text" name="slug" id="slug"
                                       value="{{ $category->slug }}"
                                       class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md @error('slug') border-red-500 @else border-neutral-300 @enderror ring-offset-background placeholder:text-neutral-500 focus:border-rose-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400 disabled:cursor-not-allowed disabled:opacity-50">
                                @error('slug')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="description"
                                   class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <div class="w-full">
                                    <textarea x-data="{
                                                resize () {
                                                    $el.style.height = '0px';
                                                    $el.style.height = $el.scrollHeight + 'px'
                                                }
                                            }"
                                              id="description"
                                              x-init="resize()"
                                              @input="resize()"
                                              type="text"
                                              placeholder="Type your message here. I will resize based on the height content."
                                              class="flex w-full h-auto min-h-[80px] px-3 py-2 text-sm bg-white border rounded-md @error('description') border-red-500 @else border-neutral-300 @enderror ring-offset-background placeholder:text-neutral-400 focus:border-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 disabled:cursor-not-allowed disabled:opacity-50"
                                    >{{ $category->description }}</textarea>
                                </div>
                                @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('admin.categories.index') }}"
                   class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                @can('delete', $category)
                    <div x-data="{ modalOpen: false }"
                         @keydown.escape.window="modalOpen = false"
                         :class="{ 'z-40': modalOpen }" class="inline-block relative w-auto h-auto">
                        <button type="button" @click="modalOpen=true"
                                class="text-sm font-semibold leading-6 text-rose-500">
                            Delete
                        </button>
                        <template x-teleport="body">
                            <form action="{{ route('admin.categories.delete', compact('category')) }}"
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
                                            Delete {{ $category->name }}
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
                                        <p>Are you sure want to delete this category? Any relation
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
