<!DOCTYPE html>
<html>
<head>
    <title>Edit Subject</title>
</head>
<body>
    <h1>Edit Subject</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Subject Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $subject->name) }}" required><br><br>

        <label>Subject Code:</label><br>
        <input type="text" name="code" value="{{ old('code', $subject->code) }}" required><br><br>

        <label>Specialization:</label><br>
        <select name="specialization" required>
            <option value="">-- Choose Specialization --</option>
            @php
                $specializations = [
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
                    'Bachelor of Music in Music Education',
                ];
            @endphp

            @foreach($specializations as $spec)
                <option value="{{ $spec }}" {{ old('specialization', $subject->specialization) == $spec ? 'selected' : '' }}>
                    {{ $spec }}
                </option>
            @endforeach
        </select>
        <br><br>

        <button type="submit">Update Subject</button>
    </form>

    <br>
    <a href="{{ route('admin.subjects.list') }}">Back to List</a>
</body>
</html>
                