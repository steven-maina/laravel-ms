<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\VideoView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        // Show a list of courses
        $user=Auth::user();
        if ($user->role=='teacher'){
            $courses = Course::where('instructor',$user->id)->get();
        }else{
            $courses = Course::all();
        }

        return view('courses.index', compact('courses' , 'user'));
    }

    public function create()
    {
        // Show the form to create a new course
        return view('courses.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'videos.*' => 'required|mimes:mp4,avi|max:102400',
            'title' => 'required',
            'description' => 'required',
        ]);

        $user = auth()->user();
        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'instructor' =>  $user->id,
        ]);
        foreach ($request->file('videos') as $video) {
            $videoPath = $video->store('videos', 'public');
            VideoView::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'video_path' => $videoPath,
            ]);
        }

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    public function store2(Request $request)
    {
        $request->validate([
            'videos.*' => 'required|mimes:mp4,avi|max:102400',
            'title' => 'required',
            'description' => 'required',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
           'instructor' =>$request->user()->id
        ]
     );

        foreach ($request->file('videos') as $video) {
            $videoPath = $video->store('videos', 'public');
            VideoView::create([
                'user_id' => $request->user()->id,
                'course_id' => $course->id,
                'video_path' => $videoPath,
            ]);
        }

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }
    public function enroll($course, Request $request)
    {
        $userId = Auth::user()->id;
        $courseId = $course;

        // Check if the user is already enrolled in the specified course
        $existingEnrollment = Enrollment::where('user_id', $userId)
                                        ->where('course_id', $courseId)
                                        ->first();

        if ($existingEnrollment) {
            // User is already enrolled in the course, handle accordingly
            // For example, you can redirect with a message or throw an exception
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        // If the user is not already enrolled, create a new enrollment record
        Enrollment::create([
            'user_id' => $userId,
            'course_id' => $courseId,
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully!');
    }
    public function unenroll($course, Request $request)
    {
        $userId = Auth::user()->id;
        $courseId = $course;

        // Check if the user is already enrolled in the specified course
        $existingEnrollment = Enrollment::where('user_id', $userId)
                                        ->where('course_id', $courseId)
                                        ->first();

        if (!$existingEnrollment) {
            // User is already enrolled in the course, handle accordingly
            // For example, you can redirect with a message or throw an exception
            return redirect()->back()->with('error', 'You are not enrolled in this course.');
        }

        // If the user is not already enrolled, create a new enrollment record
        $existingEnrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully!');
    }

    public function show(Course $course)
    {
        $videos=VideoView::where('user_id', $course->instructor)->where('course_id', $course->id)->get();
        return view('courses.show', compact('course', 'videos'));
    }

    public function edit(Course $course)
    {
        // Show the form to edit a course
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        // Update a course in the database
        $course->update($request->validate([
            'title' => 'required',
            'description' => 'required',
        ]));

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        // Delete a course from the database
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
