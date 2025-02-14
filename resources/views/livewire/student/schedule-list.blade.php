<div>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <div class="grid grid-cols-3 gap-5">
        <div>
            <div>
                <h1 class="font-bold text-xl border-b uppercase text-gray-700">MY SCHEDULE</h1>
                <div class="mt-5">
                    <ul class="space-y-2">
                        @forelse ($eventss as $item)
                            <li class="border p-4 rounded-lg shadow cursor-pointer hover:scale-95 ">

                                <p class="truncate">{{ $item->repository->title }}</p>
                                <h1 class="text-gray-600 font-semibold">Room: {{ $item->room_number }}</h1>
                                <h1 class="text-gray-600 font-semibold">Date:
                                    {{ \Carbon\Carbon::parse($item->scheduled_date)->format('F d, Y') }}</h1>
                                <span class="text-sm">Time:
                                    {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') . ' - ' . \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}</span>
                            </li>
                        @empty
                            <li>
                                No Schedule Date...
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <div x-data="{
                events: @js($events),
                initCalendar() {
                    let calendarEl = document.getElementById('calendar');
                    let calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        eventColor: '#01ACA3',
                        events: this.events,
                        displayEventTime: false,
                        eventDidMount: function(arg) {
                            // Initialize Tippy.js for tooltips using CDN
                            tippy(arg.el, {
                                content: arg.event.extendedProps.description || 'No description',
                                placement: 'top',
                                theme: 'light', // You can choose a theme or customize
                            });
                        }
                    });
                    calendar.render();
                }
            }" x-init="initCalendar">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

</div>
