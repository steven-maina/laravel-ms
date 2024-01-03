@extends('layouts.admin')
@section('page_title', 'My Dashboard')
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Choose Role') }}</div>
                <div class="card-body">
                    <div class="mt-4">
                        <p>Choose your role below:</p>
                        <button type="button" id="teacherButton" class="btn btn-success">Teacher</button>
                        <button type="button" id="studentButton" class="btn btn-info">Student</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var teacherButton = document.getElementById('teacherButton');
        var studentButton = document.getElementById('studentButton');

        // Event listener for Teacher button
        teacherButton.addEventListener('click', function () {
            window.location.href = "{{ route('courses.index') }}"; // Redirect to teacher page
        });

        // Event listener for Student button
        studentButton.addEventListener('click', function () {
            window.location.href = "{{ route('enrollments.index') }}"; // Redirect to student page
        });
    });
</script> --}}
<div class="container">
@if(Auth::user()->role=='teacher' || (Auth::user()->role=='admin'))
       <div class="row">
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-blue-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('role', 'student')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-bold">Total Students</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users4 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>
           @endif
           @if((Auth::user()->role=='admin'))
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-danger-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('role', 'teacher')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Teachers</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users2 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-success-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-pointer icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('admin', 'admin')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Administrators</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    @endif
    @if((Auth::user()->role=='student'))
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{ $courses->count() }}</h3>
                    <span class="text-uppercase font-size-xs">Available Courses</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-success-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-pointer icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">{{ $enrollments->count() }}</h3>
                    <span class="text-uppercase font-size-xs">Current Enrollments</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

</div>

@endsection
