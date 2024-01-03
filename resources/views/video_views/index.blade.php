@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Video Views</h2>

        <div class="mb-3">
            <a href="{{ route('video_views.create') }}" class="btn btn-primary">Create New Video View</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Course ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($videoViews as $videoView)
                    <tr>
                        <td>{{ $videoView->user_id }}</td>
                        <td>{{ $videoView->course_id }}</td>
                        <td>
                            <a href="{{ route('video_views.edit', $videoView) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('video_views.destroy', $videoView) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
