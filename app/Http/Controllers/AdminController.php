<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageTeachers()
    {
        $teachers = User::whereIn('role', ['teacher', 'faculty'])->get();
        return view('admin.manage_teachers', compact('teachers'));
    }

    public function updateTeacherRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Role updated successfully.');
    }

    public function updateTeacherDepartment(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->department = $request->department;
        $user->save();

        return back()->with('success', 'Department updated successfully.');
    }

    public function updateTeacherSpecialization(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->specialization = $request->specialization;
        $user->save();

        return back()->with('success', 'Specialization updated successfully.');
    }

    public function deleteTeacher($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Teacher deleted successfully.');
    }
}
