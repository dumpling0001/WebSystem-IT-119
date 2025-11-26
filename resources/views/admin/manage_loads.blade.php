<!DOCTYPE html>
<html>
<head>
    <title>Assign Teacher Load</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; padding: 20px; }
        .container { max-width: 800px; margin: auto; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px; }
        input, select, button { width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc; }
        button { background-color: #2563eb; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #1d4ed8; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f3f4f6; }
        .delete-btn { background-color: #dc2626; }
        .delete-btn:hover { background-color: #b91c1c; }
    </style>
</head>
<body>
<div class="container">
    <h1>🧭 Assign Teacher Load</h1>

    <!-- Assign Load Form -->
    <div class="card">
        @if(session('error'))
            <p style="color: red; font-weight: bold; margin-bottom: 10px;">
                {{ session('error') }}
            </p>
        @endif

        @if(session('success'))
            <p style="color: green; font-weight: bold; margin-bottom: 10px;">
                {{ session('success') }}
            </p>
        @endif
        <form action="{{ route('admin.loads.store') }}" method="POST">
            @csrf

            <label for="teacher_id">Select Teacher</label>
            <select name="teacher_id" id="teacher_id" required>
                <option value="">-- Choose a Teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>

            <label for="subject_id">Select Subject</label>
            <select name="subject_id" id="subject_id" required>
                <option value="">-- Choose a Subject --</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>

            <label for="room_id">Select Room</label>
            <select name="room_id" id="room_id" required>
                <option value="">-- Choose a Room --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>

            <label for="day">Day</label>
            <select name="day" id="day" required>
                <option value="">-- Choose Day --</option>
                <option value="MTH">MTH</option>
                <option value="TF">TF</option>
                <option value="SAT">SAT</option>
            </select>

            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" id="start_time" required>

            <label for="end_time">End Time</label>
            <input type="time" name="end_time" id="end_time" required>

            <button type="submit">Assign Load</button>
        </form>
    </div>

    <!-- Display Assigned Loads -->
    <div class="card">
        <h3>Teacher Schedule</h3>
        <table>
            <thead>
                <tr>
                    <th>Teacher</th>
                    <th>Subject</th>
                    <th>Room</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($loads as $load)
                <tr>
                    <td>{{ $load->teacher->name ?? 'N/A' }}</td>
                    <td>{{ $load->subject->name ?? 'N/A' }}</td>
                    <td>{{ $load->room->name ?? 'N/A' }}</td>
                    <td>{{ $load->day }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($load->start_time)->format('h:i A') }} -
                        {{ \Carbon\Carbon::parse($load->end_time)->format('h:i A') }}
                    </td>
                    <td>
                        <form action="{{ route('admin.loads.destroy', $load->id) }}" method="POST" onsubmit="return confirm('Delete this load?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No loads assigned yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#teacher_id').change(function() {
        var teacherId = $(this).val();

        if(teacherId) {
            $.ajax({
                url: "{{ route('admin.getSubjects') }}",
                type: 'GET',
                data: { teacher_id: teacherId },
                success: function(data) {
                    var subjectSelect = $('#subject_id');
                    subjectSelect.empty(); 
                    subjectSelect.append('<option value="">-- Choose a Subject --</option>');
                    $.each(data, function(key, subject) {
                        subjectSelect.append('<option value="'+subject.id+'">'+subject.name+'</option>');
                    });
                },
                error: function() {
                    alert('Failed to fetch subjects for this teacher.');
                }
            });
        } else {
            $('#subject_id').empty().append('<option value="">-- Choose a Subject --</option>');
        }
    });
});
</script>
</body>
</html>
