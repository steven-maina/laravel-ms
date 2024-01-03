@extends('layouts.app')

@section('content')
    <h2>Create a New User</h2>

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Create User</button>
    </form>
@endsection
