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
        if ($this->avatar !== 'user.jpg') {
            return 'storage/avatar/' . $this->avatar;
        }

        $name = implode("%20", explode(" ", $this->getNameOrUsername()));
        return "https://avatars.dicebear.com/api/initials/{$name}.svg";
    }

    public function statuses()
    {
        return $this->hasMany(Status::class, 'user_id');
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany(self::class, 'friends', 'friend_id', 'user_id');
    }

    public function friends()
    {
        return $this->friendsOfMine()
                    ->wherePivot('accepted', true)
                    ->get()
                    ->merge($this->friendOf()
                    ->where('accepted', true)->get());
    }

    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }

    public function friendRequestPending()
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    public function hasFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestPending()->where('id', $user->id)->count();
    }


    public function hasFriendRequestReceived(User $user)
    {
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }

    public function addFriend(User $user)
    {
        $this->friendOf()->attach($user->id);
    }

    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()
             ->where('id', $user->id)
             ->first()
             ->pivot
             ->update([
                 'accepted' => true,
             ]);
    }

    public function isFriendWith(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }

    public function deleteFriend(User $user)
    {
        $this->friendOf()->detach($user->id);
        $this->friendsOfMine()->detach($user->id);
    }

    public function hasLikedStatus(Status $status)
    {
        return (bool) $status->likes->where('user_id', $this->id)->count();
    }

    public function removeLikeInStatus(Status $status)
    {
        return $status->likes->where('user_id', $this->id)->first()->delete();
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id');
    }

    // Remove this ~ just here to keep legacy
    public function getProfileAvatarURL(int $size)
    {
        return $this->getAvatarURL();
    }
}
