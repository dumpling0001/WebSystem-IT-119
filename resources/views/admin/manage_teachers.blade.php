<!DOCTYPE html>
<html>
<head>
    <title>Manage Teachers</title>
</head>
<body>
    <h1>Manage Teachers</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>
                    <form action="{{ route('admin.manage_teachers.updateRole', $teacher->id) }}" method="POST">
                        @csrf
                        <select name="role" onchange="this.form.submit()">
                            <option value="teacher" {{ $teacher->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="faculty" {{ $teacher->role == 'faculty' ? 'selected' : '' }}>Faculty</option>
                            <option value="admin" {{ $teacher->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form action="{{ route('admin.manage_teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Delete this teacher?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</body>
</html>
