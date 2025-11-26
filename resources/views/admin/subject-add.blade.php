<!DOCTYPE html>
<html>
<head>
    <title>Add Subject</title>
</head>
<body>
    <h1>Add New Subject</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.subjects.store') }}" method="POST">
        @csrf

        <label>Subject Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Subject Code:</label><br>
        <input type="text" name="code" required><br><br>

        <label>Specialization:</label><br>
        <select name="specialization" required>
            <option value="">-- Choose Specialization --</option>
            <option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option>
            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
            <option value="Bachelor of Special Needs Education">Bachelor of Special Needs Education</option>
            <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
            <option value="Bachelor of Technology and Livelihood Education">Bachelor of Technology and Livelihood Education</option>
            <option value="Bachelor of Secondary Education (Major in Science, Filipino, English, Social Science, Mathematics, and Values Education)">Bachelor of Secondary Education (Major in Science, Filipino, English, Social Science, Mathematics, and Values Education)</option>
            <option value="Bachelor of Arts in Communication">Bachelor of Arts in Communication</option>
            <option value="Bachelor of Arts in Political Science">Bachelor of Arts in Political Science</option>
            <option value="Bachelor of Arts in English Language">Bachelor of Arts in English Language</option>
            <option value="Bachelor of Science in Social Work">Bachelor of Science in Social Work</option>
            <option value="Bachelor of Science in Biology (with Specialization in Medical Biology, Environmental Biology, and Molecular Biology)">Bachelor of Science in Biology (with Specialization in Medical Biology, Environmental Biology, and Molecular Biology)</option>
            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
            <option value="Bachelor of Library and Information Science">Bachelor of Library and Information Science</option>
            <option value="Bachelor of Music in Music Education">Bachelor of Music in Music Education</option>
        </select>
        <br><br>

        <button type="submit">Add Subject</button>
    </form>

    <br>
    <a href="{{ route('admin.subjects.list') }}">Back to List</a>
</body>
</html>
