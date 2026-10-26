<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'membership_until',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'membership_until' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeAdmin($query)
    {
        return $query->role(['admin'])->where('id', '!=', 1);
    }

    public function scopeMember($query)
    {
        return $query->role(['member']);
    }

    protected static function booted(): void
    {
        static::created(function ($user) {
            if (! $user->hasAnyRole(['admin', 'member'])) {
                $user->assignRole('member');
            }
        });
    }
}
