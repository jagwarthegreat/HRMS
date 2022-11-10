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
        "educ_elementary",
        "educ_elem_year",
        "educ_highschool",
        "educ_hs_year",
        "educ_college",
        "educ_college_year",
        "educ_college_degree",
    ];
}
