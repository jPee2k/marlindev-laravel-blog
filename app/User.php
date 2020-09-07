<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    const IS_BANNED = 1;
    const IS_ACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'slogan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function slogan()
    {
        return $this->hasMany(Slogan::class);
    }

    public function hashPassword($password)
    {
        if ($password !== null) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
            $this->save();
        }
    }

    public function uploadAvatar($image)
    {
        if ($image === null) {
            return;
        }

        $this->removeAvatar();
        
        $filename = uniqid(Str::random(5)) . '.' . $image->extension();
        // dd(get_class_methods($image));
        $image->storeAs('uploads/avatars', $filename);
        $this->avatar = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->avatar === null) {
            return '/img/no-user-image.png';
        }

        return '/uploads/avatars/' . $this->avatar;
    }

    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }

    public function removeAvatar()
    {
        if ($this->avatar !== null){
            Storage::delete('uploads/avatars/' . $this->avatar);
        }
    }

    public function setAdminAccess()
    {
        $this->is_admin = 1;
        $this->save();
    }

    public function setUserAccess()
    {
        $this->is_admin = 0;
        $this->save();
    }

    public function toggleAccess($value = null)
    {
        if ($value === null) {
            return $this->setUserAccess();
        }

        return $this->setAdminAccess();
    }

    public function setBan()
    {
        $this->status = User::IS_BANNED;
        $this->save();
    }

    public function setUnban()
    {
        $this->status = User::IS_ACTIVE;
        $this->save();
    }

    public function toggleStatus($value = null)
    {
        if ($value === null) {
            return $this->setUnban();
        }

        return $this->setBan();
    }
}
