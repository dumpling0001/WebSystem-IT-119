<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Teacher Dashboard
        </h2>
    </x-slot>

    <div class="py-8 max-w-5xl mx-auto">

        <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="text-xl font-semibold mb-6">Your Class Schedule</h3>

            @if($loads->count() == 0)
                <p class="text-gray-500 text-sm">No assigned schedule yet.</p>
            @else
                <table class="w-full border border-gray-200 rounded mb-6">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-3 text-left">Subject</th>
                            <th class="border p-3 text-left">Room</th>
                            <th class="border p-3 text-left">Day</th>
                            <th class="border p-3 text-left">Time</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($loads as $load)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-3">{{ $load->subject->name ?? 'N/A' }}</td>
                                <td class="border p-3">{{ $load->room->name ?? 'N/A' }}</td>
                                <td class="border p-3">{{ $load->day ?? 'N/A' }}</td>
                                <td class="border p-3">
                                    {{ \Carbon\Carbon::parse($load->start_time)->format('h:i A') }} -
                                    {{ \Carbon\Carbon::parse($load->end_time)->format('h:i A') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('teacher.schedule.download') }}" 
                    style="display:inline-block; background-color:#1d4ed8; color:white; font-weight:500; padding:10px 20px; border-radius:8px; text-decoration:none;">
                    Download Schedule as PDF
                </a>

            @endif

        </div>
    </div>
</x-app-layout>
