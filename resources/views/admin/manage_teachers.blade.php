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
            <th>Specialization</th>
            <th>Actions</th>
        </tr>

        @php
            // Your FULL list of specializations
            $specializationList = [
                'Bachelor of Early Childhood Education',
                'Bachelor of Elementary Education',
                'Bachelor of Special Needs Education',
                'Bachelor of Physical Education',
                'Bachelor of Technology and Livelihood Education',
                'Bachelor of Secondary Education (Major in Science, Filipino, English, Social Science, Mathematics, and Values Education)',
                'Bachelor of Arts in Communication',
                'Bachelor of Arts in Political Science',
                'Bachelor of Arts in English Language',
                'Bachelor of Science in Social Work',
                'Bachelor of Science in Biology (with Specialization in Medical Biology, Environmental Biology, and Molecular Biology)',
                'Bachelor of Science in Information Technology',
                'Bachelor of Library and Information Science',
                'Bachelor of Music in Music Education'
            ];
        @endphp

        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>

                {{-- Role --}}
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

                {{-- SPECIALIZATION (RENAMED FROM DEPARTMENT) --}}
                <td>
                    <form action="{{ route('admin.manage_teachers.updateDepartment', $teacher->id) }}" method="POST">
                        @csrf
                        <select name="department" onchange="this.form.submit()">
                            <option value="">Select Specialization</option>
                            @foreach($specializationList as $spec)
                                <option value="{{ $spec }}" {{ $teacher->department == $spec ? 'selected' : '' }}>
                                    {{ $spec }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </td>

                {{-- Delete --}}
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
