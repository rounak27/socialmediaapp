<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;
    protected $primaryKey = 'DislikeID';
    protected $fillable = ['UserID', 'PictureID'];
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function picture()
    {
        return $this->belongsTo(Picture::class, 'PictureID', 'PictureID');
    }
}
