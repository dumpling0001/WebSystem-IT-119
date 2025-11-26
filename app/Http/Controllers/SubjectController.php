<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User; 

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject-list', compact('subjects'));
    }

    public function create()
    {
        $specializations = User::distinct()->pluck('specialization')->filter();
        return view('admin.subject-add', compact('specializations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code',
            'description' => 'nullable|string',
            'specialization' => 'required|string|max:255', 
        ]);

        Subject::create($request->all());

        return redirect()->route('admin.subjects.list')->with('success', 'Subject added successfully.');
    }

    public function edit(Subject $subject)
    {
        $specializations = User::distinct()->pluck('specialization')->filter();
        return view('admin.subject-edit', compact('subject', 'specializations'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code,' . $subject->id,
            'description' => 'nullable|string',
            'specialization' => 'required|string|max:255',
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
