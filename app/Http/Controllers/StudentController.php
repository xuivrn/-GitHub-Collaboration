<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Room;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('subject')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('students.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_number' => 'required|unique:students',
            'name' => 'required',
            'year_level' => 'required|integer|min:1|max:4',
            'program' => 'required',
            'subject_id' => 'required|exists:subjects,id',
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added!');
    }

    public function edit(Student $student)
    {
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'subjects'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_number' => 'required|unique:students,student_number,' . $student->id,
            'name' => 'required',
            'year_level' => 'required|integer|min:1|max:4',
            'program' => 'required',
            'subject_id' => 'required|exists:subjects,id',
        ]);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted!');
    }

    public function overview()
    {
        $students = Student::with('subject.room')->get();
        return view('overview', compact('students'));
    }
}