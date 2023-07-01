<x-layouts.base>
    <section class="w-full px-6 pb-12 antialiased bg-white">
        <div class="mx-auto max-w-7xl">
            <nav class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
                <div
                    class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0"
                >
                    <div class="flex items-center justify-start w-1/4 h-full pr-4">
                        <a
                            href="{{ route('root') }}"
                            class="flex items-center py-4 space-x-2 font-extrabold text-gray-900 md:py-0"
                        >
                            <span class="text-4xl text-rose-500">ABM</span>
                        </a>
                    </div>
                    <div
                        class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                        :class="{'flex fixed': showMenu, 'hidden': !showMenu }"
                    >
                        <div
                            class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row"
                        >
                            <a
                                href="#"
                                class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden"
                            >
                                <svg
                                    class="w-auto h-5"
                                    viewBox="0 0 355 99"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                >
                                    <defs>
                                        <path
                                            d="M119.1 87V66.4h19.8c34.3 0 34.2-49.5 0-49.5-11 0-22 .1-33 .1v70h13.2zm19.8-32.7h-19.8V29.5h19.8c16.8 0 16.9 24.8 0 24.8zm32.6-30.5c0 9.5 14.4 9.5 14.4 0s-14.4-9.5-14.4 0zM184.8 87V37.5h-12.2V87h12.2zm22.8 0V61.8c0-7.5 5.1-13.8 12.6-13.8 7.8 0 11.9 5.7 11.9 13.2V87h12.2V61.1c0-15.5-9.3-24.2-20.9-24.2-6.2 0-11.2 2.5-16.2 7.4l-.8-6.7h-10.9V87h12.1zm72.1 1.3c7.5 0 16-2.6 21.2-8l-7.8-7.7c-2.8 2.9-8.7 4.6-13.2 4.6-8.6 0-13.9-4.4-14.7-10.5h38.5c1.9-20.3-8.4-30.5-24.9-30.5-16 0-26.2 10.8-26.2 25.8 0 15.8 10.1 26.3 27.1 26.3zM292 56.6h-26.6c1.8-6.4 7.2-9.6 13.8-9.6 7 0 12 3.2 12.8 9.6zm41.2 32.1c14.1 0 21.2-7.5 21.2-16.2 0-13.1-11.8-15.2-21.1-15.8-6.3-.4-9.2-2.2-9.2-5.4 0-3.1 3.2-4.9 9-4.9 4.7 0 8.7 1.1 12.2 4.4l6.8-8c-5.7-5-11.5-6.5-19.2-6.5-9 0-20.8 4-20.8 15.4 0 11.2 11.1 14.6 20.4 15.3 7 .4 9.8 1.8 9.8 5.2 0 3.6-4.3 6-8.9 5.9-5.5-.1-13.5-3-17-6.9l-6 8.7c7.2 7.5 15 8.8 22.8 8.8z"
                                            id="a"
                                        ></path>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <g fill="currentColor">
                                            <path d="M19.742 49h28.516L68 83H0l19.742-34z"></path>
                                            <path
                                                d="M26 69h14v30H26V69zM4 50L33.127 0 63 50H4z"
                                            ></path>
                                        </g>
                                        <g fill-rule="nonzero">
                                            <use fill="currentColor" xlink:href="#a"></use>
                                            <use fill="currentColor" xlink:href="#a"></use>
                                        </g>
                                    </g>
                                </svg>
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
                                >Courses</a
                                >
                                <a
                                    href="#"
                                    class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-black lg:mx-3 md:text-center"
                                >Help</a
                                >
                            </div>
                            <x-home.navigation.auth/>
                        </div>
                    </div>
                    <div
                        @click="showMenu = !showMenu"
                        class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100"
                    >
                        <svg
                            class="w-6 h-6 text-gray-700"
                            x-show="!showMenu"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg
                            class="w-6 h-6 text-gray-700"
                            x-show="showMenu"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            style="display: none"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            ></path>
                        </svg>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section class="bg-white">
        <div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">

            <div class="flex flex-col items-center sm:px-5 md:flex-row">
                <div class="w-full md:w-1/2">
                    <a href="#" class="block">
                        <img class="object-cover w-full h-full rounded-lg max-h-64 sm:max-h-96"
                             src="https://cdn.devdojo.com/images/may2021/cupcakes.jpg" alt="">
                    </a>
                </div>
                <div class="flex flex-col items-start justify-center w-full h-full py-6 mb-6 md:mb-0 md:w-1/2">
                    <div
                        class="flex flex-col items-start justify-center h-full space-y-3 transform md:pl-10 lg:pl-16 md:space-y-5">
                        <div
                            class="bg-pink-500 flex items-center pl-2 pr-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                            <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span>Featured</span>
                        </div>
                        <h1 class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl"><a href="#_">Savory
                                Templates. Sweet Designs.</a></h1>
                        <p class="pt-2 text-sm font-medium">by <a href="#_" class="mr-1 underline">John Doe</a> · <span
                                class="mx-1">April 23rd, 2021</span> · <span
                                class="mx-1 text-gray-600">5 min. read</span></p>
                    </div>
                </div>
            </div>

            <div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">
                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                             src="https://cdn.devdojo.com/images/may2021/fruit.jpg">
                    </a>
                    <div
                        class="bg-purple-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Lifestyle</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl"><a href="#_">Creating a Future Worth Living</a>
                    </h2>
                    <p class="text-sm text-gray-500">Learn the attributes you need to gain in order to build a future
                        and create a life that you are truly happy with.</p>
                    <p class="pt-2 text-xs font-medium"><a href="#_" class="mr-1 underline">Mary Jane</a> · <span
                            class="mx-1">April 17, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span></p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                             src="https://cdn.devdojo.com/images/may2021/workout.jpg">
                    </a>
                    <div
                        class="bg-pink-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Health</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl">The Healther Version of Yourself</h2>
                    <p class="text-sm text-gray-500">If you want to excel in life and become a better version of
                        yourself, you'll need to upgrade your life.</p>
                    <p class="pt-2 text-xs font-medium"><a href="#_" class="mr-1 underline">Fred Jones</a> · <span
                            class="mx-1">April 10, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span></p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56"
                             src="https://cdn.devdojo.com/images/may2021/food.jpg">
                    </a>
                    <div
                        class="bg-red-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Food</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl">Enjoy the Meals of the Kings</h2>
                    <p class="text-sm text-gray-500">Take the time to enjoy the life that you've created. It's totally
                        fine to live like kings and eat like royalty.</p>
                    <p class="pt-2 text-xs font-medium"><a href="#_" class="mr-1 underline">Mike Roberts</a> · <span
                            class="mx-1">April 6, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span></p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                             src="https://cdn.devdojo.com/images/may2021/books.jpg">
                    </a>
                    <div
                        class="bg-blue-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Motivation</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl">Writing for Success</h2>
                    <p class="text-sm text-gray-500">Writing about your plans for success is extremely helpful for
                        yourself and it will allow you to share your story.</p>
                    <p class="pt-2 text-xs font-medium"><a href="#_" class="mr-1 underline">Tom Johnson</a> · <span
                            class="mx-1">May 25, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span></p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                             src="https://cdn.devdojo.com/images/may2021/clock.jpg">
                    </a>
                    <div
                        class="bg-gray-800 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Business</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl">Simple Time Management</h2>
                    <p class="text-sm text-gray-500">Managing your time can make the difference between getting ahead in
                        life or staying exactly where you are.</p>
                    <p class="pt-2 text-xs font-medium"><a href="#_" class="mr-1 underline">Scott Reedman</a> · <span
                            class="mx-1">May 18, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span></p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <a href="#_" class="block">
                        <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                             src="https://cdn.devdojo.com/images/may2021/lemons.jpg">
                    </a>
                    <div
                        class="bg-yellow-400 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                        <span>Nutrition</span>
                    </div>
                    <h2 class="text-lg font-bold sm:text-xl md:text-2xl">The Fruits Life</h2>
                    <p class="text-sm text-gray-500">Take a moment and enjoy to enjoy the many fruits of life.
                        Relaxation and a healthy diet can go a long way.</p>
                    <p class="pt-2 text-xs font-medium"><a href="#_" class="mr-1 underline">Jake Caldwell</a> · <span
                            class="mx-1">May 15, 2021</span> · <span class="mx-1 text-gray-600">3 min. read</span></p>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-white">
        <div
            class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8"
        >
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <div class="px-5 py-2">
                    <a
                        href="#"
                        class="text-base leading-6 text-gray-500 hover:text-gray-900"
                    >
                        About
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a
                        href="#"
                        class="text-base leading-6 text-gray-500 hover:text-gray-900"
                    >
                        Blog
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a
                        href="#"
                        class="text-base leading-6 text-gray-500 hover:text-gray-900"
                    >
                        Contact
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a
                        href="#"
                        class="text-base leading-6 text-gray-500 hover:text-gray-900"
                    >
                        Terms
                    </a>
                </div>
            </nav>
            <div class="flex justify-center mt-8 space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <svg
                        class="w-6 h-6"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Instagram</span>
                    <svg
                        class="w-6 h-6"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Twitter</span>
                    <svg
                        class="w-6 h-6"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                        />
                    </svg>
                </a>
                <a
                    href="https://github.com/mxsgx/final-project-amcc"
                    class="text-gray-400 hover:text-gray-500"
                >
                    <span class="sr-only">GitHub</span>
                    <svg
                        class="w-6 h-6"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Dribbble</span>
                    <svg
                        class="w-6 h-6"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-base leading-6 text-center text-gray-400">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </section>
</x-layouts.base>
