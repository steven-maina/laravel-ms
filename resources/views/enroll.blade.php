@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Enroll in a Course</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('enrollments.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="course_id">Select a Course:</label>
                <select name="course_id" id="course_id" class="form-control">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enroll</button>
        </form>
    </div>
@endsection
