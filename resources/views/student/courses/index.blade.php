<x-layouts.base>
    <section class="w-full px-6 pb-12 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <x-navbar/>
        </div>
    </section>

    <section class="h-auto bg-white">
        <div class="max-w-7xl mx-auto py-16 px-10 sm:py-24 sm:px-6 lg:px-8 sm:text-center">
            <h2 class="text-base font-semibold text-rose-600 tracking-wide uppercase">let's see</h2>
            <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">My
                Courses</p>
            <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-500">Your enrolled courses progress goes here</p>
        </div>
    </section>

    <section>
        <x-courses.container>
            @foreach(Auth::user()->learningCourses as $course)
                <x-courses.item :course="$course"/>
            @endforeach
        </x-courses.container>
    </section>

    <x-footer/>
</x-layouts.base>
