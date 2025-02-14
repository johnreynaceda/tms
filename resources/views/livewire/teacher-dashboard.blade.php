<div>
    <div class="grid grid-cols-4 gap-5">
        <div class="bg-gray-100 rounded-xl p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold uppercase text-gray-700">REPOSITORIES</div>
                <div class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-file-archive">
                        <path d="M10 12v-1" />
                        <path d="M10 18v-2" />
                        <path d="M10 7V6" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <path d="M15.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v16a2 2 0 0 0 .274 1.01" />
                        <circle cx="10" cy="20" r="2" />
                    </svg>
                </div>
            </div>
            <p class="text-5xl font-bold text-green-700">{{ $repository }}
            </p>

            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-file-archive absolute -bottom-5 right-0 text-gray-200/50">
                <path d="M10 12v-1" />
                <path d="M10 18v-2" />
                <path d="M10 7V6" />
                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                <path d="M15.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v16a2 2 0 0 0 .274 1.01" />
                <circle cx="10" cy="20" r="2" />
            </svg>
        </div>
        <div class="bg-gray-100 rounded-xl p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold uppercase text-gray-700">SCHEDULES</div>
                <div class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-calendar-1">
                        <path d="M11 14h1v4" />
                        <path d="M16 2v4" />
                        <path d="M3 10h18" />
                        <path d="M8 2v4" />
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                    </svg>
                </div>
            </div>
            <p class="text-5xl font-bold text-green-700">{{ $schedules }}
            </p>

            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-calendar-1 absolute -bottom-5 right-0 text-gray-200/50">
                <path d="M11 14h1v4" />
                <path d="M16 2v4" />
                <path d="M3 10h18" />
                <path d="M8 2v4" />
                <rect x="3" y="4" width="18" height="18" rx="2" />
            </svg>
        </div>
    </div>
</div>
