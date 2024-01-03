@extends('layouts.app')

@section('content')
    <h2>Edit Course</h2>

    <form action="{{ route('courses.update', $course->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $course->title }}" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $course->description }}</textarea>

        <button type="submit">Update Course</button>
    </form>
@endsection
