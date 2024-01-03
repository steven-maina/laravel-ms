@extends('layouts.app')

@section('content')
    <h2>User Details</h2>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <p>
        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </p>
@endsection
