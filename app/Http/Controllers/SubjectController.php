<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        // ✅ Matches: resources/views/admin/subject-list.blade.php
        return view('admin.subject-list', compact('subjects'));
    }

    public function create()
    {
        // ✅ Matches: resources/views/admin/subject-add.blade.php
        return view('admin.subject-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code',
            'description' => 'nullable|string',
        ]);

        Subject::create($request->all());

        // ✅ Redirects to the correct route name
        return redirect()->route('admin.subjects.list')->with('success', 'Subject added successfully.');
    }

    public function edit(Subject $subject)
    {
        // ✅ Matches: resources/views/admin/subject-edit.blade.php
        return view('admin.subject-edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code,' . $subject->id,
            'description' => 'nullable|string',
        ]);

        $subject->update($request->all());

        return redirect()->route('admin.subjects.list')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return back()->with('success', 'Subject deleted successfully.');
    }
}
