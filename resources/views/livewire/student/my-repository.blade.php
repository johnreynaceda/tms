<div x-data="{ modalOpen: @entangle('add_modal') }" wire:ignore>
    <div class=" grid grid-cols-5 gap-10">
        <div class="col-span-5">
            <div class="h1 text-2xl text-left text-gray-700 font-semibold">TITLE: {{ $repository->repository->name }}
            </div>


            <div class="mt-5">
                <div class="flex space-x-2 text-green-600 border-b">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-users">
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
        </div>

    </div>
    <div class="mt-10 grid grid-cols-2 gap-10">
        <div class="">
            <div class="bg-gray-100 shadow-md   relative  rounded-xl">
                <div class="flex justify-between items-center bg-gray-100 p-5 sticky top-0">
                    <div class="flex space-x-3 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-file-check-2">
                            <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                            <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                            <path d="m3 15 2 2 4-4" />
                        </svg>
                        <span class="font-semibold">UPLOADED DOCUMENTS</span>
                    </div>
                </div>
                <div class="mb-5 px-5">
                    <div class="mb-2">
                        {{ $this->form }}
                    </div>

                    <div class="flex justify-end relative ">
                        <x-button text="Upload" color="emerald" icon="arrow-up-tray" sm wire:click="uploadFile"
                            loading="uploadFile" />
                    </div>
                </div>
                <ul class=" px-5 pb-5 space-y-2 overflow-y-auto h-96">
                    @forelse ($documentss as $item)
                        <li class="bg-white shadow-sm rounded-lg p-2 px-4 ">
                            <div class="text-right text-xs justify-end">{{ $item->created_at->diffForHumans() }}</div>
                            <div class="flex mt-2 justify-between space-x-2">
                                <div class="flex space-x-2  text-green-600 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-file-type-2">
                                        <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                        <path d="M2 13v-1h6v1" />
                                        <path d="M5 12v6" />
                                        <path d="M4 18h2" />
                                    </svg>
                                    <p class="truncate w-64">{{ $item->name }}</p>
                                </div>
                                <div class="flex space-x-2 ">
                                    <x-button xs color="green" href="{{ Storage::url($item->document_path) }}"
                                        target="_blank" icon="eye" position="right">View</x-button>
                                    <x-button xs wire:click="deleteDocument({{ $item->id }})" color="red"
                                        icon="trash" position="right">Delete</x-button>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li>
                            <p class="text-center text-gray-500">No uploaded documents found.</p>
                        </li>
                    @endforelse


                </ul>
            </div>
            <div class="mt-10">
                <livewire:upload-payment />
            </div>
        </div>
        <div class="">
            <section class="relative">
                <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
                    <div class="w-full flex-col justify-start items-start gap-5 inline-flex">
                        <h2 class="w-full text-gray-900 text-4xl font-bold font-manrope leading-normal">Feedbacks
                        </h2>
                        <div class="w-full flex-col justify-start items-start gap-5 flex">
                            <div class="w-full rounded-3xl justify-start items-start gap-3.5 inline-flex">

                                <textarea name="" rows="5" wire:model.live="feedback"
                                    class="w-full px-5 py-3 rounded-2xl border border-gray-300 shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] resize-none focus:outline-none placeholder-gray-400 text-gray-900 text-lg font-normal leading-7"
                                    placeholder="Write a your thoughts here...."></textarea>
                            </div>
                            <button wire:click="postFeedback"
                                class="px-5 py-2.5 bg-green-600 hover:bg-green-800 transition-all duration-700 ease-in-out rounded-xl shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] justify-center items-center flex">
                                <span class="px-2 py-px text-white text-base font-semibold leading-relaxed">Post
                                    your feedback</span>
                            </button>

                        </div>
                        <div class="w-full flex-col mt-5 justify-start items-start gap-8 flex ">
                            @forelse ($feedbacks as $item)
                                <div
                                    class="w-full pb-2 border-b border-gray-300 justify-start items-start gap-2.5 inline-flex">
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
                                                <a href=""
                                                    class="w-5 h-5 flex items-center justify-center group">
                                                    <svg class="text-red-600 group-hover:text-red-800 transition-all duration-700 ease-in-out"
                                                        xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 18 18" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M4.5835 3.16634V3.83301H1.50016C1.13197 3.83301 0.833496 4.13148 0.833496 4.49967C0.833496 4.86786 1.13197 5.16634 1.50016 5.16634L2.33356 5.16642L2.33356 11.5482C2.33354 12.6855 2.33352 13.6065 2.43103 14.3318C2.5325 15.0865 2.75042 15.7283 3.26105 16.2389C3.77168 16.7495 4.4135 16.9675 5.16821 17.0689C5.89348 17.1665 6.81445 17.1664 7.9518 17.1664H10.0486C11.186 17.1664 12.107 17.1665 12.8322 17.0689C13.5869 16.9675 14.2288 16.7495 14.7394 16.2389C15.25 15.7283 15.4679 15.0865 15.5694 14.3318C15.6669 13.6065 15.6669 12.6856 15.6669 11.5483V5.16642L16.5002 5.16634C16.8684 5.16634 17.1668 4.86786 17.1668 4.49967C17.1668 4.13148 16.8684 3.83301 16.5002 3.83301H13.4168V3.16634C13.4168 1.87768 12.3722 0.833008 11.0835 0.833008H6.91683C5.62817 0.833008 4.5835 1.87768 4.5835 3.16634ZM6.91683 2.16634C6.36455 2.16634 5.91683 2.61406 5.91683 3.16634V3.83301H12.0835V3.16634C12.0835 2.61406 11.6358 2.16634 11.0835 2.16634H6.91683ZM7.50014 7.58303C7.86833 7.58303 8.16681 7.8815 8.16681 8.24969L8.16681 12.7497C8.16681 13.1179 7.86833 13.4164 7.50014 13.4164C7.13195 13.4164 6.83348 13.1179 6.83348 12.7497L6.83348 8.24969C6.83348 7.8815 7.13195 7.58303 7.50014 7.58303ZM11.1669 8.24969C11.1669 7.8815 10.8684 7.58303 10.5002 7.58303C10.132 7.58303 9.83356 7.8815 9.83356 8.24969V12.7497C9.83356 13.1179 10.132 13.4164 10.5002 13.4164C10.8684 13.4164 11.1669 13.1179 11.1669 12.7497L11.1669 8.24969Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </a>
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
                        <div class="mt-2 ">
                            {{ $feedbacks->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="relative z-50 w-auto h-auto">
        <template x-teleport="body">
            <div x-show="modalOpen"
                class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                <!-- Overlay Background -->
                <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="absolute inset-0 w-full h-full bg-black bg-opacity-40">
                </div>
                <!-- Modal Content -->
                <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between pb-2">
                        <h3 class="text-lg font-semibold">Upload Documents</h3>
                        <button @click="modalOpen=false"
                            class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- Modal Body -->
                    <div class="relative w-auto">
                        <div class="mt-5">
                            {{ $this->form }}
                        </div>
                        <div class="mt-3 z-50 relative">
                            <x-button text="Upload" color="emerald" icon="arrow-up-tray" sm wire:click="uploadFile"
                                loading="uploadFile" />
                        </div>
                    </div>
                </div>
            </div>
        </template>

    </div>
</div>
