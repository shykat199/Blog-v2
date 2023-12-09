<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img
                    src="{{ isset(\Illuminate\Support\Facades\Auth::user()->user_image)? asset('storage/images/user/'.\Illuminate\Support\Facades\Auth::user()->user_image):asset('back_office/images/avatar-1.jpg')}}"
                    alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                </div>

                <p class="text-muted m-0">
                    @if(\Illuminate\Support\Facades\Auth::user()->role==1)
                        Admin
                    @elseif(\Illuminate\Support\Facades\Auth::user()->role==2)
                        Sub Admin
                    @else
                        Users
                    @endif
                </p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>
                @hasanyrole('sub_admin|admin')
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Users </span><span
                            class="pull-right">
                            <i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('user-list')}}">User List</a></li>
                        <li><a href="{{route('create-user')}}">Create User</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Acl </span><span
                            class="pull-right">
                            <i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('show-role')}}">Roles</a></li>
                        <li><a href="{{route('show-permission')}}">Permissions</a></li>
                    </ul>
                </li>
                @endhasanyrole
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-mail"></i><span> News </span><span
                            class="pull-right">
                            <i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('show-post')}}">All Post</a></li>
                        <li><a href="{{route('create-post')}}">New Post</a></li>
                        @hasanyrole('sub_admin|admin')
                        <li><a href="{{route('show-category')}}">Post Categories</a></li>
                        <li><a href="{{route('show-tag')}}">Post Tags</a></li>
                        @endhasanyrole
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->

@push('admin.script')
    <script>
        $(document).on('click', '.md-add', function () {
            // $(this).parents('.has_sub').find('.waves-effect').addClass('subdrop')
        })
    </script>
@endpush
