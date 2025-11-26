<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
             Admin Dashboard
        </h2>
    </x-slot>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Button Component -->
        @php
            $buttons = [
                ['route' => 'admin.rooms.create',      'label' => ' Create Room',     'color' => 'from-green-500 to-green-600'],
                ['route' => 'admin.rooms.index',       'label' => ' View Rooms',      'color' => 'from-blue-500 to-indigo-600'],
                ['route' => 'admin.manage_teachers',   'label' => ' Manage Teachers','color' => 'from-purple-500 to-purple-600'],
                ['route' => 'admin.subjects.list',     'label' => ' Manage Subjects', 'color' => 'from-sky-500 to-blue-600'],
            ];
        @endphp

        @foreach ($buttons as $btn)
            <a href="{{ route($btn['route']) }}" 
               class="bg-gradient-to-br {{ $btn['color'] }} text-white px-6 py-6 rounded-xl shadow-md 
                      hover:shadow-lg transition transform hover:-translate-y-1 text-center text-lg font-semibold">
                {{ $btn['label'] }}
            </a>
        @endforeach

    </div>
</x-app-layout>
