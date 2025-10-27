@extends('layouts.app')

@section('content')
<div class="neo-card">
    <h1 class="text-2xl font-bold mb-4">Edit Student</h1>
    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf @method('PUT')
        <div><label>Student Number</label><input type="text" name="student_number" value="{{ $student->student_number }}" required></div>
        <div><label>Name</label><input type="text" name="name" value="{{ $student->name }}" required></div>
        <div><label>Year Level</label><input type="number" name="year_level" value="{{ $student->year_level }}" min="1" max="4" required></div>
        <div><label>Program</label><input type="text" name="program" value="{{ $student->program }}" readonly></div>
        <div><label>Assign Subject</label>
            <select name="subject_id" required>
                @foreach(\App\Models\Subject::all() as $subject)
                <option value="{{ $subject->id }}" {{ $student->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="neo-btn text-green-700">Update</button>
    </form>
</div>
@endsection