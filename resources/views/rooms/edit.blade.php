@extends('layouts.app')

@section('content')
<div class="neo-card">
    <h1 class="text-2xl font-bold mb-4">Edit Room</h1>
    <form action="{{ route('rooms.update', $room) }}" method="POST">
        @csrf @method('PUT')
        <div><label>Number</label><input type="text" name="number" value="{{ $room->number }}" required></div>
        <div><label>Building</label><input type="text" name="building" value="{{ $room->building }}" required></div>
        <div><label>Capacity</label><input type="number" name="capacity" value="{{ $room->capacity }}" required></div>
        <button type="submit" class="neo-btn text-green-700">Update</button>
    </form>
</div>
@endsection