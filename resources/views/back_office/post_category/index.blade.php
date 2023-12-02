@extends('back_office.layout.master')
@section('title','All Category')
@push('admin.style')
    <link href="{{asset('back_office/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

    <style>
        .subcategory {
            list-style-type: none;
            padding: 0;
        }

        .subcategory li {
            display: flex;
            align-items: center;
            padding: 5px;
            margin: 5px;
            border: 1px solid #eee;
            border-radius: 4px;
            cursor: pointer;
        }

        .name, .slug {
            flex-grow: 1;
        }

        .arrow::before {
            content: "→";
            margin-right: 10px;
        }

        .slug {
            padding: 2px;
        }


    </style>
@endpush
@section('dashboard.content')
    <div class="row">
        <!-- Basic example -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <button class="btn btn-primary waves-effect waves-light m-b-5 btn-create"><span>Create New Category</span>&nbsp;&nbsp;<i
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
                                    <th>Category</th>
                                    <th>Category Slug</th>
                                    <th>Sub Category</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($allCategories as $key => $category)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            @if($category->subCategory)
                                                <ul class="subcategory">
                                                    @foreach($category->subCategory as $subCategory)
                                                        <li>
                                                            <span class="name">{{$subCategory->name}}</span>
                                                            <span class="arrow"></span> &nbsp; &nbsp;
                                                            <span class="slug">{{$subCategory->slug}}</span>
                                                            <a href="{{route('edit-category',$subCategory->slug)}}"
                                                               class="on-default edit-row "><i class="fa fa-pencil"></i></a>
                                                            &nbsp; &nbsp;
                                                            <a
                                                                class="on-default remove-row deleteCategory"
                                                                data-category-slug="{{$subCategory->slug}}"
                                                                data-confirm-delete="true"><i class="fa fa-trash-o"></i></a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <span>No Data found</span>
                                            @endif

                                        </td>
                                        <td class="">
                                            <a href="{{route('edit-category',$category->slug)}}"
                                               class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                            &nbsp; &nbsp;
                                            <a style="cursor: pointer"
                                               class="on-default remove-row deleteCategory"
                                               data-category-slug="{{$category->slug}}"
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
    <script src="{{asset('back_office/assets/datatables/jquery.dataTables.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#datatable').dataTable();
        });
    </script>
    <script>
        $(document).on('click', '.btn-create', function () {
            window.location.href = "{{route('create-category')}}";
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
                        url: '{{ route('delete-category') }}', // Replace with your actual delete route
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
