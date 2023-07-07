<x-layouts.base>
    <x-admin.navbar/>

    <div class="container px-2 py-5 mx-auto max-w-7xl">
        <div class="flex justify-between py-8">
            <h3 class="font-bold text-2xl">Create Category</h3>
        </div>
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf

            <div class="space-y-12">

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Category</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Category information.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" required
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
                                    ></textarea>
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
                <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Reset</button>
                <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-rose-500 border border-transparent rounded-md shadow-sm hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600">
                    Save
                </button>
            </div>
        </form>
    </div>

    <x-footer/>
</x-layouts.base>
