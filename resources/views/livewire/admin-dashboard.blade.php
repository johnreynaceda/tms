<div>
    <div class="grid grid-cols-4 gap-5">
        <div class="bg-gray-100 rounded-xl p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold uppercase text-gray-700">Deans</div>
                <div class="text-green-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-square-user">
                        <rect width="18" height="18" x="3" y="3" rx="2" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M7 21v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2" />
                    </svg></div>
            </div>
            <p class="text-5xl font-bold text-green-700">{{ \App\Models\User::where('user_type', 'dean')->count() }}</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide absolute -bottom-5 right-0 text-gray-200/50 lucide-square-user">
                <rect width="18" height="18" x="3" y="3" rx="2" />
                <circle cx="12" cy="10" r="3" />
                <path d="M7 21v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2" />
            </svg>
        </div>
        <div class="bg-gray-100 rounded-xl p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold uppercase text-gray-700">PROGRAM CHAIRS</div>
                <div class="text-green-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-users">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg></div>
            </div>
            <p class="text-5xl font-bold text-green-700">
                {{ \App\Models\User::where('user_type', 'program_chair')->count() }}</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-users absolute -bottom-5 right-0 text-gray-200/50">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
        </div>
        <div class="bg-gray-100 rounded-xl p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold uppercase text-gray-700">TEACHERS</div>
                <div class="text-green-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-users">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg></div>
            </div>
            <p class="text-5xl font-bold text-green-700">{{ \App\Models\User::where('user_type', 'teacher')->count() }}
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-users absolute -bottom-5 right-0 text-gray-200/50">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
        </div>
        <div class="bg-gray-100 rounded-xl p-6 relative overflow-hidden">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold uppercase text-gray-700">STUDENTS</div>
                <div class="text-green-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg></div>
            </div>
            <p class="text-5xl font-bold text-green-700">{{ \App\Models\User::where('user_type', 'student')->count() }}
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-user absolute -bottom-5 right-0 text-gray-200/50">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
        </div>
    </div>
    <div class="mt-10">
        <h1 class="text-2xl font-bold text-green-700">STUDENT REPOSITORIES</h1>
        <div class="mt-5">
            {{ $this->table }}
        </div>
    </div>
</div>
