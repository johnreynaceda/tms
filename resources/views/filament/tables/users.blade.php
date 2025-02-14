<div class="ml-3 py-2">
    <div class="flex -space-x-2 overflow-hidden">
        @foreach ($getRecord()->studentRepositories as $item)
            <img class="inline-block size-10 rounded-full ring-2 h-12 w-12 ring-white"
                src="{{ asset('images/sksu_logo.png') }}" alt="">
        @endforeach
    </div>
</div>
