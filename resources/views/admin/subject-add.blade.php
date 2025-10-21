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

        <button type="submit">Add Subject</button>
    </form>

    <br>
    <a href="{{ route('admin.subjects.list') }}">Back to List</a>
</body>
</html>
