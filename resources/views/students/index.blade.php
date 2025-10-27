@extends('layouts.app')

@section('content')
<div class="neo-card">
    <h1 class="text-2xl font-bold mb-4">Students (DMMMSU CIT IT Students)</h1>
    <a href="{{ route('students.create') }}" class="neo-btn text-green-700">Add Student</a>
    <table>
        <thead><tr><th>ID</th><th>Student No.</th><th>Name</th><th>Year</th><th>Program</th><th>Subject</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->student_number }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->year_level }}</td>
                <td>{{ $student->program }}</td>
                <td>{{ $student->subject->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('students.edit', $student) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="delete-btn text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection