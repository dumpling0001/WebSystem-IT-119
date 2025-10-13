<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto mt-12 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Add New Room</h2>

        <form action="{{ route('admin.rooms.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Room Name:</label>
                <input type="text" name="name" id="name" class="border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="capacity" class="block text-gray-700">Capacity:</label>
                <input type="number" name="capacity" id="capacity" class="border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="type" class="block text-gray-700">Type (optional):</label>
                <input type="text" name="type" id="type" class="border-gray-300 rounded-md w-full">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                Save Room
            </button>
        </form>
    </div>

</body>
</html>
