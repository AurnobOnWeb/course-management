@extends('admin.layouts.template')
@section('title')
Dashboard | @foreach($settings as $setting)  {{ $setting->institute_name }}  @endforeach
@endsection
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Dashboard Of The Institute</h2>
            <p class="pageheader-text">Summar Of Your Buisness</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard Of The Institute</li>
                    </ol>
                </nav> 
            </div>
        </div>
    </div>
</div>
<div class="ecommerce-widget">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                   <a href="{{ route('course.index') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Courses</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $allcourse }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span>N/A</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
            
                    <a href="{{ route('course.index') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Active Courses</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $activecourse }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>Active Course</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('course.index') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Inactive Course</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $inactivecourse }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-down"></i></span><span>Inactive Course</span>
                    </div>
                </div>
                <div id="sparkline-revenue2"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    
                    <a href="{{ route('batches.index') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Batch</h5></a>
                    
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $allbatch }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span>N/A</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                 
                    <a href="{{ route('batches.index') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Active Batch</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $activebatch }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>Active Batch</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('batchFinishedReport') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Finished Batch</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $inactivebatch }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-down"></i></span><span>Finished Batch</span>
                    </div>
                </div>
                <div id="sparkline-revenue2"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('teacher.index') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Active Teacher</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $activeteacher }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>Active Teacher</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('teacher.index') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Inactive Teacher</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $inactiveteacher }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-down"></i></span><span>Inactive Teacher</span>
                    </div>
                </div>
                <div id="sparkline-revenue2"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('student.index') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Student</h5></a>

                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $allstudent }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span>N/A</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('student.index') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Enrolled Courses student</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $enrollstudent }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>Enrolled</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('PaymentFull') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Full Payment Student Count</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $fullpayment }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>Student</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('PaymentDues') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Due Payment Student Count</h5></a>
                    
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $duepayment }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-down"></i></span><span>Student</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('courseReport') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Estimated Earning</h5></a>
                    
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $totalEstimatedEarnings }} TK</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span>N/A</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('courseReport') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Earned</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $totalearned }} Tk</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>Earned</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('courseReport') }}" target="_blank" rel="noopener noreferrer"><h5 class="text-muted">Total Due</h5></a>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $totaldue }} Tk</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-down"></i></span><span>Due</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
    </div>
</div>

@endsection
