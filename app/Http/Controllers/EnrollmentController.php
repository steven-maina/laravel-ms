<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\VideoView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {

        $user=Auth::user();
        // Show a list of enrollments
        $enrollments = [];
        if($user->role=='student'){
            $enrollments = Enrollment::where('user_id', $user->id)->get();
        }else{
            $enrollments = Enrollment::all();
        }
        return view('enrollments.index', compact('enrollments' , 'user'));
    }


    public function store(Request $request)
    {
        // Store a new enrollment in the database
        Enrollment::create($request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
        ]));

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully!');
    }
    public function show(Enrollment $enrollment)
    {
        $videos=VideoView::where('course_id', $enrollment->course_id)->get();
        return view('enrollments.show', compact('enrollment', 'videos'));
    }

    public function destroy(Enrollment $enrollment)
    {
        // Delete an enrollment from the database
        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully!');
    }
}
