<x-layouts.base>
    <section class="w-full px-6 pb-12 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <x-navbar/>
        </div>
    </section>

    <section class="h-auto bg-white">
        <div class="max-w-7xl mx-auto py-16 px-10 sm:py-24 sm:px-6 lg:px-8 sm:text-center">
            <h2 class="text-base font-semibold text-rose-600 tracking-wide uppercase">let's learn</h2>
            <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">Courses</p>
            <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-500">Don't waste much time, just enroll this courses as
                much as you can</p>
        </div>
    </section>

    <section>
        <x-courses.container>
            @foreach($courses as $course)
                @if($loop->first)
                    <x-slot:featured>
                        <x-courses.featured
                            :course="$course"
                        />
                    </x-slot:featured>
                @else
                    <x-courses.item :course="$course"/>
                @endif
            @endforeach
        </x-courses.container>
        <div class="w-full border-t px-8 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">
            {{ $courses->links() }}
        </div>
    </section>

    <x-footer/>
</x-layouts.base>
