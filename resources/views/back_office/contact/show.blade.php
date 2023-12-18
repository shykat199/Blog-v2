@extends('back_office.layout.master')
@section('title','Message Details')

@section('dashboard.content')

    <div class="col-md-12">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="inputEmail3"
                                   placeholder="User Name" readonly
                                   value="{{isset($contactData)?$contactData->name:''}}">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 50px">
                        <label for="post_url" class="col-sm-2 control-label">User Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control"
                                   value="{{$contactData->email}}" readonly
                                   placeholder="User Email">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 100px">
                        <label for="post_url" class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" readonly
                                   value="{{isset($contactData)?$contactData->subject:''}}"
                                   placeholder="User Email">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 150px">
                        <label for="post_url" class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" readonly>{{$contactData->message}}</textarea>
                        </div>
                    </div>
                    <div style="float: right; margin-top: 15px; padding-right: 12px">
                        <button type="button" id="deleteCategory" data-category-slug="{{$contactData->id}}" data-confirm-delete="true" class="btn btn-danger waves-effect waves-light m-b-5">Delete <i class="ion-trash-a"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('admin.script')

    <script>
        $(document).on('click', '#deleteCategory', function () {
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
                        url: '{{ route('delete-message') }}',
                        data: {
                            slug: categorySlug,
                        },
                        success: function () {
                            window.location = "{{route('show-message')}}";
                        }

                    });
                }
            });
        });
    </script>
@endpush

