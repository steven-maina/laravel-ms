@extends('layouts.app')

@section('content')
    <h2>Edit Enrollment</h2>

    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="user_id">User:</label>
        <select id="user_id" name="user_id" required>
            <!-- Populate with user options -->
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $enrollment->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <label for="course_id">Course:</label>
        <select id="course_id" name="course_id" required>
            <!-- Populate with course options -->
            @foreach ($courses as $course)
                <option value="{{ $course->id }}" {{ $enrollment->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->title }}
                </option>
            @endforeach
        </select>

        <label for="enrollment_date">Enrollment Date:</label>
        <input type="date" id="enrollment_date" name="enrollment_date" value="{{ $enrollment->enrollment_date }}" required>

        <button type="submit">Update Enrollment</button>
    </form>
@endsection
