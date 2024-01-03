@extends('layouts.app')

@section('content')
    <h2>Course List</h2>
    @if($user->role !='student')
        <div class="flex-end">
            <a href="{{route('courses.create')}}" class="btn btn-primary">Create Course</a>
        </div>
    @endif

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    {{-- <td>{{ $course->description }}</td> --}}
                    <td>{{ \Illuminate\Support\Str::limit($course->description, 30) }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course->id) }}">Show</a>
                        @if($user->role !='student')
                        <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        @else
                        <form action="{{ route('courses.enroll', $course->id) }}" method="post">
                            @csrf
                            @method('POST')
                        <button type="submit">Enroll</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
