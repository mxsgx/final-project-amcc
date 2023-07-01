<section class="w-full px-8 text-gray-700 bg-white">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 px-2 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="{{ route('admin.root') }}"
               class="flex items-center mb-5 font-medium text-rose-500 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-xl font-black leading-none text-rose-500 select-none">ABM Admin</span>
            </a>
            <nav
                class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200 space-x-6">
                <a href="{{ config('app.url') }}"
                   class="font-medium leading-6 text-gray-600 hover:text-rose-500">Home</a>
                <a href="{{ route('admin.users.index') }}"
                   class="font-medium leading-6 @if(request()->routeIs('admin.users.index', 'admin.users.create', 'admin.users.edit')) text-rose-500 @else text-gray-600 @endif hover:text-rose-500">Users</a>
                <a href="{{ route('admin.categories.index') }}"
                   class="font-medium leading-6 @if(request()->routeIs('admin.categories.index', 'admin.categories.create', 'admin.categories.edit')) text-rose-500 @else text-gray-600 @endif hover:text-rose-500">Category</a>
            </nav>
        </div>

        <div class="inline-flex items-center lg:justify-end">
            <form id="logout" action="{{ route('auth.logout') }}" method="post" class="none">
                @csrf
            </form>
            <a href="{{ route('auth.logout') }}"
               onclick="event.preventDefault();document.querySelector('#logout').submit();"
               class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-rose-500 border border-transparent rounded-md shadow-sm hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600"
               data-rounded="rounded-md" data-primary="rose-600">
                Sign Out
            </a>
        </div>
    </div>
</section>
