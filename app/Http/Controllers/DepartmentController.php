<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function get_doctor_departmenr_wise(Request $request) {
        $department_id = $request->department_id;
        $doctors = Doctor::where('department_id', $department_id)->get();

        return response()->json($doctors);
    }
}
