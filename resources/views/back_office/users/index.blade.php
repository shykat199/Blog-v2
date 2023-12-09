@extends('back_office.layout.master')
@section('title','All Users')
@push('admin.style')
    <style>

    </style>
@endpush
@section('dashboard.content')
    <div class="row">
        <!-- Basic example -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <button class="btn btn-primary waves-effect waves-light m-b-5 btn-create">
                            <span>Create New User</span>&nbsp;&nbsp;<i
                                class="fa fa-plus-square"></i></button>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($userData as $key => $posts)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>
                                            <img style="height: 80px; width: 100px"
                                                 src="{{isset($posts->user_image) ? asset('storage/images/user/' . $posts->user_image) : asset('back_office/images/avatar-1.jpg')}}"
                                                 alt="{{ $posts->name }}">
                                        </td>
                                        <td>{{$posts->name}}</td>
                                        <td>{{$posts->email}}</td>
                                        <td>User</td>
                                        <td>{{\Carbon\Carbon::parse($posts->created_at)->format('Y-m-d g:i A')}}</td>

                                        <td>
                                            <a href="{{route('edit-user',$posts->id)}}"
                                               class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                            &nbsp; &nbsp;
                                            <a style="cursor: pointer"
                                               class="on-default remove-row deleteCategory"
                                               data-category-slug="{{$posts->id}}"
                                               data-confirm-delete="true"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->

    </div>
@endsection

@push('admin.script')
    <script>
        $(document).ready(function () {
            $('#datatable').dataTable();
        });
        $(document).on('click', '.btn-create', function () {
            window.location.href = "{{route('create-user')}}";
        })
    </script>
    <script>
        $(document).on('click', '.deleteCategory', function () {
            let categorySlug = $(this).data('category-slug');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'GET',
                        url: '{{ route('delete-post') }}',
                        data: {
                            slug: categorySlug,
                        },
                        success: function () {
                            location.reload(true);
                        }

                    });
                }
            });
        });
    </script>
@endpush
