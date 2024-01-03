<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display the user's dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();
        $users=User::all();
        $courses=Course::all();
        $tcourses=Course::where('instructor', $user->id);
        $enrollments=Enrollment::where('user_id', $user->id)->get();
        // Check the user's role and customize the dashboard view
        return view('dashboard', compact('user','users','courses','enrollments' ,'tcourses'));
    }
}
