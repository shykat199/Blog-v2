@extends('back_office.layout.master')
@section('title','Dashboard')
@section('dashboard.content')
    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="fa fa-newspaper-o"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{isset($totalPosts)?count($totalPosts):'0'}}</span>
                    Total Post
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-purple"><i class="ion-ios7-paper"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{isset($approvePosts)?count($approvePosts):'0'}}</span>
                   Total Approve Posts
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-purple"><i class="ion-ios7-paper"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{isset($pendingPosts)?count($pendingPosts):'0'}}</span>
                   Total Pending Posts
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-purple"><i class="ion-ios7-paper"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{isset($inactivePosts)?count($inactivePosts):'0'}}</span>
                   Total Inactive Posts
                </div>
            </div>
        </div>
        @hasanyrole('sub_admin|admin')
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="ion-android-social"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{isset($users)?count($users):'0'}}</span>
                    Total Users
                </div>

            </div>$users
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-android-social-user"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{isset($role)?count($role):'0'}}</span>
                    Total Role
                </div>
            </div>
        </div>
        @endhasanyrole
    </div>
    <!-- End row-->
@endsection
