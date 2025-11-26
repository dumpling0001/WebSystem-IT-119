<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Load;
use App\Models\User;
use App\Models\Subject;
use App\Models\Room;

class LoadController extends Controller
{
    // Display all loads
    public function index()
    {
        $loads = Load::with(['teacher', 'subject', 'room'])->get();
        $teachers = User::where('role', 'teacher')->get();
        $subjects = Subject::all();
        $rooms = Room::all();

        return view('admin.manage_loads', compact('loads', 'teachers', 'subjects', 'rooms'));
    }

    // Store a new load with schedule conflict check
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'room_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        // --- CHECK FOR SCHEDULE CONFLICT ---
        $conflict = Load::where('room_id', $request->room_id)
            ->where('day', $request->day)
            ->where(function($query) use ($request) {
                $query->where('start_time', '<', $request->end_time)
                      ->where('end_time', '>', $request->start_time);
            })
            ->exists();

        if ($conflict) {
            return back()->with('error', 'Schedule conflict! This room is already booked at that time.');
        }

        // No conflict → save
        Load::create([
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'room_id' => $request->room_id,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return back()->with('success', 'Load assigned successfully!');
    }

    // Delete a load
    public function destroy($id)
    {
        Load::findOrFail($id)->delete();
        return back()->with('success', 'Load deleted successfully.');
    }

    // AJAX: Get subjects based on teacher's specialization
    public function getSubjects(Request $request)
    {
        $teacher = User::find($request->teacher_id);

        $subjects = [];
        if ($teacher) {
            $subjects = Subject::where('specialization', $teacher->specialization)->get();
        }

        return response()->json($subjects);
    }
}
