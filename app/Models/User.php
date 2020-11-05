<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'location',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullName()
    {
        if ($this->first_name && $this->last_name) {
            return "{$this->first_name} {$this->last_name}";
        }
        
        if ($this->first_name) {
            return $this->first_name;
        }

        return null;
    }

    public function getNameOrUsername()
    {
        $fullname = $this->getFullName();
        if ($fullname) {
            return $fullname;
        } else {
            return $this->username;
        }
    }
    
    public function getAvatarURL()
    {
        return "https://www.gravatar.com/avatar/{ $this->email }?d=mm";
    }

    public function getProfileAvatarURL(int $size)
    {
        return "https://www.gravatar.com/avatar/{ $this->email }?d=mm&s=$size";
    }
}
