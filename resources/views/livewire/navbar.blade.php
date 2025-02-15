<div class="sticky top-0 z-10">
    <nav class="w-full mx-auto bg-white  shadow relative ">
        <div class="justify-between container px-6 h-16 flex items-center lg:items-stretch mx-auto">
            <div class="flex items-center">
                <div aria-label="Home" role="img" class="mr-10 flex items-center">
                    <x-application-logo class="h-12" />
                </div>
                @switch(auth()->user()->user_type)
                    @case('admin')
                        <ul class="pr-32 xl:flex space-x-5  hidden items-center h-full">
                            <li
                                class="{{ request()->routeIs('admin.dashboard') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('admin.dashboard') }}" x-navigate> Dashboard</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.school-year') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('admin.school-year') }}" x-navigate> School Year</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.deans') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('admin.deans') }}" x-navigate>Deans</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.programchair') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('admin.programchair') }}">Program Chairs</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.teachers') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('admin.teachers') }}" x-navigate>Teachers</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.students') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('admin.students') }}">Students</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.courses') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('admin.courses') }}" x-navigate>Courses</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.colleges') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('admin.colleges') }}" x-navigate>Colleges</a>
                            </li>
                        </ul>
                    @break

                    @case('dean')
                        <ul class="pr-32 xl:flex space-x-5  hidden items-center h-full">
                            <li
                                class="{{ request()->routeIs('dean.dashboard') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('dean.dashboard') }}" x-navigate> Dashboard</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('dean.program-chair') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('dean.program-chair') }}" x-navigate> Program Chairs</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('dean.students') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('dean.students') }}" x-navigate> Students</a>
                            </li>

                        </ul>
                    @break

                    @case('program_chair')
                        <ul class="pr-32 xl:flex space-x-5  hidden items-center h-full">
                            <li
                                class="{{ request()->routeIs('program_chair.dashboard') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('program_chair.dashboard') }}" x-navigate> Dashboard</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('program_chair.students') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('program_chair.students') }}" x-navigate> Students</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('program_chair.repository') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('program_chair.repository') }}" x-navigate> Repository</a>
                            </li>


                        </ul>
                    @break

                    @case('teacher')
                        <ul class="pr-32 xl:flex space-x-5  hidden items-center h-full">
                            <li
                                class="{{ request()->routeIs('teacher.dashboard') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('teacher.dashboard') }}" x-navigate> Dashboard</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('teacher.repository') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('teacher.repository') }}" x-navigate> Repository</a>
                            </li>
                            <li
                                class=" {{ request()->routeIs('teacher.schedule') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('teacher.schedule') }}" x-navigate> Schedule</a>
                            </li>
                        </ul>
                    @break

                    @case('student')
                        <ul class="pr-32 xl:flex space-x-5  hidden items-center h-full">
                            <li
                                class="{{ request()->routeIs('student.dashboard') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                <a href="{{ route('student.dashboard') }}" x-navigate> Dashboard</a>
                            </li>
                            @if (auth()->user()->student->studentRepository)
                                <li
                                    class="{{ request()->routeIs('student.my-repository') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                    <a href="{{ route('student.my-repository') }}" x-navigate> My Repository</a>
                                </li>
                                <li
                                    class="{{ request()->routeIs('student.my-schedule') ? 'text-green-600' : '' }} hover:text-green-600 cursor-pointer h-full flex items-center text-sm font-semibold text-gray-700 tracking-normal">
                                    <a href="{{ route('student.my-schedule') }}" x-navigate> My Schedule</a>
                                </li>
                            @else
                            @endif


                        </ul>
                    @break

                    @default
                @endswitch
            </div>
            <div class="h-full xl:flex hidden items-center justify-end">
                <div class="h-full flex items-center">
                    <div class="w-32 pr-16 h-full flex items-center justify-end border-r"></div>
                    <div class="w-full h-full flex items-center pl-5">
                        <div>
                            <button class="text-gray-700 hover:text-green-600">
                                <svg class="w-8 h-8 " viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                        d="M9.107 2.674A6.52 6.52 0 0 1 12 2c3.727 0 6.75 3.136 6.75 7.005v.705a4.4 4.4 0 0 0 .692 2.375l1.108 1.724c1.011 1.575.239 3.716-1.52 4.214a25.775 25.775 0 0 1-14.06 0c-1.759-.498-2.531-2.639-1.52-4.213l1.108-1.725A4.4 4.4 0 0 0 5.25 9.71v-.705c0-1.074.233-2.092.65-3.002M7.5 19c.655 1.748 2.422 3 4.5 3c.245 0 .485-.017.72-.05M16.5 19a4.498 4.498 0 0 1-1.302 1.84">
                                    </path>
                                </svg>
                            </button>

                        </div>
                        <div aria-haspopup="true" class="cursor-pointer w-full flex items-center justify-end relative"
                            onclick="dropdownHandler(this)">
                            <div x-data="{
                                dropdownOpen: false
                            }" class="relative">

                                <button @click="dropdownOpen=true"
                                    class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white border rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                                    <img src="https://cdn.devdojo.com/images/may2023/adam.jpeg"
                                        class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
                                    <span
                                        class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                                        <span class="uppercase">{{ auth()->user()->name }}</span>
                                        <span
                                            class="text-xs font-light text-neutral-400">{{ auth()->user()->email }}</span>
                                    </span>
                                    <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>

                                <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                                    x-transition:enter="ease-out duration-200" x-transition:enter-start="-translate-y-2"
                                    x-transition:enter-end="translate-y-0"
                                    class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                                    <div
                                        class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                                        <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                        <a href="#_"
                                            class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-4 h-4 mr-2">
                                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span>Profile</span>
                                            <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘P</span>
                                        </a>

                                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="route('logout')"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                                class="relative flex cursor-pointer select-none hover:bg-neutral-100 hover:text-red-600 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="w-4 h-4 mr-2">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" x2="9" y1="12"
                                                        y2="12">
                                                    </line>
                                                </svg>
                                                <span>Log out</span>
                                                <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘Q</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="visible xl:hidden flex items-center">
                <div>
                    <button id="menu"
                        class="text-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800"
                        onclick="sidebarHandler(true) ">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_dark_page_title_and_white_box-svg7.svg"
                            alt="toggler">
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
