<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin\Admin;
use App\Models\Admin\Company;
use App\Models\Admin\Employee;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    const UPLOADED_IMAGE = 'uploads/images/';
    const ROLES = [
        'first_name' => 'required|string|min:2|max:200',
        'last_name' => 'required|string|min:2|max:200',
        // 'email' => 'required|email|unique:users,email',
        // 'password' => 'required|string|min:8|max:200|confirmed',
        // 'role' => 'required|in:admin,employee,company',
        // 'phone' => ['required', 'regex:/^01[0-2]\d{8}$/', 'unique:users,phone'],
        // 'image' => 'nullable|file|image|mimes:jpeg,png,jpg'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'phone',
        'email',
        'password',
        'role',
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
        'password' => 'hashed',
    ];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function IsAdmin()
    {
        return $this->role === 'admin';
    }

    public function IsEmployee()
    {
        return $this->role === 'employee';
    }

    public function IsCompany()
    {
        return $this->role === 'company';
    }
}
