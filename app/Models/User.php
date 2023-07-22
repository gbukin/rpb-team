<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;#, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'created_dmy',
        'created_fdy',
        'created_mdy'
    ];

    public function getCreatedDmyAttribute(): string
    {
        return $this->created_at->format('d.m.Y');
    }

    public function getCreatedMdyAttribute(): string
    {
        return $this->created_at->format('M d, Y');
    }

    public function getCreatedFdyAttribute(): string
    {
        return $this->created_at->format('D, d M Y H:i:s');
    }
}
