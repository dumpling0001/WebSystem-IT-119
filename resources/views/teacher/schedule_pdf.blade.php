<!DOCTYPE html>
<html>
<head>
    <title>My Schedule</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>My Class Schedule</h2>

    <table>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Room</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loads as $load)
            <tr>
                <td>{{ $load->subject->subject_name ?? 'N/A' }}</td>
                <td>{{ $load->room->room_name ?? 'N/A' }}</td>
                <td>{{ $load->day }}</td>
                <td>{{ \Carbon\Carbon::parse($load->start_time)->format('h:i A') }}</td>
                <td>{{ \Carbon\Carbon::parse($load->end_time)->format('h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
