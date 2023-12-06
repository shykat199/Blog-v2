@extends('back_office.layout.master')
@section('title','Profile')
@push('admin.style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

@endpush
@section('dashboard.content')

    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-picture text-center"
                     style="background-image:url('{{asset('back_office/images/big/bg.jpg')}}')">
                    <div class="bg-picture-overlay"></div>
                    <div class="profile-info-name">
                        <img src="{{asset('back_office/images/avatar-1.jpg')}}"
                             class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                        <h3 class="text-white">{{\Illuminate\Support\Facades\Auth::user()->name}}</h3>
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>
        <div class="row user-tabs">
            <div class="col-lg-6 col-md-9 col-sm-9">
                <ul class="nav nav-tabs tabs">
                    <li class="active tab">
                        <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">About Me</span>
                        </a>
                    </li>

                    <li class="tab">
                        <a href="#messages-2" data-toggle="tab" aria-expanded="true">
                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                            <span class="hidden-xs">Settings</span>
                        </a>
                    </li>
                    <div class="indicator"></div>
                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content profile-tab-content">
                    <div class="tab-pane active" id="home-2">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Personal Information</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post"
                                              action="{{route('profile-update')}}" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group ">
                                                <label for="cname" class="control-label col-lg-2">User Name</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="cname" name="name"
                                                           value="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                                                           type="text" required="" aria-required="true">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="cname" class="control-label col-lg-2">User Email</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="cname" name="newName" type="text"
                                                           value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                                           required="" aria-required="true" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-success waves-effect waves-light"
                                                            type="submit">Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="messages-2">
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Update Password</h3>
                            </div>
                            <div class="panel-body">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post"
                                      action="{{route('password-update')}}" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Old Password
                                            (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="oName" name="oldPassword" type="password"
                                                   required="" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">New Password
                                            (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="nName" name="newName" type="password"
                                                   required="" aria-required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-success waves-effect waves-light updatePassword"
                                                    type="button">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Personal-Information -->
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('admin.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>

        $(document).on('click', '.updatePassword', function () {
            let oldPassword = $('#oName').val();
            let newPassword = $('#nName').val();

            $.ajax({
                url: "{{route('password-update')}}",
                method: "POST",
                data: {
                    oldPassword: oldPassword,
                    newPassword: newPassword,
                    '_token': '{{csrf_token()}}'
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                        $('#oName').val('');
                        $('#nName').val('');
                    } else {

                        toastr.error(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    toastr.error('Ajax request failed: ' + status + ' - ' + error);
                }
            });
        })

    </script>
@endpush
