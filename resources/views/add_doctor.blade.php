@extends('main_master')
@section('doctor_active', 'active')
@section('content')

    <div class="row mt-4">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6 p-4" style="background-color: #ddd;">
            <form action="{{ route('store_doctor') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Dr Name</label>
                    <input type="text" name="name" class="form-control shadow-none" id="exampleInputEmail1" placeholder="Doctor Full Name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Department</label>
                    <select class="form-select shadow-none" name="department_id" aria-label="Default select example">
                        <option selected disabled>Select Department</option>
                      @foreach($depts as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->name }}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                    <input type="tel" name="phone" class="form-control shadow-none" id="exampleInputEmail1" placeholder="Doctor Phone Number">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Dr.Fee</label>
                    <input type="number" name="fee" class="form-control shadow-none" id="exampleInputEmail1" placeholder="Doctor Fees">
                </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-3">
            
        </div>
    </div>


@endsection


