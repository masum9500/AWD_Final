@extends('main_master')
@section('home_active', 'active')
@section('content')
<div class="">
    <div class="row mt-4">
        <div class="col-md-1">
            
        </div>
        <div class="col-md-10">
            <table id="example" class="display" style="width:100%">
     <thead>
         <tr>
             <th>SL</th>
             <th>Appointment No</th>
             <th>Appointment Date</th>
             <th>Doctor Name</th>
             <th>Patient name</th>
             <th>Phone</th>
             
         </tr>
     </thead>
     <tbody>
        @forelse ($appointments as $appointment)
         <tr>
            <td> {{ $loop->iteration }} </td>
            <td> {{ $appointment->appointment_no ?? '' }} </td>
            <td> {{ $appointment->appointment_date ?? '' }} </td> 
            <td> {{ $appointment->doctor->name ?? '' }} </td>
            <td> {{ $appointment->patient_name ?? '' }} </td> 
            <td> {{ $appointment->patient_phone ?? '' }} </td>  
         </tr>
      @empty
          
      @endforelse
     </tbody>
    
 </table>
        </div>
        <div class="col-md-1">
            
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
