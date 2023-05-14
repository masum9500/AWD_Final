@extends('main_master')
@section('doctor_active', 'active')
@section('content')
<div class="">
    <div class="row mt-4">
        <div class="col-md-1">   
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-10">
                    <h4>All Doctors List</h4>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('add_doctor') }}" class="btn btn-success">Add Doctor</a>
                </div>
            </div>
            <hr>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Doctor Name</th>
                        <th>Doctor Department</th>
                        <th>Fee</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      @forelse ($doctors as $doctor)
                         <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $doctor->name ?? '' }} </td>
                            <td> {{ $doctor->department->name ?? '' }} </td> 
                            <td> {{ $doctor->fee ?? '' }} </td> 
                            <td> 
                                  <a class="btn btn-info" href="{{ url('doctor/edit', $doctor->id) }}">Edit
                                  </a>
                                  <a class="btn btn-danger" href="{{ url('doctor/delete', $doctor->id) }}" onclick="myFunction()">Delete</a>
                             </td>
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
