<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profileImage()
    {
        $image_path = ($this->image) ? $this->image : 'profile/eD48N2wUhlnBWjOEL82IsK04sSjjfQGOGFskKFzM.png';
        return '/storage/' . $image_path;
    }

    //RELATION / MATCHING TABLES COLUMNS
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function following()
    {
        return $this->belongsToMany(User::class);
    }
}
