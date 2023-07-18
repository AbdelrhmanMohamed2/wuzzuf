<?php

namespace App\Models\Admin;

use App\Models\Admin\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    const ROLES = [
        'employee_id' => 'required|exists:employees,id',
        'field' => 'required|string|min:3|max:200',
        'university_id' => 'required|exists:universities,id',
        'degree_id' => 'required|exists:degrees,id',
        'grade_id' => 'required|exists:grades,id',
    ];

    protected $fillable = [
        'employee_id',
        'field',
        'university_id',
        'degree_id',
        'grade_id',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }
}
