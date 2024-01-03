@extends('layouts.app')

@section('content')
    <h2>Enrollment List</h2>

    <table>
        <thead>
            <tr>
                @if ($user->role!='student' )
                <th>User</th>
                @endif
                <th>Course</th>
                <th>Enrollment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="ml-3">
            @foreach ($enrollments as $enrollment)
                <tr>@if ($user->role!='student' )
                    <td>{{ $enrollment->user->name }}</td>
                    @endif
                    <td>{{ $enrollment->course->title }}</td>
                    <td>{{ $enrollment->created_at }}</td>
                    <td>
                        <a href="{{ route('enrollments.show', $enrollment->id) }}">Show</a>
                        @if ($user->role!='student' )
                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
