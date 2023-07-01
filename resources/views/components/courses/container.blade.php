<div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">
    {{ $featured ?? '' }}

    <div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">
        {{ $slot }}
    </div>
</div>
