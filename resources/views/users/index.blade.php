@extends('layouts.app')

@section('content')
    <div class="card">
    <h2>User List</h2>
    @if(Auth::user()->role =='admin')
        <div class="flex-end">
            <a href="{{route('users.create')}}" class="btn btn-primary">Add User</a>
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">Show</a>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{--        <div class="d-flex justify-content-left mt-4">--}}
{{--            {{ $users->links() }}--}}
{{--        </div>--}}
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div>
@endsection
