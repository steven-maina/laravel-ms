@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Video View</h2>
        <form action="{{ route('video_views.update', $videoView) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" value="{{ $videoView->user_id }}" required>
            <br>
            <label for="course_id">Course ID:</label>
            <input type="text" name="course_id" value="{{ $videoView->course_id }}" required>
            <br>
            <button type="submit">Update Video View</button>
        </form>
    </div>
@endsection