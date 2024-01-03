<?php

namespace App\Http\Controllers;

use App\Models\VideoView;
use Illuminate\Http\Request;

class VideoViewController extends Controller
{
    // app/Http/Controllers/VideoViewController.php

    public function index()
    {
        // Show a list of video views
        $videoViews = VideoView::all();
        return view('video_views.index', compact('videoViews'));
    }

    public function create()
    {
        // Show the form to create a new video view
        return view('video_views.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
            'video' => 'required|mimes:mp4,avi|max:10240', // Adjust file types and size as needed
        ]);

        $videoPath = $request->file('video')->store('videos', 'public');

        VideoView::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'video_path' => $videoPath,
        ]);

        return redirect()->route('video_views.index')->with('success', 'Video view recorded successfully!');
    }

    public function edit(VideoView $videoView)
    {
        // Show the form to edit a video view
        return view('video_views.edit', compact('videoView'));
    }

    public function update(Request $request, VideoView $videoView)
    {
        // Update the video view in the database
        $videoView->update($request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
        ]));

        return redirect()->route('video_views.index')->with('success', 'Video view updated successfully!');
    }

    public function destroy(VideoView $videoView)
    {
        // Delete a video view from the database
        $videoView->delete();

        return redirect()->route('video_views.index')->with('success', 'Video view deleted successfully!');
    }
}
