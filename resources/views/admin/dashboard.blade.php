<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex items-center gap-2">
            🧭 Admin Dashboard
        </h2>
    </x-slot>

    <!-- Grid layout for buttons -->
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Create Room -->
    <a href="{{ route('admin.rooms.create') }}" 
       class="group bg-gradient-to-br from-green-500 to-green-600 text-white px-6 py-6 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 text-center text-lg font-semibold">
        ➕ Create Room
    </a>

    <!-- View Rooms -->
    <a href="{{ route('admin.rooms.index') }}" 
       class="group bg-gradient-to-br from-blue-500 to-indigo-600 text-white px-6 py-6 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 text-center text-lg font-semibold">
        👀 View Rooms
    </a>

    <!-- Manage Teachers -->
    <a href="{{ route('admin.manage_teachers') }}" 
       class="group bg-gradient-to-br from-purple-500 to-purple-600 text-white px-6 py-6 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 text-center text-lg font-semibold">
        👩‍🏫 Manage Teachers
    </a>

    <!-- Manage Subjects -->
    <a href="{{ route('admin.subjects.list') }}" 
       class="group bg-gradient-to-br from-sky-500 to-blue-600 text-white px-6 py-6 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 text-center text-lg font-semibold">
        📘 Manage Subjects
    </a>

</div>

</x-app-layout>
