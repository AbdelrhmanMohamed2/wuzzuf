<?php

namespace App\Models\Admin;

use App\Models\Admin\JobType;
use App\Models\Admin\Employee;
use App\Models\Admin\JobCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    const ROLES = [
        'title' => 'required|string|min:3|max:200',
        'company' => 'required|string|min:3|max:200',
        'from' => 'required|date',
        'to' => 'required|date|after:from',
        'status' => 'required|boolean',
        'job_type_id' => 'required|exists:job_types,id',
        'job_category_id' => 'required|exists:job_categories,id',
    ];

    protected $fillable = [
        'employee_id',
        'job_type_id',
        'job_category_id',
        'title',
        'company',
        'from',
        'to',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class);
    }

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class);
    }
}
