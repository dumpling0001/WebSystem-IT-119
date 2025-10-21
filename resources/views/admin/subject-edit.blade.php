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
        <input type="text" name="name" value="{{ $subject->name }}" required><br><br>

        <label>Subject Code:</label><br>
        <input type="text" name="code" value="{{ $subject->code }}" required><br><br>

        <button type="submit">Update Subject</button>
    </form>

    <br>
    <a href="{{ route('admin.subjects.list') }}">Back to List</a>
</body>
</html>
