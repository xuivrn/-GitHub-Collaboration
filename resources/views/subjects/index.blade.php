@extends('layouts.app')

@section('content')
<div class="neo-card">
    <h1 class="text-2xl font-bold mb-4">Subjects</h1>
    <a href="{{ route('subjects.create') }}" class="neo-btn text-green-700">Add Subject</a>
    <table>
        <thead><tr><th>ID</th><th>Code</th><th>Name</th><th>Units</th><th>Room</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->code }}</td>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->units }}</td>
                <td>{{ $subject->room->number ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('subjects.edit', $subject) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline;">
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