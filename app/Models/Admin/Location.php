<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    const ROLES = [
        'name' => 'required|string|unique:locations,name',
        'type' => 'required|in:country,city,area',
        'parent_id' => 'required|exists:locations,id',
    ];

    protected $fillable = [
        'name',
        'type',
        'parent_id',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function country()
    {
        return $this->belongsTo(Location::class, 'parent_id')->where('type', 'country');
    }

    public function city()
    {
        return $this->belongsTo(Location::class, 'parent_id')->where('type', 'city');
    }

    public function cities()
    {
        return $this->hasMany(Location::class, 'parent_id')->where('type', 'city');
    }

    public function areas()
    {
        return $this->hasMany(Location::class, 'parent_id')->where('type', 'area');
    }
}
