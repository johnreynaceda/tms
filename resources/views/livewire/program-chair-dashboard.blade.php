<div>
    <div class="grid grid-cols-4 gap-5">
        <div class="bg-gray-100 rounded-xl p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold uppercase text-gray-700">STUDENTS</div>
                <div class="text-green-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg></div>
            </div>
            <p class="text-5xl font-bold text-green-700">{{ $student }}
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-user absolute -bottom-5 right-0 text-gray-200/50">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
        </div>
        <div class="bg-gray-100 rounded-xl p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold uppercase text-gray-700">REPOSITORIES</div>
                <div class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-file-chart-column">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <path d="M8 18v-1" />
                        <path d="M12 18v-6" />
                        <path d="M16 18v-3" />
                    </svg>
                </div>
            </div>
            <p class="text-5xl font-bold text-green-700">
                {{ $repository }}</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-file-chart-column absolute -bottom-5 right-0 text-gray-200/50">
                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                <path d="M8 18v-1" />
                <path d="M12 18v-6" />
                <path d="M16 18v-3" />
            </svg>
        </div>
    </div>

    <div class="mt-10">
        <h1 class="text-2xl font-bold text-green-700">SCHEDULES</h1>
        <div class="mt-5">
            {{ $this->table }}
        </div>
    </div>
</div>
