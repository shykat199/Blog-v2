@extends('back_office.layout.master')
@section('title','All Post')
@push('admin.style')
    <style>

    </style>
@endpush
@section('dashboard.content')
    <div class="row">
        <!-- Basic example -->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Basic example</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->

        <!-- Horizontal form -->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Horizontal form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4" class="col-sm-3 control-label">Re Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Retype Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="checkbox2">
                                        Check me out !
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->

    </div>
@endsection

@push('admin.script')
    <script>

    </script>
@endpush
