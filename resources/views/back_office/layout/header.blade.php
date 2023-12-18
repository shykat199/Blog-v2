<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{route('dashboard')}}" class="logo"><i class="md md-terrain"></i> <span>NewsRoom</span></a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <form class="navbar-form pull-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                    </div>
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </form>

                <ul class="nav navbar-nav navbar-right pull-right">

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img
                            <img src="{{ isset(\Illuminate\Support\Facades\Auth::user()->user_image)? asset('storage/images/user/'.\Illuminate\Support\Facades\Auth::user()->user_image):asset('back_office/images/avatar-1.jpg')}}" alt="" class="thumb-md img-circle">
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.profile')}}"><i class="md md-face-unlock"></i> Profile</a></li>
                            <li><a href="{{route('log-out')}}"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
