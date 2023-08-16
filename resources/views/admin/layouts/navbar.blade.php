<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top" style="color:black">
        @foreach ($settings as $setting)
        <a class="navbar-brand" href="{{ route('dashboard') }}">{{ $setting->institute_name }}</a>
        @endforeach
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li>
                
                
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if($user->image == !null)
                        <img src=" {{ asset('backend/assets') }}/images/{{ $user->image }}" alt="" class="user-avatar-md rounded-circle">
                        @else
                        <img src=" {{ asset('backend/assets') }}/images/add.png" alt="" class="user-avatar-md rounded-circle">
                        @endif
                       
                    
                    </a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink3">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">{{ $user->name }} </h5>
                        </div>
                        <a class="dropdown-item" href="{{ route('profile.edit')}}"><i class="fas fa-user mr-2"></i>Account</a>

                        <form id="myForm" action="{{ route('logout') }}" method="post">
                            @csrf
                        <a class="dropdown-item" type="submit" onclick="myFunction()"><i class="fas fa-power-off mr-2"></i>Logout</a>

                    </form>
                        <script>
                            function myFunction() {
                              document.getElementById("myForm").submit();
                            }
                            </script>
                    </div>
                    
                </li>
                
            </ul>
        </div>
    </nav>
</div>