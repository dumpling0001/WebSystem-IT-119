<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Load;
use Illuminate\Support\Facades\Auth;
use PDF; // Make sure this is exactly like this, no "use Barryvdh\DomPDF\Facade\Pdf;"

class TeacherController extends Controller
{
    public function index()
    {
        $teacherId = Auth::id();

        // Get loads for this teacher with subject and room info
        $loads = Load::with(['subject', 'room'])
            ->where('teacher_id', $teacherId)
            ->get();

        return view('teacher.dashboard', compact('loads'));
    }

    public function downloadSchedule()
    {
        $teacherId = Auth::id();

        // Get the teacher's loads
        $loads = Load::with(['subject', 'room'])
            ->where('teacher_id', $teacherId)
            ->get();

        // Generate PDF
        $pdf = PDF::loadView('teacher.schedule_pdf', compact('loads'));

        return $pdf->download('my_schedule.pdf'); // Downloads as PDF
    }
}
