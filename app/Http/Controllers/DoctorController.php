<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DoctorController extends Controller
{
    public function add_doctor()
    {
        $depts = Department::all();
        return view('add_doctor', compact('depts'));
    }

    public function store_doctor(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'phone' => 'required',
            'fee' => 'required',
        ]);


        Doctor::insert([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'phone' => $request->phone,
            'fee' => $request->fee,
            'created_at' => Carbon::now(),
            
        ]);
        return redirect()->route('doctors')->with('Successfully added');
    }

    public function all_doctor() {
        $doctors = Doctor::orderBy('id', 'DESC')->get();
        return view('all_doctors', compact('doctors'));
    }
    public function edit_doctor($id)
    {
        $depts = Department::orderBy('id', 'ASC')->get();
        $doctor = Doctor::findOrFail($id);
        return view('edit_doctor', compact('doctor', 'depts'));
    }
    public function update_doctor(Request $request)
    {
        $doctor_id = $request->id;
        Doctor::findOrFail($doctor_id)->update([
                'name' => $request->name,
                'department_id' => $request->department_id,
                'phone' => $request->phone,
                'fee' => $request->fee,
                'updated_at' => Carbon::now(),
            ]);

            /*$notification = array('message' => 'Doctor Updated Successfully', 'alert-type' => 'info');*/
            return redirect()->route('doctors');
    }

    public function delete_doctor($id)
    {
        Doctor::findOrFail($id)->delete();
        return redirect()->route('doctors');
    }

    public function doctor_available(Request $request) {
        $doctor_id = $request->doctor_id;
        $appointment_date = $request->appointment_date;

        $available = Appointment::where('appointment_date', $appointment_date)->where('doctor_id', $doctor_id)->count();
        $doctor_info = Doctor::where('id', $doctor_id)->first();

        return response()->json(['count' => $available, 'doctor_info' => $doctor_info]);
    }

}
