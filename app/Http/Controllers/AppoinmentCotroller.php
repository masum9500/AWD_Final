<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Appointment;
use Carbon\Carbon;

class AppoinmentCotroller extends Controller
{
    public function AppoinmentList()
    {
        $appointments = Appointment::all();
        return view('all_appoinment', compact('appointments'));
    }

    public function Appoinment()
    {
        $depts = Department::all();
        return view('appoinment', compact('depts'));
    }

    public function add_appointment(Request $request) {
        //return response()->json("ASDF");

        $doctor_id = $request->doctor_id;
        $appointment_date = $request->appointment_date;
        $patient_name = $request->patient_name;
        $patient_phone = $request->patient_phone;
        $total_fee = $request->total_fee;
        $paid_amount = $request->paid_amount;
        

        $appointment = new Appointment();
        $appointment->appointment_date = date('Y-m-d', strtotime($appointment_date));
        $appointment->doctor_id = $doctor_id;
        $appointment->patient_name = $patient_name;
        $appointment->patient_phone = $patient_phone;
        $appointment->total_fee = $total_fee;
        $appointment->paid_amount = $paid_amount;
        $appointment->save();

        if($appointment->id) {
            $appointment_id = $appointment->id;
            $appointment_no = Carbon::now() . " - " . $appointment_id;

            $appointment_update = Appointment::where('id', $appointment_id)->first();
            $appointment_update->appointment_no = $appointment_no;
            $appointment_update->save();

            if($appointment_update) {
                return response()->json(['status' => true]);
            }
        }

        return response()->json(['status' => false]);
    }
}
