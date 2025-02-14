<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #16a34a;
        }
    </style>
    <tallstackui:script />
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <div>
        <!-- Mobile -->
        <div id="mobile-nav" class="w-full xl:hidden h-full absolute z-40">
            <div class="bg-gray-800 opacity-50 inset-0 fixed w-full h-full" onclick="sidebarHandler(false)"></div>
            <div
                class="w-64  absolute left-0 z-40 top-0 bg-white shadow flex-col justify-between transition duration-150 ease-in-out h-full">
                <div class="flex flex-col justify-between h-full">
                    <div class="px-6 pt-4 overflow-y-auto">
                        <div class="flex items-center justify-between">
                            <div aria-label="Home" role="img" class="flex items-center">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg6.svg"
                                    alt="logo">
                                <p class="text-bold md:text2xl text-base pl-3 text-gray-800">The North</p>
                            </div>
                            <button id="cross"
                                class="hidden text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 rounded"
                                onclick="sidebarHandler(false)">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg1.svg"
                                    alt="cross">
                            </button>
                        </div>
                        <ul class="f-m-m">
                            <li class="text-white pt-8">
                                <div class="flex items-center">
                                    <div class="md:w-6 md:h-6 w-5 h-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M7.16667 3H3.83333C3.3731 3 3 3.3731 3 3.83333V7.16667C3 7.6269 3.3731 8 3.83333 8H7.16667C7.6269 8 8 7.6269 8 7.16667V3.83333C8 3.3731 7.6269 3 7.16667 3Z"
                                                stroke="#667EEA" stroke-width="1" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M7.16667 11.6667H3.83333C3.3731 11.6667 3 12.0398 3 12.5V15.8333C3 16.2936 3.3731 16.6667 3.83333 16.6667H7.16667C7.6269 16.6667 8 16.2936 8 15.8333V12.5C8 12.0398 7.6269 11.6667 7.16667 11.6667Z"
                                                stroke="#667EEA" stroke-width="1" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M16.1667 11.6667H12.8333C12.3731 11.6667 12 12.0398 12 12.5V15.8334C12 16.2936 12.3731 16.6667 12.8333 16.6667H16.1667C16.6269 16.6667 17 16.2936 17 15.8334V12.5C17 12.0398 16.6269 11.6667 16.1667 11.6667Z"
                                                stroke="#667EEA" stroke-width="1" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M16.1667 3H12.8333C12.3731 3 12 3.3731 12 3.83333V7.16667C12 7.6269 12.3731 8 12.8333 8H16.1667C16.6269 8 17 7.6269 17 7.16667V3.83333C17 3.3731 16.6269 3 16.1667 3Z"
                                                stroke="#667EEA" stroke-width="1" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <a href="javascript:void(0)" class="text-indigo-500 ml-3 text-lg">Dashboard</a>
                                </div>
                            </li>
                            <li class="text-gray-700 pt-8">
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        <div class="md:w-6 md:h-6 w-5 h-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M2.33333 4.83333H4.83333C5.05435 4.83333 5.26631 4.74554 5.42259 4.58926C5.57887 4.43298 5.66667 4.22101 5.66667 4V3.16667C5.66667 2.72464 5.84226 2.30072 6.15482 1.98816C6.46738 1.67559 6.89131 1.5 7.33333 1.5C7.77536 1.5 8.19928 1.67559 8.51184 1.98816C8.8244 2.30072 9 2.72464 9 3.16667V4C9 4.22101 9.0878 4.43298 9.24408 4.58926C9.40036 4.74554 9.61232 4.83333 9.83333 4.83333H12.3333C12.5543 4.83333 12.7663 4.92113 12.9226 5.07741C13.0789 5.23369 13.1667 5.44565 13.1667 5.66667V8.16667C13.1667 8.38768 13.2545 8.59964 13.4107 8.75592C13.567 8.9122 13.779 9 14 9H14.8333C15.2754 9 15.6993 9.17559 16.0118 9.48816C16.3244 9.80072 16.5 10.2246 16.5 10.6667C16.5 11.1087 16.3244 11.5326 16.0118 11.8452C15.6993 12.1577 15.2754 12.3333 14.8333 12.3333H14C13.779 12.3333 13.567 12.4211 13.4107 12.5774C13.2545 12.7337 13.1667 12.9457 13.1667 13.1667V15.6667C13.1667 15.8877 13.0789 16.0996 12.9226 16.2559C12.7663 16.4122 12.5543 16.5 12.3333 16.5H9.83333C9.61232 16.5 9.40036 16.4122 9.24408 16.2559C9.0878 16.0996 9 15.8877 9 15.6667V14.8333C9 14.3913 8.8244 13.9674 8.51184 13.6548C8.19928 13.3423 7.77536 13.1667 7.33333 13.1667C6.89131 13.1667 6.46738 13.3423 6.15482 13.6548C5.84226 13.9674 5.66667 14.3913 5.66667 14.8333V15.6667C5.66667 15.8877 5.57887 16.0996 5.42259 16.2559C5.26631 16.4122 5.05435 16.5 4.83333 16.5H2.33333C2.11232 16.5 1.90036 16.4122 1.74408 16.2559C1.5878 16.0996 1.5 15.8877 1.5 15.6667V13.1667C1.5 12.9457 1.5878 12.7337 1.74408 12.5774C1.90036 12.4211 2.11232 12.3333 2.33333 12.3333H3.16667C3.60869 12.3333 4.03262 12.1577 4.34518 11.8452C4.65774 11.5326 4.83333 11.1087 4.83333 10.6667C4.83333 10.2246 4.65774 9.80072 4.34518 9.48816C4.03262 9.17559 3.60869 9 3.16667 9H2.33333C2.11232 9 1.90036 8.9122 1.74408 8.75592C1.5878 8.59964 1.5 8.38768 1.5 8.16667V5.66667C1.5 5.44565 1.5878 5.23369 1.74408 5.07741C1.90036 4.92113 2.11232 4.83333 2.33333 4.83333"
                                                    stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>

                                        <a href="javascript:void(0)" class="text-gray-700 ml-3 text-lg">Products</a>
                                    </div>
                                    <button id="chevronup" onclick="listHandler(true)"
                                        class="ml-4 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg3.svg"
                                            alt="up">
                                    </button>
                                    <button id="chevrondown" onclick="listHandler(false)"
                                        class="hidden ml-4 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded">
                                        <img class="transform rotate-180"
                                            src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg3.svg"
                                            alt="down">
                                    </button>
                                </div>
                                <div id="list" class="hidden">
                                    <ul class="my-3">
                                        <li class="text-sm text-indigo-500 py-2 px-6"><a href="javascript:void(0)"> Best
                                                Sellers </a></li>
                                        <li class="text-sm text-gray-800 hover:text-indigo-500 py-2 px-6"><a
                                                href="javascript:void(0)"> Out of Stock</a></li>
                                        <li class="text-sm text-gray-800 hover:text-indigo-500 py-2 px-6"><a
                                                href="javascript:void(0)"> New Products</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="text-gray-800 pt-8">
                                <div class="flex items-center">
                                    <div class="md:w-6 md:h-6 w-5 h-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M6.66667 13.3333L8.33334 8.33334L13.3333 6.66667L11.6667 11.6667L6.66667 13.3333Z"
                                                stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M10 17.5C14.1421 17.5 17.5 14.1421 17.5 10C17.5 5.85786 14.1421 2.5 10 2.5C5.85786 2.5 2.5 5.85786 2.5 10C2.5 14.1421 5.85786 17.5 10 17.5Z"
                                                stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <a href="javascript:void(0)" class="text-gray-800 ml-3 text-lg">Performance</a>
                                </div>
                            </li>
                            <li class="text-gray-800 pt-8">
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        <div class="md:w-6 md:h-6 w-5 h-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="none">
                                                <path d="M5.83333 6.66667L2.5 10L5.83333 13.3333" stroke="currentColor"
                                                    stroke-width="1" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M14.1667 6.66667L17.5 10L14.1667 13.3333"
                                                    stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M11.6667 3.33333L8.33333 16.6667" stroke="currentColor"
                                                    stroke-width="1" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <a href="javascript:void(0)"
                                            class="text-gray-800 ml-3 text-lg">Deliverables</a>
                                    </div>
                                    <div>
                                        <button id="chevronup2" onclick="listHandler2(true)"
                                            class="ml-4 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded">
                                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg3.svg"
                                                alt="up">
                                        </button>
                                        <button id="chevrondown2" onclick="listHandler2(false)"
                                            class="hidden ml-4 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded">
                                            <img class="transform rotate-180"
                                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg3.svg"
                                                alt="down">
                                        </button>
                                    </div>
                                </div>
                                <div id="list2" class="hidden">
                                    <ul class="my-3">
                                        <li class="text-sm text-indigo-500 py-2 px-6">Best Sellers</li>
                                        <li class="text-sm text-gray-800 hover:text-indigo-500 py-2 px-6">Out of Stock
                                        </li>
                                        <li class="text-sm text-gray-800 hover:text-indigo-500 py-2 px-6">New Products
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-center mb-4 w-full px-6">
                            <div class="relative w-full">
                                <div class="text-gray-500 absolute ml-4 inset-0 m-auto w-4 h-4">
                                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg2.svg"
                                        alt="search">
                                </div>
                                <input
                                    class="bg-gray-100 focus:outline-none rounded w-full text-sm text-gray-500 bg-gray-100 pl-10 py-2"
                                    type="text" placeholder="Search" />
                            </div>
                        </div>
                        <div class="border-t border-gray-300">
                            <div class="w-full flex items-center justify-between px-6 pt-1">
                                <div class="flex items-center">
                                    <img alt="display avatar" role="img"
                                        src="https://tuk-cdn.s3.amazonaws.com/assets/components/boxed_layout/bl_1.png"
                                        class="w-8 h-8 rounded-md" />
                                    <p class="text-gray-800 text-base leading-4 ml-2">Jane Doe</p>
                                </div>
                                <ul class="flex">
                                    <li class="cursor-pointer text-white pt-5 pb-3">
                                        <a href="javascript:void(0)">
                                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg4.svg"
                                                alt="chat">
                                        </a>
                                    </li>
                                    <li class="cursor-pointer text-white pt-5 pb-3 pl-3">
                                        <a href="javascript:void(0)">
                                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg5.svg"
                                                alt="notifications">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile -->
        <!-- Navigation starts -->
        <livewire:navbar />
        <!-- Navigation ends -->
        <!-- Page title starts -->
        <div class="bg-green-800 pt-8 pb-36 relative ">
            <img src="{{ asset('images/sksu_bg.jpg') }}"
                class="absolute top-0 left-0 h-full w-full object-cover opacity-30" alt="">
            <div
                class="container px-6 mx-auto flex flex-col lg:flex-row relative items-start lg:items-center justify-between">
                <div class="flex-col flex lg:flex-row items-start lg:items-center">
                    <div class="flex items-center">
                        <img role="img" class="border-2 shadow border-gray-600 rounded-full mr-3"
                            src="https://cdn.tuk.dev/assets/webapp/master_layouts/boxed_layout/boxed_layout2.jpg"
                            alt="Display Avatar of Andres Berlin" />
                        <div>
                            <p class="text-sm text-white font-semibold leading-4 mb-1 uppercase">
                                {{ auth()->user()->name }}</p>
                            <p class="text-xs text-white leading-4">{{ ucfirst(auth()->user()->user_type) }}</p>
                        </div>
                    </div>
                    <div class="ml-0 lg:ml-20 my-6 lg:my-0">
                        <h4 class="text-2xl font-bold leading-tight uppercase text-white mb-2">@yield('title')</h4>
                        <p class="flex items-center text-white text-xs">
                            <span class="cursor-pointer">Portal</span>
                            <span class="mx-2">&gt;</span>
                            <span class="cursor-pointer">@yield('title')</span>

                        </p>
                    </div>
                    @if (auth()->user()->user_type == 'student')
                    @elseif (auth()->user()->user_type != 'admin')
                        <div class="ml-0 lg:ml-20 my-6 lg:my-0">
                            <h4 class="text-xl font-bold leading-tight uppercase text-white mb-2">
                                [{{ auth()->user()->teacher->college->name }}]
                            </h4>
                        </div>
                    @endif
                </div>
                <div>

                </div>
            </div>
        </div>
        <!-- Page title ends -->
        <div class="container px-6 mx-auto">
            <!-- Remove class [ h-64 ] when adding a card block -->
            <div class="rounded-3xl shadow relative bg-white  -mt-28 mb-8 w-full p-16">
                {{ $slot }}
            </div>
        </div>

    </div>

    <footer class="mt-96  bg-gray-100 w-full">
        <div class="px-8 py-12 mx-auto md:px-12 lg:px-32 max-w-7xl">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div>
                    <p class="text-xl font-bold text-green-700 uppercase">STREAMLINED THESIS MANAGEMENT SYSTEM</p>

                </div>
                <div
                    class="grid grid-cols-2 gap-8 mt-12 text-sm font-medium text-gray-500 lg:grid-cols-3 lg:mt-0 xl:col-span-2">
                    <div>
                        <h3 class="text-base text-black">Information</h3>
                        <ul role="list" class="mt-4 space-y-2">
                            <li>
                                <a href="#_" class="hover:text-black">
                                    License
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-base text-black">Socials</h3>
                        <ul role="list" class="mt-4 space-y-2">
                            <li>
                                <a href="https://twitter.com/lexingtonthemes" class="hover:text-black">
                                    @lexingtonthemes
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/Mike_Andreuzza" class="hover:text-black">
                                    @Mike_Andreuzza
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="flex flex-col pt-12 md:flex-row md:items-center md:justify-between" x-data="{ year: new Date().getFullYear() }">
                <span class="text-sm font-medium text-gray-500">
                    Copyright © <span x-text="year">2024</span>
                    <a aria-label="Michael Andreuzza" href="#_"
                        class="mx-2 text-green-700 hover:text-gray-500">SKSU BSIT 2024-2025</a>

                </span>
            </div>
        </div>
    </footer>

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
