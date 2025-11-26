<!DOCTYPE html>
<html>
<head>
    <title>Subjects List</title>
</head>
<body>
    <h1>Subjects</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin.subjects.add') }}">Add Subject</a>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Subject Name</th>
            <th>Code</th>
            <th>Specialization</th> <!-- New column -->
            <th>Actions</th>
        </tr>
        @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->code }}</td>
                <td>{{ $subject->specialization ?? 'N/A' }}</td> <!-- Display specialization -->
                <td>
                    <a href="{{ route('admin.subjects.edit', $subject->id) }}">Edit</a>
                    <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this subject?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
