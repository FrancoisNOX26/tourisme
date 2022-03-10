<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'avatar',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsToMany(User::class);
    }


    public function getAvatarAttribute($value)
    {
        if (!$value) {
            //return 'http://placehold.it/160x160';
            return url('/') . config('variables.avatar.public') . 'avatar0.png';
        }

        return url('/') . config('variables.avatar.public') . $value;
    }

    public function setAvatarAttribute($photo)
    {
        $this->attributes['avatar'] = move_file($photo, 'avatar.image');
    }

}
