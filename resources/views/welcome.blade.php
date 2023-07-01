<x-layouts.base>
    <x-slot:title>{{ config('app.name') }}</x-slot:title>

    <div x-data="{
        bannerVisible: false,
        bannerVisibleAfter: 300,
    }"
         x-show="bannerVisible"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="-translate-y-10"
         x-transition:enter-end="translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="translate-y-0"
         x-transition:leave-end="-translate-y-10"
         x-init="
        setTimeout(()=>{ bannerVisible = true }, bannerVisibleAfter);
    "
         class="top-0 left-0 w-full h-auto py-2 duration-300 ease-out bg-white shadow-sm sm:py-0 sm:h-10" x-cloak>
        <div class="flex items-center justify-between w-full h-full px-3 mx-auto max-w-7xl ">
            <a href="#"
               class="flex flex-col w-full h-full text-xs leading-6 text-black duration-150 ease-out sm:flex-row sm:items-center opacity-80 hover:opacity-100">
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g
                        fill="none" stroke="none"><path
                            d="M10.1893 8.12241C9.48048 8.50807 9.66948 9.5633 10.4691 9.68456L13.5119 10.0862C13.7557 10.1231 13.7595 10.6536 13.7968 10.8949L14.2545 13.5486C14.377 14.3395 15.4432 14.5267 15.8333 13.8259L17.1207 11.3647C17.309 11.0046 17.702 10.7956 18.1018 10.8845C18.8753 11.1023 19.6663 11.3643 20.3456 11.4084C21.0894 11.4567 21.529 10.5994 21.0501 10.0342C20.6005 9.50359 20.0352 8.75764 19.4669 8.06623C19.2213 7.76746 19.1292 7.3633 19.2863 7.00567L20.1779 4.92643C20.4794 4.23099 19.7551 3.52167 19.0523 3.82031L17.1037 4.83372C16.7404 4.99461 16.3154 4.92545 16.0217 4.65969C15.3919 4.08975 14.6059 3.39451 14.0737 2.95304C13.5028 2.47955 12.6367 2.91341 12.6845 3.64886C12.7276 4.31093 13.0055 5.20996 13.1773 5.98734C13.2677 6.3964 13.041 6.79542 12.658 6.97364L10.1893 8.12241Z"
                            stroke="currentColor" stroke-width="1.5"></path><path
                            d="M12.1575 9.90759L3.19359 18.8714C2.63313 19.3991 2.61799 20.2851 3.16011 20.8317C3.70733 21.3834 4.60355 21.3694 5.13325 20.8008L13.9787 11.9552"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path><path d="M5 6.25V3.75M3.75 5H6.25" stroke="currentColor"
                                                                 stroke-width="1.5" stroke-linecap="round"
                                                                 stroke-linejoin="round"></path><path
                            d="M18 20.25V17.75M16.75 19H19.25" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                <strong class="font-semibold">Announcement</strong><span
                    class="hidden w-px h-4 mx-3 rounded-full sm:block bg-neutral-200"></span>
            </span>
                <span class="block pt-1 pb-2 leading-none sm:inline sm:pt-0 sm:pb-0">New batch bootcamp program will start soon</span>
            </a>
            <button @click="bannerVisible=false;"
                    class="flex items-center flex-shrink-0 translate-x-1 ease-out duration-150 justify-center w-6 h-6 p-1.5 text-black rounded-full hover:bg-neutral-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

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

            <!-- Main Hero Content -->
            <div
                data-aos="fade-up"
                data-aos-anchor-placement="top-bottom"
                class="container max-w-sm py-36 mx-auto mt-px text-left sm:max-w-md md:max-w-lg sm:px-4 md:max-w-none md:text-center"
            >
                <h1
                    class="text-3xl font-bold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:text-4xl md:text-6xl lg:text-7xl"
                >
          <span
              class="w-full text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-rose-500 lg:inline"
          >
              Raise Your Potency<br class="hidden sm:block"/>For Your Future
          </span>
                </h1>
                <div
                    class="mx-auto mt-5 text-gray-400 md:mt-8 md:max-w-lg md:text-center md:text-xl"
                >
                    With ABM (<em>a.k.a</em> Anak Buah Mufti) learn will easier, free, and
                    get certificate
                </div>
                <div
                    class="flex flex-col items-center justify-center mt-8 space-y-4 text-center sm:flex-row sm:space-y-0 sm:space-x-4"
                >
          <span class="relative inline-flex w-full md:w-auto">
            <a
                href="{{ route('courses.index') }}"
                class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-white bg-rose-500 border border-transparent rounded-full xl:px-10 md:w-auto hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600"
            >
              Start Learning
            </a>
          </span>
                    <span class="relative inline-flex w-full md:w-auto">
            <a
                href="#"
                class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-gray-900 bg-gray-100 border border-transparent rounded-full xl:px-10 md:w-auto hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200"
            >
              Learn More
            </a>
          </span>
                </div>
            </div>
            <!-- End Main Hero Content -->
        </div>
    </section>

    <section
        class="py-20 bg-white"
        data-aos="fade-up"
        data-aos-anchor-placement="top-bottom"
    >
        <div class="container max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold tracking-tight text-center">
                Our Features
            </h2>
            <p class="mt-2 text-lg text-center text-gray-600">
                Check out our list of awesome features below.
            </p>
            <div
                class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0"
            >
                <div
                    class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-100 sm:rounded-xl"
                    data-rounded="rounded-xl"
                    data-rounded-max="rounded-full"
                >
                    <div
                        class="p-3 text-white bg-rose-500 rounded-full"
                        data-primary="blue-500"
                        data-rounded="rounded-full"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                            <path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5"/>
                            <circle cx="6" cy="14" r="3"/>
                            <path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-700">E-Certifications</h4>
                    <p class="text-base text-center text-gray-500">
                        Each of our plan will provide you and your team with certifications.
                    </p>
                </div>

                <div
                    class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                    data-rounded="rounded-xl"
                    data-rounded-max="rounded-full"
                >
                    <div
                        class="p-3 text-white bg-rose-500 rounded-full"
                        data-primary="blue-500"
                        data-rounded="rounded-full"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M18 8a3 3 0 0 1 0 6"/>
                            <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5"/>
                            <path
                                d="M12 8h0l4.524 -3.77a0.9 .9 0 0 1 1.476 .692v12.156a0.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8"
                            />
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-700">Video & Task</h4>
                    <p class="text-base text-center text-gray-500">
                        Send out notifications to all your customers to keep them engaged.
                    </p>
                </div>

                <div
                    class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                    data-rounded="rounded-xl"
                    data-rounded-max="rounded-full"
                >
                    <div
                        class="p-3 text-white bg-rose-500 rounded-full"
                        data-primary="blue-500"
                        data-rounded="rounded-full"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"/>
                            <line x1="12" y1="12" x2="20" y2="7.5"/>
                            <line x1="12" y1="12" x2="12" y2="21"/>
                            <line x1="12" y1="12" x2="4" y2="7.5"/>
                            <line x1="16" y1="5.25" x2="8" y2="9.75"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-700">Live Class</h4>
                    <p class="text-base text-center text-gray-500">
                        High-quality bundles of awesome tools to help you out.
                    </p>
                </div>

                <div
                    class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                    data-rounded="rounded-xl"
                    data-rounded-max="rounded-full"
                >
                    <div
                        class="p-3 text-white bg-rose-500 rounded-full"
                        data-primary="blue-500"
                        data-rounded="rounded-full"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M8 9l3 3l-3 3"/>
                            <line x1="13" y1="15" x2="16" y2="15"/>
                            <rect x="3" y="4" width="18" height="16" rx="2"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-700">Discussion</h4>
                    <p class="text-base text-center text-gray-500">
                        Developer tools to help grow your application and keep it
                        up-to-date.
                    </p>
                </div>

                <div
                    class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                    data-rounded="rounded-xl"
                    data-rounded-max="rounded-full"
                >
                    <div
                        class="p-3 text-white bg-rose-500 rounded-full"
                        data-primary="blue-500"
                        data-rounded="rounded-full"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="9.5" y1="11" x2="9.51" y2="11"/>
                            <line x1="14.5" y1="11" x2="14.51" y2="11"/>
                            <path d="M9.5 15a3.5 3.5 0 0 0 5 0"/>
                            <path
                                d="M7 5h1v-2h8v2h1a3 3 0 0 1 3 3v9a3 3 0 0 1 -3 3v1h-10v-1a3 3 0 0 1 -3 -3v-9a3 3 0 0 1 3 -3"
                            />
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-700">Free</h4>
                    <p class="text-base text-center text-gray-500">
                        The right kind of building blocks to take your company to the next
                        level.
                    </p>
                </div>

                <div
                    class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
                    data-rounded="rounded-xl"
                    data-rounded-max="rounded-full"
                >
                    <div
                        class="p-3 text-white bg-rose-500 rounded-full"
                        data-primary="blue-500"
                        data-rounded="rounded-full"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="15" y1="5" x2="15" y2="7"/>
                            <line x1="15" y1="11" x2="15" y2="13"/>
                            <line x1="15" y1="17" x2="15" y2="19"/>
                            <path
                                d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"
                            />
                        </svg>
                    </div>
                    <h4 class="text-xl font-medium text-gray-700">Updates</h4>
                    <p class="text-base text-center text-gray-500">
                        Coupons system to provide special offers and discounts for your app.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section
        class="py-12 sm:py-16 bg-white"
        data-aos="fade-up"
        data-aos-anchor-placement="top-bottom"
    >
        <div class="max-w-7xl px-10 mx-auto sm:text-center">
            <p class="text-rose-500 font-medium uppercase">Our Free Courses</p>
            <h2 class="font-bold text-3xl sm:text-4xl lg:text-5xl mt-3">
                Learn Your Favorite Tech.
            </h2>
            <p class="mt-4 text-gray-500 text-base sm:text-xl lg:text-2xl">
                We've built integrations with some of your favorite services.<br
                    class="lg:hidden hidden sm:block"
                />
                Check'em out below 👇
            </p>
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 my-12 sm:my-16"
            >
                <div
                    class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100"
                >
                    <img
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg"
                        height="64"
                        width="64"
                        alt="HTML 5"
                    />
                    <p class="font-bold mt-4">HTML 5</p>
                    <p class="mt-2 text-sm text-gray-500">Build Your Website</p>
                </div>
                <div
                    class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100"
                >
                    <img
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg"
                        height="64"
                        width="64"
                        alt="CSS 3"
                    />
                    <p class="font-bold mt-4">CSS 3</p>
                    <p class="mt-2 text-sm text-gray-500">Styling Your Website</p>
                </div>
                <div
                    class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100"
                >
                    <img
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
                        height="64"
                        width="64"
                        alt="JavaScript"
                    />
                    <p class="font-bold mt-4">JavaScript</p>
                    <p class="mt-2 text-sm text-gray-500">Make Something Work</p>
                </div>
                <div
                    class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100"
                >
                    <img
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"
                        height="64"
                        width="64"
                        alt="PHP"
                    />
                    <p class="font-bold mt-4">PHP</p>
                    <p class="mt-2 text-sm text-gray-500">Most Popular Language</p>
                </div>
                <div
                    class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100"
                >
                    <img
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg"
                        height="64"
                        width="64"
                        alt="Laravel"
                    />
                    <p class="font-bold mt-4">Laravel</p>
                    <p class="mt-2 text-sm text-gray-500">Web Artisan Framework</p>
                </div>
                <div
                    class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100"
                >
                    <img
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg"
                        height="64"
                        width="64"
                        alt="Python"
                    />
                    <p class="font-bold mt-4">Python</p>
                    <p class="mt-2 text-sm text-gray-500">Begin Become Data Scientist</p>
                </div>
                <div
                    class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100"
                >
                    <img
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg"
                        height="64"
                        width="64"
                        alt="Node.js"
                    />
                    <p class="font-bold mt-4">Node.js</p>
                    <p class="mt2 text-sm text-gray-500">Most Popular Language</p>
                </div>
                <div
                    class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100"
                >
                    <img
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg"
                        height="64"
                        width="64"
                        alt="Go"
                    />
                    <p class="font-bold mt-4">Go</p>
                    <p class="mt-2 text-sm text-gray-500">Most Popular Language</p>
                </div>
            </div>
            <a
                href="{{ route('courses.index') }}"
                class="px-8 py-4 sm:w-auto w-full text-center text-base font-medium inline-block rounded text-white hover:bg-rose-600 bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600"
            >View All Courses</a
            >
        </div>
    </section>

    <section
        class="flex items-center justify-center py-16 min-w-screen"
        data-aos="fade-up"
        data-aos-anchor-placement="top-bottom"
    >
        <div class="max-w-6xl px-12 mx-auto md:px-16 xl:px-10">
            <div class="flex flex-col items-center lg:flex-row">
                <div
                    class="flex flex-col items-start justify-center w-full h-full pr-8 mb-10 lg:mb-0 lg:w-1/2"
                >
                    <p
                        class="mb-2 text-base font-medium tracking-tight text-rose-500 uppercase"
                        data-primary="rose-500"
                    >
                        Our customers love our product
                    </p>
                    <h2
                        class="text-4xl font-extrabold leading-10 tracking-tight text-gray-900 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl"
                    >
                        Testimonials
                    </h2>
                    <p class="my-6 text-lg text-gray-600">
                        Don't just take our word for it, read from our extensive list of
                        case studies and customer testimonials.
                    </p>
                    <a
                        href="#"
                        class="flex items-center justify-center px-8 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-rose-500 border border-transparent rounded-md shadow hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600 md:py-4 md:text-lg md:px-10"
                        data-primary="indigo-600"
                        data-rounded="rounded-md"
                    >View Case Studies</a
                    >
                </div>
                <div class="w-full lg:w-1/2">
                    <blockquote
                        class="flex items-center justify-between w-full col-span-1 p-6 bg-white rounded-lg shadow"
                        data-rounded="rounded-lg"
                        data-rounded-max="rounded-full"
                    >
                        <div class="flex flex-col pr-8">
                            <div class="relative pl-12">
                                <svg
                                    class="absolute left-0 w-10 h-10 text-rose-500 fill-current"
                                    data-primary="rose-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 100 125"
                                >
                                    <path
                                        d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z"
                                    />
                                </svg>
                                <p
                                    class="mt-2 text-sm text-gray-600 sm:text-base lg:text-sm xl:text-base"
                                >
                                    Awesome product! And the customer service is exceptionally
                                    well.
                                </p>
                            </div>

                            <h3
                                class="pl-12 mt-3 text-sm font-medium leading-5 text-gray-800 truncate sm:text-base lg:text-sm lg:text-base"
                            >
                                Jane Cooper
                                <span class="mt-1 text-sm leading-5 text-gray-500 truncate"
                                >- CEO SomeCompany</span
                                >
                            </h3>
                        </div>
                        <img
                            class="flex-shrink-0 w-20 h-20 bg-gray-300 rounded-full xl:w-24 xl:h-24"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                            alt=""
                        />
                    </blockquote>
                    <blockquote
                        class="flex items-center justify-between w-full col-span-1 p-6 mt-4 bg-white rounded-lg shadow"
                        data-rounded="rounded-lg"
                        data-rounded-max="rounded-full"
                    >
                        <div class="flex flex-col pr-10">
                            <div class="relative pl-12">
                                <svg
                                    class="absolute left-0 w-10 h-10 text-rose-500 fill-current"
                                    data-primary="rose-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 100 125"
                                >
                                    <path
                                        d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z"
                                    />
                                </svg>
                                <p
                                    class="mt-2 text-sm text-gray-600 sm:text-base lg:text-sm xl:text-base"
                                >
                                    I can't express enough, how amazing this service has been for
                                    my company.
                                </p>
                            </div>
                            <h3
                                class="pl-12 mt-3 text-sm font-medium leading-5 text-gray-800 truncate sm:text-base lg:text-sm lg:text-base"
                            >
                                John Doe
                                <span class="mt-1 text-sm leading-5 text-gray-500 truncate"
                                >- CEO SomeCompany</span
                                >
                            </h3>
                            <p class="mt-1 text-sm leading-5 text-gray-500 truncate"></p>
                        </div>
                        <img
                            class="flex-shrink-0 w-24 h-24 bg-gray-300 rounded-full"
                            src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&aauto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                            alt=""
                        />
                    </blockquote>
                    <blockquote
                        class="flex items-center justify-between w-full col-span-1 p-6 mt-4 bg-white rounded-lg shadow"
                        data-rounded="rounded-lg"
                        data-rounded-max="rounded-full"
                    >
                        <div class="flex flex-col pr-10">
                            <div class="relative pl-12">
                                <svg
                                    class="absolute left-0 w-10 h-10 text-rose-500 fill-current"
                                    data-primary="rose-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 100 125"
                                >
                                    <path
                                        d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z"
                                    />
                                </svg>
                                <p
                                    class="mt-2 text-sm text-gray-600 sm:text-base lg:text-sm xl:text-base"
                                >
                                    I can't express enough, how amazing this service has been for
                                    my company.
                                </p>
                            </div>

                            <h3
                                class="pl-12 mt-3 text-sm font-medium leading-5 text-gray-800 truncate sm:text-base lg:text-sm lg:text-base"
                            >
                                John Smith
                                <span class="mt-1 text-sm leading-5 text-gray-500 truncate"
                                >- CEO SomeCompany</span
                                >
                            </h3>
                            <p class="mt-1 text-sm leading-5 text-gray-500 truncate"></p>
                        </div>
                        <img
                            class="flex-shrink-0 w-24 h-24 bg-gray-300 rounded-full"
                            src="https://images.unsplash.com/photo-1545167622-3a6ac756afa4?ixlib=rrb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&aauto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                            alt=""
                        />
                    </blockquote>
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
