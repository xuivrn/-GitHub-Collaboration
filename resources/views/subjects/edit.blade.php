@extends('layouts.app')

@section('content')
<div class="neo-card">
    <h1 class="text-2xl font-bold mb-4">Edit Subject</h1>
    <form action="{{ route('subjects.update', $subject) }}" method="POST">
        @csrf @method('PUT')
        <div><label>Code</label><input type="text" name="code" value="{{ $subject->code }}" required></div>
        <div><label>Name</label><input type="text" name="name" value="{{ $subject->name }}" required></div>
        <div><label>Units</label><input type="number" name="units" value="{{ $subject->units }}" required></div>
        <div><label>Room</label>
            <select name="room_id" required>
                @foreach(\App\Models\Room::all() as $room)
                <option value="{{ $room->id }}" {{ $subject->room_id == $room->id ? 'selected' : '' }}>{{ $room->number }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="neo-btn text-green-700">Update</button>
    </form>
</div>
@endsection