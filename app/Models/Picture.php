<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Picture extends Model
{
    use HasFactory;

    protected $primaryKey = 'PictureID';

    public function user()
{
    return $this->belongsTo(User::class, 'UserID', 'UserID');
}


    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'PictureID', 'UserID');
    }

    public function dislikes()
    {
        return $this->belongsToMany(User::class, 'dislikes', 'PictureID', 'UserID');
    }
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }
    public function isLikedByCurrentUser($pictureId)
{
    $userId = Auth::id();
    return Like::where('PictureID', $pictureId)
                ->where('UserID', $userId)
                ->exists();
}

public function isDislikedByCurrentUser($pictureId)
{
    $userId = Auth::id();
    return Dislike::where('PictureID', $pictureId)
                  ->where('UserID', $userId)
                  ->exists();
}


}
