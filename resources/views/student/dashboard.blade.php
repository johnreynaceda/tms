@section('title', 'Dashboard')
<x-admin-layout>
    <div>
        @if (auth()->user()->student->studentRepository)
            <h1 class="text-2xl font-bold text-gray-600">
                {{ auth()->user()->student->studentRepository->repository->name }}</h1>
        @else
            <div class="grid place-content-center">
                <x-shared.null class="h-96" />

                <h1 class="text-center mt-5 text-xl text-gray-500">No Repository Assigned!</h1>
            </div>
        @endif
    </div>
</x-admin-layout>
