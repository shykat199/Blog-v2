@extends('back_office.layout.master')
@section('title','Permission')
@section('dashboard.content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Create New Permission</h3></div>
                <div class="panel-body">
                    <form class="form-inline" action="{{isset($editPermission)? route('update-permission',$editPermission->id) : route('create-permission')}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Permission Name</label>
                            <input type="text" name="permissionName" class="form-control"
                                   value="{{isset($editPermission)?$editPermission->name:''}}"
                                   id="exampleInputEmail2" placeholder="Enter permission">

                            <span class="error-message"></span>
                        </div>
                        <button type="button" class="btn btn-success waves-effect waves-light m-l-10 create">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#id</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($permissions as $key => $permission)
                    <tr class="gradeX">
                        <td class="rolId">{{++$key}}</td>
                        <td class="roleName">{{$permission->name}}</td>
                        <td class="actions">
                            <a href="{{route('edit-permission',$permission->id)}}" class="on-default edit-row">
                                <i data-roleId="{{$permission->id}}" class="fa fa-pencil edit"></i>
                            </a>
                            <a href="{{route('delete-permission',$permission->id)}}" class="on-default remove-row">
                                <i data-roleId="{{$permission->id}}" class="fa fa-trash-o dlt"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <p>No replies</p>
                @endforelse
                </tbody>
            </table>
            @if ($permissions->hasPages())
                <div class="pagination-wrapper">
                    {{ $permissions->links() }}
                </div>
            @endif
        </div>
    </div>
    <!-- End row-->
@endsection
@push('admin.script')
    <script>
        function formValidate(form) {
            form.validate({
                rules: {
                    permissionName: {
                        required: true
                    }
                },
                messages: {
                    permissionName: {
                        required: "Please enter permission name."
                    }
                },
                errorPlacement: function (error, element) {

                    error.appendTo(element.siblings('.error-message'));
                },
                highlight: function (element, errorClass, validClass) {

                    $(element).closest('.form-group').addClass('has-error');
                }
            });
        }

        $(document).on('click', '.create', function () {
            let form = $(this).parents('.panel-body').find('.form-inline');
            formValidate(form);
            if (form.valid()) {
                form.submit()
            }
            return false
        });

    </script>
@endpush
