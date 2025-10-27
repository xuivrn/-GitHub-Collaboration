@extends('layouts.app')

@section('content')
<div class="neo-card">
    <h1 class="text-2xl font-bold mb-4">Rooms</h1>
    <a href="{{ route('rooms.create') }}" class="neo-btn text-green-700">Add Room</a>
    <table>
        <thead><tr><th>ID</th><th>Number</th><th>Building</th><th>Capacity</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->number }}</td>
                <td>{{ $room->building }}</td>
                <td>{{ $room->capacity }}</td>
                <td>
                    <a href="{{ route('rooms.edit', $room) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
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