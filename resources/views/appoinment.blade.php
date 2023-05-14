@extends('main_master')
@section('appointment_active', 'active')
@section('css')
<style>
    #appointment-list tbody tr:hover {
        cursor: pointer;
    }
</style>
@endsection
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 p-4" style="background-color: #ddd;">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Appoinment Date</label>
                        <input type="date" name="appointment_date" class="form-control shadow-none" id="appointment_date">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Select Department</label>
                        <select class="form-select shadow-none" name="department_id" id="department_id"
                            aria-label="Default select example">
                            <option value="">--- Select ---</option>
                            @foreach ($depts as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Select Doctor</label>
                        <select class="form-select shadow-none" name="doctor_id" id="doctor_id"
                            aria-label="Default select example">
                            <option value="null">--- Select ---</option>
                        </select>
                        <p class="fw-bold" id="available-message">
                        </p>
                        <input type="hidden" name="doctor_name" class="form-control" id="doctor_name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Fee</label>
                        <input type="text" name="doctor_fee" class="form-control shadow-none" id="doctor_fee"
                            placeholder="Doctor Fees" readonly>
                    </div>

                    <button type="submit" class="btn btn-success" id="add-doctor">Add</button>
                </form>
            </div>
            {{-- <div class="col-md-6 p-4 overflow-auto" style="height: 430px; background-color: #A4A4A4;"> --}}
            <div class="col-md-6 p-4" style="background-color: #A4A4A4;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table border" id="appointment-list">
                                <thead>
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">App.Date</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Fee</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- <div class="row mt-5">
                        <div class="col-md-12">
                            <form>

                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label for="" class="form-label fw-bold">Patient Information</label>
                                    </div>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col-md-6">
                                        <input type="text" name="patient_name" class="form-control shadow-none"
                                            id="exampleInputEmail1" placeholder="Patient Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="patient_phone" class="form-control shadow-none"
                                            id="exampleInputEmail1" placeholder="Patient Phone">
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label for="" class="form-label fw-bold">Patient Information</label>
                                    </div>
                                </div>
                                <div class="row g-2 mb-3">
                                    <div class="col-md-6">
                                        <input type="text" name="total_fee" class="form-control shadow-none"
                                            id="exampleInputEmail1" placeholder="Total Fee">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="paid_amount" class="form-control shadow-none"
                                            id="exampleInputEmail1" placeholder="Paid Amount">
                                    </div>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div> -->

                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" id="close-modal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="col-md-12">
                            <form>

                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label for="" class="form-label fw-bold">Patient Information</label>
                                        <!-- <input type="hidden" id="date"> -->
                                    </div>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col-md-6">
                                        <input type="text" name="patient_name" class="form-control shadow-none"
                                            id="patient_name" placeholder="Patient Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="patient_phone" class="form-control shadow-none"
                                            id="patient_phone" placeholder="Patient Phone">
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label for="" class="form-label fw-bold">Patient Information</label>
                                        <!-- <input type="hidden" id="doc-id"> -->
                                    </div>
                                </div>
                                <div class="row g-2 mb-3">
                                    <div class="col-md-6">
                                        <input type="text" name="total_fee" class="form-control shadow-none"
                                            id="total_fee" placeholder="Total Fee" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="paid_amount" class="form-control shadow-none"
                                            id="paid_amount" placeholder="Paid Amount">
                                    </div>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-primary" id="submit">Submit</button>
                                </div>

                            </form>
                        </div>
                          </div>
                          <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                          </div> -->
                        </div>
                      </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#appointment_date').val(new Date().toISOString().slice(0, 10));

            $("body").on('change', '#department_id', function() {
                var department_id = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('get_doctor_departmenr_wise') }}",
                    data: {
                        department_id: department_id
                    },
                    success: function(data) {
                        var group = '<option value="null">--- Select ---</option>';
                        data.forEach(function(item, i) {
                            group += '<option value="' + item.id + '"> ' + item.name +
                                ' </option>';
                        });
                        $('#doctor_id').html(group);
                    }
                });

            });

            $("body").on('change', '#doctor_id, #appointment_date', function() {
                var doctor_id = $('#doctor_id').val();
                var appointment_date = $('#appointment_date').val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('get_doctor_available') }}",
                    data: {
                        doctor_id: doctor_id,
                        appointment_date: appointment_date,
                    },
                    success: function(data) {
                        if (data.count >= 2) {
                            $('#available-message').addClass('text-danger');
                            $('#available-message').text('Not Available');
                            $('#add-doctor').hide();
                        } else {
                            $('#available-message').addClass('text-success');
                            $('#available-message').text('Available');
                            let fee = data.doctor_info.fee;
                            let doctor_name = data.doctor_info.name;
                            $('#doctor_fee').val(fee);
                            $('#doctor_name').val(doctor_name);
                        }
                    }
                });

            });

            $("body").on('click', '#add-doctor', function(e) {
                e.preventDefault();
                let appointment_date = $('#appointment_date').val();
                let doctor_id = $('#doctor_id').val();
                let doctor_name = $('#doctor_name').val();
                let doctor_fee = $('#doctor_fee').val();

                // last serial no nite hobe
                var rowCount = $('#appointment-list tr').length;

                if(doctor_id != "" && doctor_name != "" && doctor_fee != "") {
                    $('#appointment-list tbody').append("<tr class='updateRow'>" + 
                    "<td>" + rowCount + "</td>" +
                    "<td>" + appointment_date + 
                        '<input type="hidden" value="'+ appointment_date +'" class="appointment_date">' +
                    "</td>" +
                    "<td>" + doctor_name + 
                        '<input type="hidden" value="'+ doctor_id +'" class="doctor_id">' +
                    "</td>" +
                    "<td>" + doctor_fee + 
                        '<input type="hidden" value="'+ doctor_fee +'" class="doctor_fee">' +
                    "</td>" +
                    "<td> <a class='btn btn-danger delete-appointment-list'> Delete </a> </td>" +
                    "</tr>");

                    //$('#appointment_date').val("");
                    $('#department_id option:eq(0)').attr('selected','selected');
                    $('#doctor_id option:eq(0)').attr('selected','selected');
                    $('#doctor_name').val("");
                    $('#doctor_fee').val("");
                    $('#available-message').text('');
                    
                }

            });


            $("body").on('click', '.delete-appointment-list', function() {
                $(this).closest('tr').remove();
            });

            $("body").on('click', '.updateRow', function() {
                $('#myModal').modal('show');

                var tr = $(this).closest('tr');
                var appointment_date = tr.find('.appointment_date').val();
                var doctor_id = tr.find('.doctor_id').val();
                var doctor_fee = tr.find('.doctor_fee').val();

                // $('#date').val(appointment_date);
                // $('#doc-id').val(doctor_id);

                $('#total_fee').val(doctor_fee);


                $("body").on('click', '#submit', function() {
                    let patient_name = $('#patient_name').val();
                    let patient_phone = $('#patient_phone').val();
                    let total_fee = $('#total_fee').val();
                    let paid_amount = $('#paid_amount').val();

                    if(total_fee != paid_amount) {
                        alert("Please Input Correct Amount");
                    } else if(total_fee == paid_amount) {
                        $.ajax({
                            type: "GET",
                            url: "{{ route('add_appointment') }}",
                            data: {
                                doctor_id: doctor_id,
                                appointment_date: appointment_date,
                                patient_name: patient_name,
                                patient_phone: patient_phone,
                                total_fee: total_fee,
                                paid_amount: paid_amount,
                            },
                            success: function(data) {
                                resetModal();
                                $('#myModal').modal('hide');
                                tr.remove();                            
                            }
                        });
                    }
                });

            });

            $("body").on('click', '#close-modal', function() {
                resetModal();
            });

            function resetModal() {
                console.log("reset modal");
                $('#patient_name').val('');
                $('#patient_phone').val('');
                $('#total_fee').val('');
                $('#paid_amount').val('');
            }
        });
    </script>
@endsection
