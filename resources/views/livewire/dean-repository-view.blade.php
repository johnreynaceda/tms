<div>
    <div>
        <a href="{{ route('dean.repository') }}" x-navigate
            class="flex space-x-2 items-center mb-6 text-gray-700 hover:text-red-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-arrow-left">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </svg>
            <span class="font-semibold">BACK</span>
        </a>
        {{-- <div class="mt-12">
            <div class="grid grid-cols-3 divide-x-2 border gap-5">
                <div class="py-2">
                    <h1 class="font-semibold uppercase px-5 border-b text-green-700">Students</h1>
                    <ul class="mt-4 px-4">
                        @foreach ($students as $item)
                            <li>{{ $item->student->firstname . ' ' . $item->student->lastname }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="py-2">
                    <h1 class="font-semibold uppercase px-5 border-b text-green-700">Adviser</h1>
                    <ul class="mt-4 px-4">
                        @foreach ($advisers as $item)
                            <li>{{ $item->teacher->firstname . ' ' . $item->teacher->lastname }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="py-2">
                    <h1 class="font-semibold uppercase px-5 border-b text-green-700">Panelist</h1>
                    <ul class="mt-4 px-4">
                        <li>sdsdsd</li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <div class="mt-10 grid grid-cols-5 gap-10">
            <div class="col-span-2">
                <div class="h1 text-2xl text-left text-gray-700 uppercase font-semibold">TITLE: {{ $repository_name }}
                </div>

                <div class="mt-5">
                    <div class="flex space-x-2 text-green-600 border-b">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        <span class="font-semibold ">GROUP MEMBER</span>
                    </div>
                    <div class="mt-2">
                        <ul>
                            @foreach ($students as $item)
                                <li>{{ $item->student->lastname . ', ' . $item->student->firstname }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="flex space-x-2 text-green-600 border-b">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        <span class="font-semibold ">ADVISER</span>
                    </div>
                    <div class="mt-2">
                        <ul>
                            @foreach ($advisers as $item)
                                <li>{{ $item->teacher->lastname . ', ' . $item->teacher->firstname }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="flex space-x-2 text-green-600 border-b">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        <span class="font-semibold ">PANELISTS</span>
                    </div>
                    <div class="mt-2">
                        <ul>
                            @foreach ($panels as $item)
                                <li>{{ $item->teacher->lastname . ', ' . $item->teacher->firstname }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-10">
                    <div class=" col-span-3 border-t pt-5 ">
                        <div class="flex space-x-2 items-center text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-file-badge">
                                <path d="M12 22h6a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3" />
                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                <path d="M5 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                <path d="M7 16.5 8 22l-3-1-3 1 1-5.5" />
                            </svg>
                            <h1 class="text-2xl  font-bold">GRADINGS</h1>
                        </div>
                        <div class="mt-5 space-y-10 ">
                            <div class="">
                                <div class="flex space-x-10  ">
                                    <h1 class="text-lg font-semibold text-gray-600 underline w-full">OUTLINE DEFENSE
                                    </h1>
                                    @php
                                        $alreadyAdded = \App\Models\RepositoryGrade::where(
                                            'repository_id',
                                            $repository_id,
                                        )
                                            ->where('type_of_defense', 'Outline')
                                            ->where('teacher_id', auth()->user()->teacher->id)
                                            ->get()
                                            ->count();
                                    @endphp
                                    @if (auth()->user()->user_type == 'teacher')
                                        @if ($alreadyAdded == 0)
                                            <x-button icon="plus" wire:click="$set('outline_modal', true)"
                                                color="emerald" xs>Add</x-button>
                                        @endif
                                    @endif
                                </div>
                                <ul class="mt-2">
                                    @forelse ($outlines as $item)
                                        <li>{{ $item->teacher->lastname . ', ' . $item->teacher->firstname }} =
                                            <strong class="text-2xl text-blue-500">{{ $item->grade }}</strong>
                                        </li>
                                    @empty
                                        <li>No Grade Submitted..</li>
                                    @endforelse
                                </ul>
                            </div>
                            <div>
                                <div class="flex space-x-10">
                                    <h1 class="text-lg font-semibold text-gray-600 underline w-full">FINAL DEFENSE</h1>
                                    @php
                                        $alreadyAdded = \App\Models\RepositoryGrade::where(
                                            'repository_id',
                                            $repository_id,
                                        )
                                            ->where('type_of_defense', 'Final')
                                            ->where('teacher_id', auth()->user()->teacher->id)
                                            ->get()
                                            ->count();
                                    @endphp
                                    @if (auth()->user()->user_type == 'teacher')
                                        @if ($alreadyAdded == 0)
                                            <x-button icon="plus" wire:click="$set('final_modal', true)"
                                                color="emerald" xs>Add</x-button>
                                        @endif
                                    @endif
                                </div>
                                <ul class="mt-2">
                                    @forelse ($finals as $item)
                                        <li>{{ $item->teacher->lastname . ', ' . $item->teacher->firstname }} =
                                            <strong class="text-2xl text-blue-500">{{ $item->grade }}</strong>
                                        </li>
                                    @empty
                                        <li>No Grade Submitted..</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 mt-10">
                    <div class="bg-gray-100 shadow-md h-96 overflow-y-auto relative  rounded-xl">
                        <div class="flex bg-gray-100 p-5 sticky top-0  space-x-3 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-file-check-2">
                                <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                <path d="m3 15 2 2 4-4" />
                            </svg>
                            <span class="font-semibold">UPLOADED DOCUMENTS</span>
                        </div>
                        <ul class=" px-5 pb-5 space-y-2">
                            @forelse ($documents as $item)
                                <li class="bg-white shadow-sm rounded-lg p-2 px-4 ">
                                    <div class="text-right text-xs justify-end">
                                        {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</div>
                                    <div class="flex mt-2 justify-between space-x-2">
                                        <div class="flex space-x-2 text-gray-700 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-file-type-2">
                                                <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                                <path d="M2 13v-1h6v1" />
                                                <path d="M5 12v6" />
                                                <path d="M4 18h2" />
                                            </svg>
                                            <p class="truncate w-64">{{ $item->name }}</p>
                                        </div>
                                        <x-button href="{{ Storage::url($item->document_path) }}" target="_blank" xs
                                            color="green" icon="eye" position="right">View</x-button>
                                    </div>
                                </li>
                            @empty

                                No uploaded documents yet.
                            @endforelse

                        </ul>
                    </div>
                </div>
                <div class="col-span-2 mt-5">
                    <div class="bg-gray-100 shadow-md h-96 overflow-y-auto relative  rounded-xl">
                        <div class="flex bg-gray-100 p-5 sticky top-0  space-x-3 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-check-2">
                                <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                <path d="m3 15 2 2 4-4" />
                            </svg>
                            <span class="font-semibold">UPLOADED PAYMENTS</span>
                        </div>
                        <ul class=" px-5 pb-5 space-y-2">
                            @forelse ($payments as $item)
                                <li class="bg-white shadow-sm rounded-lg p-2 px-4 ">
                                    <div class="text-right text-xs justify-end">3 hours ago</div>
                                    <div class="flex mt-2 justify-between space-x-2">
                                        <div class="flex space-x-2 text-gray-700 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-file-type-2">
                                                <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                                <path d="M2 13v-1h6v1" />
                                                <path d="M5 12v6" />
                                                <path d="M4 18h2" />
                                            </svg>
                                            <p class="truncate w-64">{{ $item->name }}</p>
                                        </div>
                                        <x-button href="{{ Storage::url($item->document_path) }}" target="_blank" xs
                                            color="green" icon="eye" position="right">View</x-button>
                                    </div>
                                </li>
                            @empty

                                No uploaded documents yet.
                            @endforelse

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-3">



                <section class="relative">
                    <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
                        <div class="w-full flex-col justify-start items-start gap-5 inline-flex">
                            <h2 class="w-full text-gray-900 text-4xl font-bold font-manrope leading-normal">Feedbacks
                            </h2>

                            <div class="w-full flex-col mt-5 justify-start items-start gap-8 flex ">
                                @forelse ($feedbacks as $item)
                                    <div
                                        class="w-full pb-6 border-b border-gray-300 justify-start items-start gap-2.5 inline-flex">
                                        <img class="w-10 h-10 rounded-full object-cover"
                                            src="{{ asset('images/sksu_logo.png') }}" alt="Mia Thompson image" />
                                        <div class="w-full flex-col justify-start items-start gap-3.5 inline-flex">
                                            <div class="w-full justify-start items-start flex-col flex gap-1">
                                                <div class="w-full justify-between items-start gap-1 inline-flex">
                                                    <h5 class="text-gray-900 text-sm font-semibold leading-snug">
                                                        {{ $item->user->name }}</h5>
                                                    <span
                                                        class="text-right text-gray-500 text-xs font-normal leading-5">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                                </div>
                                                <h5 class="text-gray-800 text-sm font-normal leading-snug">
                                                    {{ $item->feedback }}</h5>
                                            </div>
                                            <div class="justify-start items-start gap-5 inline-flex">

                                                @if ($item->user_id == auth()->user()->id)
                                                    <button wire:click="deletePost({{ $item->id }})"
                                                        class="w-5 h-5 flex items-center justify-center group">
                                                        <svg class="text-red-600 group-hover:text-red-800 transition-all duration-700 ease-in-out"
                                                            xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="18" viewBox="0 0 18 18" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M4.5835 3.16634V3.83301H1.50016C1.13197 3.83301 0.833496 4.13148 0.833496 4.49967C0.833496 4.86786 1.13197 5.16634 1.50016 5.16634L2.33356 5.16642L2.33356 11.5482C2.33354 12.6855 2.33352 13.6065 2.43103 14.3318C2.5325 15.0865 2.75042 15.7283 3.26105 16.2389C3.77168 16.7495 4.4135 16.9675 5.16821 17.0689C5.89348 17.1665 6.81445 17.1664 7.9518 17.1664H10.0486C11.186 17.1664 12.107 17.1665 12.8322 17.0689C13.5869 16.9675 14.2288 16.7495 14.7394 16.2389C15.25 15.7283 15.4679 15.0865 15.5694 14.3318C15.6669 13.6065 15.6669 12.6856 15.6669 11.5483V5.16642L16.5002 5.16634C16.8684 5.16634 17.1668 4.86786 17.1668 4.49967C17.1668 4.13148 16.8684 3.83301 16.5002 3.83301H13.4168V3.16634C13.4168 1.87768 12.3722 0.833008 11.0835 0.833008H6.91683C5.62817 0.833008 4.5835 1.87768 4.5835 3.16634ZM6.91683 2.16634C6.36455 2.16634 5.91683 2.61406 5.91683 3.16634V3.83301H12.0835V3.16634C12.0835 2.61406 11.6358 2.16634 11.0835 2.16634H6.91683ZM7.50014 7.58303C7.86833 7.58303 8.16681 7.8815 8.16681 8.24969L8.16681 12.7497C8.16681 13.1179 7.86833 13.4164 7.50014 13.4164C7.13195 13.4164 6.83348 13.1179 6.83348 12.7497L6.83348 8.24969C6.83348 7.8815 7.13195 7.58303 7.50014 7.58303ZM11.1669 8.24969C11.1669 7.8815 10.8684 7.58303 10.5002 7.58303C10.132 7.58303 9.83356 7.8815 9.83356 8.24969V12.7497C9.83356 13.1179 10.132 13.4164 10.5002 13.4164C10.8684 13.4164 11.1669 13.1179 11.1669 12.7497L11.1669 8.24969Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                    <div>
                                        No Feedbacks Available...
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="grid grid-cols-5 gap-10 mt-5">


            <div class=" col-span-3">


            </div>
        </div>


    </div>
    <x-modal wire="outline_modal" center>
        <div class="px-5 pt-5 pb-3">
            <h1 class="font-bold text-xl text-gray-600">OUTLINE DEFENSE GRADE</h1>
            <div class="mt-5">
                <x-input label="Grade" type="number" wire:model="outline_grade"
                    hint="Enter grade you want to give." />
            </div>
            <div class="mt-5">
                <x-button color="emerald" wire:click="outlineSubmit" sm>Submit Grade</x-button>
            </div>
        </div>
    </x-modal>
    <x-modal wire="final_modal" center>
        <div class="px-5 pt-5 pb-3">
            <h1 class="font-bold text-xl text-gray-600">FINAL DEFENSE GRADE</h1>
            <div class="mt-5">
                <x-input label="Grade" type="number" wire:model="final_grade"
                    hint="Enter grade you want to give." />
            </div>
            <div class="mt-5">
                <x-button color="emerald" wire:click="finalSubmit" sm>Submit Grade</x-button>
            </div>
        </div>
    </x-modal>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
