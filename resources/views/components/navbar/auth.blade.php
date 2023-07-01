<div
    class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0"
>
    @auth
        @hasanyrole([\App\Enums\UserRole::SuperAdmin, \App\Enums\UserRole::Admin])
        <a
            href="{{ route('admin.root') }}"
            class="w-full px-6 py-2 mr-0 text-gray-700 md:px-3 md:mr-2 lg:mr-3 md:w-auto"
        >
            Admin
        </a>
        @endhasanyrole
        <a
            href="{{ route('my-courses') }}"
            class="w-full px-6 py-2 mr-0 text-gray-700 md:px-3 md:mr-2 lg:mr-3 md:w-auto"
        >
            My Courses
        </a>
        <form class="none" method="post" action="{{ route('auth.logout') }}" id="logout">@csrf</form>
        <a
            href="{{ route('auth.logout') }}" ]
            onclick="event.preventDefault();document.querySelector('#logout').submit();"
            type="submit"
            class="inline-flex items-center w-full px-5 px-6 py-3 text-sm font-medium leading-4 text-white bg-rose-500 md:w-auto md:rounded-full hover:bg-rose-600 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-rose-600"
        >
            Sign Out
        </a>
    @else
        <a
            href="{{ route('auth.login') }}"
            class="w-full px-6 py-2 mr-0 text-gray-700 md:px-3 md:mr-2 lg:mr-3 md:w-auto"
        >
            Sign In
        </a>
        <a
            href="{{ route('auth.register') }}"
            class="inline-flex items-center w-full px-5 px-6 py-3 text-sm font-medium leading-4 text-white bg-rose-500 md:w-auto md:rounded-full hover:bg-rose-600 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-rose-600"
        >
            Sign Up
        </a>
    @endauth
</div>
