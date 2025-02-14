<div>
    <div class="bg-gray-100 shadow-md   relative  rounded-xl">
        <div class="flex justify-between items-center bg-gray-100 p-5 sticky top-0">
            <div class="flex space-x-3 text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-file-check-2">
                    <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                    <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                    <path d="m3 15 2 2 4-4" />
                </svg>
                <span class="font-semibold">UPLOADED PAYMENTS</span>
            </div>
        </div>
        <div class="mb-5 px-5">
            <div class="mb-2">
                {{ $this->form }}
            </div>

            <div class="flex justify-end relative ">
                <x-button text="Upload" color="gray" icon="arrow-up-tray" sm wire:click="uploadFile"
                    loading="uploadFile" />
            </div>
        </div>
        <ul class=" px-5 pb-5 space-y-2 overflow-y-auto h-96">
            @forelse ($documentss as $item)
                <li class="bg-white shadow-sm rounded-lg p-2 px-4 ">
                    <div class="text-right text-xs justify-end">{{ $item->created_at->diffForHumans() }}</div>
                    <div class="flex mt-2 justify-between space-x-2">
                        <div class="flex space-x-2  text-gray-600 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-file-box">
                                <path d="M14.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                <path
                                    d="M3 13.1a2 2 0 0 0-1 1.76v3.24a2 2 0 0 0 .97 1.78L6 21.7a2 2 0 0 0 2.03.01L11 19.9a2 2 0 0 0 1-1.76V14.9a2 2 0 0 0-.97-1.78L8 11.3a2 2 0 0 0-2.03-.01Z" />
                                <path d="M7 17v5" />
                                <path d="M11.7 14.2 7 17l-4.7-2.8" />
                            </svg>
                            <p class="truncate w-64">{{ $item->name }}</p>
                        </div>
                        <div class="flex space-x-2 ">
                            <x-button xs color="gray" href="{{ Storage::url($item->document_path) }}" target="_blank"
                                icon="eye" position="right">View</x-button>
                            <x-button xs wire:click="deleteDocument({{ $item->id }})" color="red" icon="trash"
                                position="right">Delete</x-button>
                        </div>
                    </div>
                </li>
            @empty
                <li>
                    <p class="text-center text-gray-500">No uploaded payments found.</p>
                </li>
            @endforelse


        </ul>
    </div>
</div>
