@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Create Learning Materials For Course {{ $course_name ?? "" }}</h2>
    <form action="{{ route('learning_materials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="videos">Videos:</label>
        <input type="file" name="videos[]" accept="video/*" multiple required>
        <small class="form-text text-muted">Upload one or more video files.</small>
        <br>

        <label for="documents">Documents:</label>
        <input type="file" name="documents[]" accept=".pdf,.doc,.docx" multiple>
        <small class="form-text text-muted">Upload documents (PDF, Word) related to the content.</small>
        <br>

        <label for="images">Images:</label>
        <input type="file" name="images[]" accept="image/*" multiple>
        <small class="form-text text-muted">Upload images related to the content.</small>
        <br>

        <!-- Add more input fields for other types of learning materials as needed -->

        <button type="submit">Create Learning Materials</button>
    </form>
</div>

@endsection