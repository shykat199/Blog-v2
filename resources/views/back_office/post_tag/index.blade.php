@extends('back_office.layout.master')
@section('title','All Tags')
@push('admin.style')

@endpush
@section('dashboard.content')
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create New Tag</h3>
            </div>
            <div class="panel-body">
                <form role="form"
                      action="{{isset($tagDetails)?route('update-tag',$tagDetails->id):route('store-tag')}}"
                      method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post Tag</label>
                        <input type="text" class="form-control" value="{{isset($tagDetails)? $tagDetails->tag_name:''}}"
                               name="tag_name" id="exampleInputEmail1" placeholder="Enter tag name"
                               onkeyup="convertToSlug(this.value)">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Tag Slug</label>
                        <input type="text" name="slug" value="{{isset($tagDetails)? $tagDetails->tag_slug:''}}"
                               class="form-control" id="exampleInputEmail2" placeholder="Enter tag name"
                            {{isset($tagDetails)?'disable':'readonly'}}>
                    </div>
                    <button type="submit"
                            class="btn btn-success waves-effect waves-light">{{isset($tagDetails)?'Update':'Create'}}</button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div>

    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tag</th>
                                <th>Tag Slug</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($allTags as $key => $tag)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$tag->tag_name}}</td>
                                    <td>{{$tag->tag_slug}}</td>

                                    <td class="">
                                        <a href="{{route('edit-tag',$tag->tag_slug)}}"
                                           class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                        &nbsp; &nbsp;
                                        <a style="cursor: pointer"
                                           class="on-default remove-row deleteCategory"
                                           data-category-slug="{{$tag->tag_slug}}"
                                           data-confirm-delete="true"><i class="fa fa-trash-o"></i></a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div> <!-- panel -->
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
                        url: '{{ route('delete-tag') }}',
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
    <script>
        function convertToSlug(str) {

            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm, '');
            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');
            document.getElementById("exampleInputEmail2").value = str;

        }
    </script>

@endpush
