<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 text-gray-900 text-center">
                
                <h3 class="text-2xl font-semibold mb-2">Welcome, Admin! 👋</h3>
                <p class="text-gray-600 mb-8">Manage your rooms easily from here.</p>

                <div class="flex justify-center gap-6">
                    <a href="{{ route('admin.rooms.create') }}" 
                        class="bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600 transition">
                        ➕ Create Room
                    </a>

                    <a href="{{ route('admin.rooms.index') }}" 
                        class="bg-indigo-500 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-600 transition">
                        👀 View Rooms
                    </a>

                    <a href="{{ route('admin.manage_teachers') }}" 
                        class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-600 transition">
                        Manage Teachers
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
