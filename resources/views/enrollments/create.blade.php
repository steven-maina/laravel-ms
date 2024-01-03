@extends('layouts.app')

@section('content')
    <h2>Create a New Enrollment</h2>

    <form action="{{ route('enrollments.store') }}" method="post">
        @csrf
        <label for="user_id">User:</label>
        <select id="user_id" name="user_id" required>
            <!-- Populate with user options -->
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label for="course_id">Course:</label>
        <select id="course_id" name="course_id" required>
            <!-- Populate with course options -->
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
            @endforeach
        </select>

        <label for="enrollment_date">Enrollment Date:</label>
        <input type="date" id="enrollment_date" name="enrollment_date" required>

        <button type="submit">Create Enrollment</button>
    </form>
@endsection
