<x-layouts.base>
    <section class="w-full px-6 pb-12 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <x-navbar/>
        </div>
    </section>

    <section class="flex items-center justify-center py-10 text-white bg-white sm:py-16 md:py-24 lg:py-32">
        <div class="relative max-w-3xl px-10 text-center text-white auto lg:px-0">
            <div class="flex flex-col w-full md:flex-row">

                <!-- Top Text -->
                <div class="flex flex-col justify-between space-y-8">
                    <h1 class="text-6xl font-extrabold text-left text-black">
                        {{ $course->title }}
                    </h1>

                    <h2 class="text-3xl font-bold text-left text-gray-500">{{ $course->subtitle }}</h2>
                </div>
            </div>

            <!-- Separator -->
            <div class="my-16 border-b border-gray-300"></div>

            <div class="text-gray-500 text-2xl text-left mb-16 lg:my-16">
                {{ $course->description }}
            </div>

            <!-- Bottom Text -->
            @if($course->lectures->count() > 0)
                <h3 class="text-3xl text-black text-left font-extrabold mb-8">Course Contents</h3>

                <div x-data="{
                    activeAccordion: '',
                    setActiveAccordion(id) {
                        this.activeAccordion = (this.activeAccordion == id) ? '' : id
                    }
                }"
                     class="text-gray-800 text-left relative w-full mx-auto overflow-hidden text-sm font-normal bg-white border border-gray-200 divide-y divide-gray-200 rounded-md mb-16">
                    @foreach($course->lectures as $lecture)
                        <div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
                            <button @click="setActiveAccordion(id)"
                                    class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline">
                                <span class="font-semibold text-sm">{{ $lecture->title }}</span>
                                <svg class="w-4 h-4 duration-200 ease-out"
                                     :class="{ 'rotate-180': activeAccordion==id }"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div x-show="activeAccordion==id" x-collapse x-cloak>
                                <div class="p-4 pt-0 opacity-70">
                                    {{ $lecture->summary }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if(Auth::user() && Auth::user()->learningCourses->doesntContain('id', '=', $course->id))
                @can('enroll', $course)
                    <form
                        action="{{ route('course.enroll', compact('course')) }}"
                        method="post"
                        class="container max-w-sm mx-auto mt-px text-left sm:max-w-md md:max-w-lg sm:px-4 md:max-w-none md:text-center mb-16">
                        <div
                            class="flex flex-col items-center justify-center mt-8 space-y-4 text-center sm:flex-row sm:space-y-0 sm:space-x-4">
                            <span class="relative inline-flex w-full md:w-auto">
                                @csrf
                                <button type="submit"
                                        class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-white bg-rose-500 border border-transparent rounded-full xl:px-10 md:w-auto hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600">
                                    Enroll Now
                                </button>
                            </span>
                        </div>
                    </form>
                @endcan
            @else
                <div
                    class="container max-w-sm mx-auto mt-px text-left sm:max-w-md md:max-w-lg sm:px-4 md:max-w-none md:text-center mb-16">
                    <div
                        class="flex flex-col items-center justify-center mt-8 space-y-4 text-center sm:flex-row sm:space-y-0 sm:space-x-4">
                <span class="relative inline-flex w-full md:w-auto">
                    <a href="{{ route('course.learn.start', compact('course')) }}"
                       class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-white bg-rose-500 border border-transparent rounded-full xl:px-10 md:w-auto hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600">
                        Start Learn
                    </a>
                </span>
                    </div>
                </div>
            @endif

            <h3 class="text-3xl text-black text-left font-extrabold mb-8">Instructors</h3>

            @foreach($course->instructors as $instructor)

                <blockquote
                    class="flex items-center justify-between w-full col-span-1 p-6 mt-4 bg-white rounded-lg shadow"
                    data-rounded="rounded-lg" data-rounded-max="rounded-full">
                    <img class="flex-shrink-0 w-24 h-24 bg-gray-300 rounded-full"
                         src="https://placehold.co/512?font=roboto&text={{ str($instructor->name)->substr(0, 1) }}"
                         alt="">
                    <div class="flex flex-col pr-10">
                        <h3 class="pl-12 mt-3 text-sm font-medium leading-5 text-gray-800 truncate sm:text-base lg:text-sm lg:text-base">
                            {{ $instructor->name }}
                        </h3>
                        <p class="mt-1 text-sm leading-5 text-gray-500 truncate"></p>
                    </div>
                </blockquote>
            @endforeach
        </div>
    </section>


    <x-footer/>
</x-layouts.base>
