<div class="container">
    <h2>Rooms</h2>

    <!-- ✅ Fixed route name -->
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary mb-3">Add Room</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->type }}</td>
                    <td>
                        <!-- ✅ Fixed route names below -->
                        <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
