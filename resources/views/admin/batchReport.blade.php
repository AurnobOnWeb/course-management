@extends('admin.layouts.template')
@section('title')
Batch Reports | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- fixed header  -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Batch Based Payment Report </h5>
                <p>Search By course Name & Batch Name & start to End <br> if Start date date and end date Has no data it will show you nothing</p>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <div class="center" style="margin: auto;  padding: 10px;">
                        <form action="" method="GET">
                            <div class="form-group col-lg-12">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="course" name="course_id" style="margin-right: 20px" required>
                                        <option value="">Select course</option>
                                        @foreach($courses as $courses)
                                        <option value="{{ $courses->id }}">{{ $courses->course_name }}</option>
                                        @endforeach
                                    </select>
                                    <select id="batch" class="form-control" name="batch_id" style="margin-right: 20px" required>
                                        <option value="">Select Batch</option>
                                    </select>
                                    <input onfocus="(this.type='date')" required id="start_date" type="text" name="start_date" value="{{ request('start_date') }}" class="form-control textbox-n" placeholder="From" style="margin-right: 20px">
                                    <input onfocus="(this.type='date')" required id="end_date" type="text" name="end_date" value="{{ request('end_date') }}" class="form-control textbox-n" placeholder="To" style="margin-right: 20px">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Go!</button>
                                    </div>
                                    <a href="{{ route('courseReport') }}" class="btn btn-info" style="margin-left: 20px;color:white;">Reset</a>
                                </div>
                            </div>
                        </form>

                    </div>

                    @if(session()->has('massage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session()->get('massage') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if(session()->has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> {{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Batch_Name</th>
                                <th>student count</th>
                                <th>Discounted course price</th>
                                <th>Special discount Student</th>
                                <th>Estimate Earnings</th>
                                <th>Full payments</th>
                                <th>Dues</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)

                            <tr>
                                <td>{{ $report['batches']->batch_name }}</td>
                                <td>{{ $report['studentCount'] }}</td>
                                <td>{{ $report['discountedCoursePrice'] }}</td>
                                <td>{{ $report['specialDiscountCount'] }}</td>
                                <td>{{ $report['totalEstimatedEarnings'] }}</td>
                                <td>{{ $report['fullPayments'] }}</td>
                                <td>{{ $report['dues'] }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end fixed header  -->
    <!-- ============================================================== -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $("#course").change(function() {
            var course = $(this).val();

            if (course == "") {
                $("#batch").html("<option value=''>Select Batch</option>");
            }

            $.ajax({
                url: "/get-batch/" + course
                , type: "GET"
                , success: function(data) {
                    var batches = data.batches;
                    var html = "<option value=''>Select Batch</option>";

                    for (let i = 0; i < batches.length; i++) {
                        html += `<option value="` + batches[i]['id'] + `">` + batches[i]['batch_name'] + `</option>`;
                    }
                    $("#batch").html(html);

                }
            });
        });

    });

</script>
@endsection
