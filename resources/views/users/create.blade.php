@extends('layouts.app')

@section('content')
    <h2>Create a New User</h2>

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-3">
                <label for="name">Name:</label>
                <input type="text" id="name" class="form-control" name="name" required>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" name="email" required>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <label for="role">Role:</label>
                <select id="role" class="form-control" name="role" required>
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <label for="password">Initial Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </div>
    </form>
@endsection
