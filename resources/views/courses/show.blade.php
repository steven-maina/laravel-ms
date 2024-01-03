@extends('layouts.app')

@section('content')
    <div class="card pl-5">
    <h2>Course Details</h2>

    <p><strong>Title:</strong> {{ $course->title }}</p>
    <p><strong>Description:</strong> {{ $course->description }}</p>

    <p>
        <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </p>
        <br/>
    <h3>Videos</h3>
    <div class="row">
        @foreach($videos as $video)
            {{$video->url}}
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <video width="100%" height="200" controls>
                            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        @endforeach
    @if(empty($videos))
                <p>No videos available for this course.</p>
        @endif
    </div>
    </div>

@endsection
