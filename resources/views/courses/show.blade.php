@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card p-4">
        <h2 class="mb-4 text-center">Course Details</h2>

        <p><strong>Title:</strong> {{ $course->title }}</p>
        <p><strong>Description:</strong> {{ $course->description }}</p>
        <hr class="mt-4">

        <h3 class="mt-4">Course Video</h3>
        <div class="row">
            @forelse ($videos as $video)
                <div class="col-md-12 mb-4">
                    <div class="card card-0">
                        <div class="card-body">
                            <video width="100%" height="200" controls>
                                <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No videos available for this course.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
