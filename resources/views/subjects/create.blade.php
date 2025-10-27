@extends('layouts.app')

@section('content')
<div class="neo-card">
    <h1 class="text-2xl font-bold mb-4">Add Subject</h1>
    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div><label>Code</label><input type="text" name="code" required></div>
        <div><label>Name</label><input type="text" name="name" required></div>
        <div><label>Units</label><input type="number" name="units" required></div>
        <div><label>Room</label>
            <select name="room_id" required>
                @foreach(\App\Models\Room::all() as $room)
                <option value="{{ $room->id }}">{{ $room->number }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="neo-btn text-green-700">Save</button>
    </form>
</div>
@endsection