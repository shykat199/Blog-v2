@extends('back_office.layout.master')
@section('title','Dashboard')
@section('dashboard.content')
    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="fa fa-newspaper-o"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{count($totalPosts)}}</span>
                    Total Post
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-purple"><i class="ion-ios7-paper"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{count($approvePosts)}}</span>
                   Total Approve Posts
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-purple"><i class="ion-ios7-paper"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{count($pendingPosts)}}</span>
                   Total Pending Posts
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-purple"><i class="ion-ios7-paper"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{count($inactivePosts)}}</span>
                   Total Inactive Posts
                </div>
            </div>
        </div>
        @hasanyrole('sub_admin|admin')
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="ion-android-social"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{count($users)}}</span>
                    Total Users
                </div>

            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-android-social-user"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{count($role)}}</span>
                    Total Role
                </div>
            </div>
        </div>
        @endhasanyrole
    </div>
    <!-- End row-->
@endsection
