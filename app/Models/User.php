<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timesheets(): HasMany
    {
        return $this->hasMany(Timesheet::class, 'user_id', 'id');
    }

    public function isAdmin()
    {
        return $this->role == config('constants.ADMIN');
    }

    public function isManager()
    {
        return $this->role == config('constants.MANAGER');
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
            set: fn (string $value) => \Hash::make($value)
        );
    }

    protected function role(): Attribute
    {
        return Attribute::make(
            get: function(string $value) {
                if($value == '1') {
                    return 'admin';
                } elseif ($value == '2') {
                    return 'manager';
                } else {
                    return 'user';
                }
            }
        );
    }
}
