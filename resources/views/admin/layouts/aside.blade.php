<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                       Menu
                    </li>
                   @can('view dashboard')
                    
                
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    @endcan
               
                  @can('view course')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-list"></i>Course</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @can('create course')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('course/create') }}">Add Course <span class="badge badge-secondary">New</span></a>
                                </li>
                                @endcan
                                @can('view course')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('course') }}">View All Course</a>
                                </li>
                               @endcan
                            </ul>
                        </div>
                    </li>
                    @endcan
                    @can('view teacher')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class=" fas fa-child"></i> Teacher</a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @can('create teacher')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('teacher/create') }}">Add Teacher </a>
                                </li>
                                @endcan
                                @can('view teacher')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('teacher') }}">View All Teacher</a>
                                </li>
                                @endcan
                                @can('teacher salary')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{  route('teacherSalary') }}">Teacher Salary</a>
                                </li>
                                @endcan
                                
                            </ul>
                        </div>
                    </li>
                    @endcan
                    @can('view batch')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-list-alt"></i> Batches</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @can('create batch')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('batches/create') }}">Add Batches </a>
                                </li>
                                @endcan
                                @can('view batch')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('batches') }}">View All Batches</a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcan
                    @can('view student')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-address-card"></i>Student Information</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @can('create student')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('student.create') }}">Add Student </a>
                                </li>
                                @endcan
                                @can('view student')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('student.index') }}">View All Enrolled Student</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('resources.unenrollStudent') }}">View All UnEnrolled Student</a>
                                </li>
                                @endcan
                                
                            </ul>
                        </div>
                    </li>
                    @endcan
                    @can('view enroll')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('enrollments') }}"><i class="fa fa-fw fa-user-circle"></i>Manual Enrollments</a>
                    </li> 
                    @endcan
                    @can('view all payment')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class=" fas fa-dollar-sign"></i>Payment Queries</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @can('view all payment')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('payment.index') }}">Student All Payments </a>
                                </li>
                                @endcan
                                @can('view due payment')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('PaymentDues') }}">Student Due's </a>
                                </li>
                                @endcan
                                @can('view full payment')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('PaymentFull') }}"> Student Full Payments</a>
                                </li>
                                @endcan
                                
                            </ul>
                        </div>
                    </li>
                    @endcan
                    @can('completed batch')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-13" aria-controls="submenu-13"><i class=" fas fa-file-archive"></i>Reports</a>
                        <div id="submenu-13" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                               @can('completed batch')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('batchFinishedReport') }}">Completed Batch</a>
                                </li>
                                @endcan
                                @can('course report')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('courseReport') }}">Course based Payment report</a>
                                </li>
                                @endcan
                                @can('batch report')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('batchReport') }}">Batch based payment report</a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                   @endcan
                  @can('message')
                    
                 
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-12" aria-controls="submenu-12"><i class="far fa-envelope"></i>Massages</a>
                        <div id="submenu-12" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                              
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('particularStudent') }}">Particular student</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('allStudent') }}">All student</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('courseSms') }}">Course</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('batchSms') }}">Batch</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('particularTeacher') }}">Particular Teacher</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('allTeacher') }}">All Teacher</a>
                                </li>
                            </ul>
                        </div>
                    </li> 
                    @endcan
                    @can('visitor')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-17" aria-controls="submenu-17"><i class="far fa-envelope"></i>Physical Visitors</a>
                        <div id="submenu-17" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                              
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('visitorAdd') }}">Add Visitors Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('visitorView') }}">View all visitors</a>
                                </li>
                             
                            </ul>
                        </div>
                    </li>
                    @endcan
                    @can('website setting view')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('websiteSettings') }}"><i class=" fas fa-cogs"></i>Website Primary Settings</a>
                    </li>
                    @endcan
                    @can('manage role')
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11"><i class="far fa-save"></i>Role And Permissions</a>
                        <div id="submenu-11" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @can('manage role')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('role') }}">Manage Role And Permissions </a>
                                </li>
                                @endcan
                                @can('teacher role')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('roleAssignTeacher') }}"> Assign Role To Teacher</a>
                                </li>
                                @endcan
                                @can('view teacher role')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('viewTeacherRole') }}"> View  Teacher Role</a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcan
                </ul>
            </div>
        </nav>
    </div>
</div>