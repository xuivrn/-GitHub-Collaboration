@extends('layouts.app')

@section('content')
<div class="neo-card">
    <h1 class="text-2xl font-bold mb-4">Add Room</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div><label>Number</label><input type="text" name="number" required></div>
        <div><label>Building</label><input type="text" name="building" required></div>
        <div><label>Capacity</label><input type="number" name="capacity" required></div>
        <button type="submit" class="neo-btn text-green-700">Save</button>
    </form>
</div>
@endsection