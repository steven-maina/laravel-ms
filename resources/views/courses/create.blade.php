@extends('layouts.app')

@section('content')
    <h2>Create a New Course</h2>
<div>

</div>
    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">Short Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="videos" class="col-sm-2 col-form-label">Videos</label>
            <div class="col-sm-10">
                <input type="file" id="videos" class="form-control" name="videos[]" accept="video/*" multiple required>
                @error('videos.*')
                <p class="text-red-500" style="color: red">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit">Create Course</button>
    </form>

@endsection
