<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Picture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function index()
{
    $user = auth()->user();

    $pictures = Picture::with('user')
        ->withCount('likes')
        ->withCount('dislikes')
        ->get();

    foreach ($pictures as $picture) {
        $likedBy = Like::where('PictureID', $picture->PictureID)
            ->join('users', 'likes.UserID', '=', 'users.UserID')
            ->pluck('name');

        $dislikedBy = Dislike::where('PictureID', $picture->PictureID)
            ->join('users', 'dislikes.UserID', '=', 'users.UserID')
            ->pluck('name');

        $picture->likedBy = $likedBy;
        $picture->dislikedBy = $dislikedBy;
    }

    return view('ui.display', compact('pictures', 'user'));
    }


        public function likeDislike(Request $request)
{
    $user = Auth::user();
    $likeDislike = $request->input('like_dislike');
    $pictureId = $request->input('picture_id');

    // Check if the user had already liked or disliked the picture before
    $existingLike = Like::where('UserID', $user->UserID)->where('PictureID', $pictureId)->first();
    $existingDislike = Dislike::where('UserID', $user->UserID)->where('PictureID', $pictureId)->first();

    if ($likeDislike === 'like') {
        if ($existingLike) {
            // If the user already liked the picture, remove the like
            $existingLike->delete();
        } else {
            // Add the like
            Like::create([
                'UserID' => $user->UserID,
                'PictureID' => $pictureId
            ]);
        }

        // Remove dislike if it exists
        if ($existingDislike) {
            $existingDislike->delete();
        }
    } elseif ($likeDislike === 'dislike') {
        if ($existingDislike) {
            // If the user already disliked the picture, remove the dislike
            $existingDislike->delete();
        } else {
            // Add the dislike
            Dislike::create([
                'UserID' => $user->UserID,
                'PictureID' => $pictureId
            ]);
        }

        // Remove like if it exists
        if ($existingLike) {
            $existingLike->delete();
        }
    }

    // Retrieve updated counts
    $likesCount = Like::where('PictureID', $pictureId)->count();
    $dislikesCount = Dislike::where('PictureID', $pictureId)->count();

    // Return response with updated counts
    return response()->json(['likesCount' => $likesCount, 'dislikesCount' => $dislikesCount, 'message' => 'Action completed successfully'], 200);
}

public function create()
{
    $user = auth()->user();

    return view('ui.create',compact('user'));
}
public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image file
    ]);

    // Store the uploaded image in the storage directory
    $imagePath = $request->file('image')->storePublicly('pictures', 'public');
    //dd($imagePath);
    // Create a new picture record in the database
    $picture = new Picture();
    $picture->Title = $request->input('title');
    $picture->Description = $request->input('description');
    $picture->FilePath = $imagePath;
    $picture->UserID = auth()->id(); // Assuming the user is authenticated
    $picture->save();



    // Redirect back with a success message
    return redirect()->route('display');
}

}