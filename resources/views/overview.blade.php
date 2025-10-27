@extends('layouts.app')

@section('content')
<div class="neo-card">
    <h1 class="text-2xl font-bold mb-4">Enrollment Overview</h1>
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Number</th>
                <th>Name</th>
                <th>Year Level</th>
                <th>Program</th>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Units</th>
                <th>Room Number</th>
                <th>Building</th>
                <th>Capacity</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->student_number }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->year_level }}</td>
                <td>{{ $student->program }}</td>
                <td>{{ $student->subject->code ?? 'N/A' }}</td>
                <td>{{ $student->subject->name ?? 'N/A' }}</td>
                <td>{{ $student->subject->units ?? 'N/A' }}</td>
                <td>{{ $student->subject->room->number ?? 'N/A' }}</td>
                <td>{{ $student->subject->room->building ?? 'N/A' }}</td>
                <td>{{ $student->subject->room->capacity ?? 'N/A' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="11" class="text-center">No students enrolled yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection