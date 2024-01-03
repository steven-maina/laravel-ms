@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Video View</h2>
        <form action="{{ route('video_views.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" required>
            <br>
            <label for="course_id">Course ID:</label>
            <input type="text" name="course_id" required>
            <br>
            <label for="video">Video:</label>
            <input type="file" name="video" accept="video/*" required>
            <br>
            <button type="submit">Create Video View</button>
        </form>
    </div>
@endsection
