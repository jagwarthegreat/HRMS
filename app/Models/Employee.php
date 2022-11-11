<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "employee_code",
        "firstname",
        "middlename",
        "lastname",
        "contact",
        "email",
        "address",
        "date_of_birth",
        "gender",
        "civil_status",
        "sss_number",
        "tin_number",
        "pagibig_number",
        "philhealth_number",
        "date_of_hire",
        "contract_end_date",
    ];

    public function dependents()
    {
        return $this->hasMany(EmployeeDependent::class)->latest();
    }

    public function work_experiences()
    {
        return $this->hasMany(EmployeeWorkExperience::class)->latest();
    }

    public function educ_backgrounds()
    {
        return $this->hasMany(EmployeeEducationalBackground::class)->latest();
    }

    public function emp_status_histories()
    {
        return $this->hasMany(EmpStatusHistory::class)->latest();
    }

    public function emp_type_histories()
    {
        return $this->hasMany(EmpTypeHistory::class)->latest();
    }

    public function emp_compensation_histories()
    {
        return $this->hasMany(EmpCompensationHistory::class)->latest();
    }

    public function emp_job_histories()
    {
        return $this->hasMany(EmpJobHistory::class)->latest();
    }
}
