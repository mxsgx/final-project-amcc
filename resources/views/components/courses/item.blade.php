@props(['course'])

<div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4" data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
    <a href="{{ route('course.view', compact('course')) }}" class="w-full">
        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
             src="{{ $course->thumbnail ?? 'https://placehold.co/1280x720' }}" alt="{{ $course->title }}">
    </a>
    <div
        class="bg-rose-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
        <span>{{ $course->categories->first()->name ?? '' }}</span>
    </div>
    <h2 class="text-lg font-bold sm:text-xl md:text-2xl"><a href="{{ route('course.view', compact('course')) }}">{{ $course->title }}</a>
    </h2>
    <p class="text-sm text-gray-500">{{ $course->subtitle }}</p>
    <p class="pt-2 text-xs font-medium"><a href="#" class="mr-1 underline">{{ $course->instructors->first()->name }}</a> · <span
            class="mx-1">{{ $course->created_at->format('F d, Y') }}</span></p>
</div>
