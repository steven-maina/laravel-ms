@extends('layouts.app')

@section('content')
    <h2>Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <button type="submit">Update User</button>
    </form>
@endsection
