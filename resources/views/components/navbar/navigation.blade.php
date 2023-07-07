<a
    href="#"
    class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden"
>
    <span class="text-3xl text-rose-500">{{ config('app.name') }}</span>
</a>
<div
    class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center"
>
    <a
        href="{{ route('root') }}"
        class="inline-block w-full py-2 mx-0 ml-6 font-medium text-left text-black md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center"
    >Home</a
    >
    <a
        href="#"
        class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-black lg:mx-3 md:text-center"
    >Blog</a
    >
    <a
        href="{{ route('courses.index') }}"
        class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-black lg:mx-3 md:text-center"
    >Browse Courses</a
    >
    <a
        href="#"
        class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-black lg:mx-3 md:text-center"
    >Help</a
    >
    @auth
        @hasanyrole([\App\Enums\UserRole::SuperAdmin, \App\Enums\UserRole::Admin])
        <a
            href="{{ route('admin.root') }}"
            class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-black lg:mx-3 md:text-center"
        >
            Admin
        </a>
        @endhasanyrole
        <a
            href="{{ route('my-courses') }}"
            class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-black lg:mx-3 md:text-center"
        >
            My Courses
        </a>
    @endauth
</div>
