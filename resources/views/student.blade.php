@extends('layouts.app')
{{--@section('page_title', 'My Dashboard')--}}
@section('content')
<div class="container">
    @if((Auth::user()->role=='student'))
        <a href="{{ route('courses.index') }}">
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
        </a>
        <a href="{{ route('enrollments.index') }}">
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
        </a>
</div>
@endif
</div>

@endsection
