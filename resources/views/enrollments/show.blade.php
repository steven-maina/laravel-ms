@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2">

    </div>
    <h2>Enrollment Details</h2>


    <div class="card ml-4">

    {{-- <p><strong>User:</strong> {{ $enrollment->user->name }}</p> --}}
    <p><strong>Course:</strong> {{ $enrollment->course->title }}</p>
    <p><strong>Enrollment Date:</strong> {{ $enrollment->created_at }}</p>

    <h3>Videos</h3>
    <div class="row">
        @foreach($videos as $video)
{{--            <p>{{++$key}}</p>--}}
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <video width="100%" height="200" controls>
                            <source src="{{ asset('storage/'.$video->video_path) }}" type="video/mp4">
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
</div>
@endsection

{{-- <p>
        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </p> --}}
