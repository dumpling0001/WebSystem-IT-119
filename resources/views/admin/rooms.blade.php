<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fafafa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .btn-primary {
            background: #007bff;
            color: #fff;
            padding: 8px 14px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary:hover {
            background: #0069d9;
        }

        .btn-warning {
            background: #ffc107;
            color: #000;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-warning:hover {
            background: #e0a800;
        }

        .btn-danger {
            background: #dc3545;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-danger:hover {
            background: #bd2130;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: #fff;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Room List</h2>

    <a href="{{ route('admin.rooms.create') }}" class="btn-primary">+ Add Room</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>Type</th>
                <th>Building</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->type ?? 'N/A' }}</td>
                <td>{{ $room->building ?? 'N/A' }}</td>

                <td>
                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn-warning">Edit</a>

                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" 
                          method="POST" 
                          style="display:inline;" 
                          onsubmit="return confirm('Delete this room?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
