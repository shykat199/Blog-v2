@extends('back_office.layout.master')
@section('title','Role')
@push('admin.style')
    <style>

        .menu {
            list-style-type: none;
            padding: 0;
        }

        .menu li {
            display: inline-block;
            margin-right: 1px;
        }

        .add-permission {
            margin-top: 2px;
        }

        .menu li a {
            display: block;
            color: white;
            text-align: center;
            padding: 5px 10px;
            background-color: #333;
            text-decoration: none;
        }

        .menu li a:hover {
            background-color: #555;
        }

        .toggle-eye {
            max-width: 100%;
            cursor: pointer;
        }


    </style>
    <style>
        /* This css is for normalizing styles. You can skip this. */
        *, *:before, *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        .new {
            padding: 5px;
        }

        .form-group {
            display: block;
            margin-bottom: 15px;
        }

        .form-group input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;


        }

        .form-group label {
            position: relative;
            cursor: pointer;
            margin-right: 20px;
        }

        .form-group label:before {
            content: '';
            -webkit-appearance: none;
            background-color: transparent;
            border: 2px solid #0079bf;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
            margin-right: 5px;
        }

        .form-group input:checked + label:after {
            content: '';
            display: block;
            position: absolute;
            top: 2px;
            left: 9px;
            width: 6px;
            height: 14px;
            border: solid #0079bf;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    </style>
@endpush
@section('dashboard.content')
    <!-- Start Widget -->
    <div class="row">
        <div class="panel">

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="m-b-30">
                            <button id="addToTable" class="btn btn-primary waves-effect waves-light">Add <i
                                    class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="datatable-editable">
                    <thead>
                    <tr>
                        <th>#id</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($allRoles as $key => $role)
                        <tr class="gradeX">
                            <td class="rolId">{{++$key}}</td>
                            <td class="roleName">{{$role->name}}</td>
                            <td><i class="far fa-eye toggle-eye"></i>
                                <div class="permission-data">
                                    <ul class="menu">
                                        @forelse($role->permissions as $key => $permission)
                                            <li class="hidden permission-name">
                                                <a href="#">{{$permission->name}}</a></li>
                                        @empty
                                            <p class="empty-data"></p>
                                        @endforelse
                                            <li class="hidden add-permission show-permission" data-roleId="{{$role->id}}">
                                                <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fa fa-plus-square"></i>
                                                </button>

                                            </li>
                                    </ul>
                                </div>
                            </td>
                            <td class="actions">
                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save save"></i></a>
                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times cancel"></i></a>
                                <a href="#" class="on-default edit-row"><i data-roleId="{{$role->id}}"
                                                                           class="fa fa-pencil edit"></i></a>
                                <a href="{{route('delete-role',$role->id)}}" class="on-default remove-row"><i
                                        data-roleId="{{$role->id}}" class="fa fa-trash-o dlt"></i></a>
                            </td>
                        </tr>
                    @empty
                        <p>No replies</p>
                    @endforelse

                    </tbody>
                </table>
            </div>
            <!-- end: page -->

        </div> <!-- end Panel -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Permission</h5>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('admin.script')
    <script>
        function formValidate(form) {
            form.validate({
                rules: {
                    name: {
                        required: true
                    }
                },
                message: {
                    name: {
                        required: "Please enter role name."
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
    </script>
    <script>
        $(document).on('click', '#addToTable', function () {
            $(this).attr('disabled', true)
            let count = $('.gradeX').length;
            let tableRow = `
            <tr role="row" class="adding odd gradeX">
            <td>${count += 1}</td>
            <td>
                <form class="myForm" method="post" action="{{ route('create-role') }}">
                @csrf
            <input type="text" name="name" class="form-control input-block" value="">
            <span class="error-message"></span>
        </form>
    </td>
    <td class="actions">
    <a href="#" class="on-editing save-row"><i class="fa fa-save save"></i></a>
    <a href="#" class="on-editing cancel-row edit"><i class="fa fa-times cancel-rmv"></i></a>

    </td>
    </tr>`;

            $("#datatable-editable tbody").prepend(tableRow);
            formValidate($('.myForm').last());
        })
        $(document).on('click', '.edit', function () {

            let actionRow = $(this).closest('tr');
            actionRow.find('.edit-row,.remove-row').addClass('hidden');
            actionRow.find('.save-row, .cancel-row').removeClass('hidden');
            let roleId = $(this).attr('data-roleId')

            let row = $(this).closest('tr').find('.roleName')
            let rowId = $(this).closest('tr').find('.roleId')
            let name = row.text();
            let id = rowId.text();
            actionRow.find('.cancel-row').attr('data-name', name)

            let tableRow = `
            <tr role="row" class="adding odd gradeX">
            <td>${id}</td>
            <td class ="form">
                <form class="myForm"  method="post" action="{{ route('update-role') }}">
                @csrf
            <input type="text" name="name" class="form-control input-block roleName" value="${name}">
                    <input type="hidden" name="roleId" class="form-control input-block roleName" value="${roleId}">
                </form>
            </td>
            </tr>`;

            row.html(tableRow)

        })
        $(document).on('click', '.cancel-row', function () {
            let name = $(this).attr('data-name');
            let form = $(this).closest('tr').find('.adding').remove();
            let a = $(this).closest('tr').find('.roleName')
            a.text(name)
            let actionRow = $(this).closest('tr');
            actionRow.find('.edit-row,.remove-row').removeClass('hidden');
            actionRow.find('.save-row, .cancel-row').addClass('hidden');
        })
        $(document).on('click', '.cancel-rmv', function () {
            $(this).closest("tr").remove();
        })
    </script>
    <script>
        $(document).on('click', '.save-row', function () {
            let form = $(this).closest('tr').find('.myForm');
            if (form.valid()) {
                form.submit()
            }
        });
    </script>
    <script>
        $(document).on('click', '.toggle-eye', function () {
            let liCount = $(this).closest('td').find('.menu li').length
            if (liCount != 0) {
                $(this).closest('td').find('.menu li').toggleClass('hidden');
                $(this).closest('td').find('.empty-data').empty();
            } else {
                $(this).closest('td').find('.empty-data').html('No data found.').toggleClass('hidden')
            }
        })
    </script>
    <script>
        $(document).on('click','.show-permission',function (){
            let roleId= $(this).attr('data-roleId')
            $.ajax({
                url:'{{route('get-permission')}}',
                type:'GET',
                data:{
                    roleId:roleId
                },
                success:function (response){
                    $('#exampleModal .modal-body').html(response.permissionHtml);
                    $('#exampleModal').modal('show');
                }
            })
        })
    </script>
@endpush

