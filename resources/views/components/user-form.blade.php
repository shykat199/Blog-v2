@push('admin.style')
    <link href="{{asset('back_office/assets/select2/select2.css')}}" rel="stylesheet" type="text/css"/>
    {{--    <link href="{{asset('back_office/css/dropify.css')}}" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
          integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush

<form action="{{isset($posts)?route('update-user',$posts->id):route('store-user')}}" method="post"
      id="postForm"
      enctype="multipart/form-data">
    @csrf

    <div class="col-md-9">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="inputEmail3"
                                   placeholder="User Name"
                                   value="{{isset($posts)?$posts->name:''}}">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 50px">
                        <label for="post_url" class="col-sm-2 control-label">User Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control"
                                   value="{{isset($posts)?$posts->email:''}}"
                                   placeholder="User Email">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="status">User Role</label>
                    <select class="select2" name="role" data-placeholder="Select Role..." style="width: 100%">
                        <option value="" SELECTED>Select Role
                        </option>
                        <option value="1" {{isset($posts)?($posts->role == 1 ?'SELECTED':''):''}}>ADMIN
                        </option>
                        <option value="2" {{isset($posts)?($posts->role == 2 ?'SELECTED':''):''}}>SUB ADMIN
                        </option>
                        <option value="3"{{isset($posts)?($posts->role == 3 ?'SELECTED':''):''}}>
                            USER
                        </option>

                    </select>

                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="select2" name="status" data-placeholder="Select Role..." style="width: 100%">
                        <option value="" SELECTED>Select status
                        </option>
                        <option value="1" {{isset($posts)?($posts->status == 1 ?'SELECTED':''):''}}>Active
                        </option>
                        <option value="0" {{isset($posts)?($posts->role == 0 ?'SELECTED':''):''}}>Inactive
                        </option>

                    </select>

                </div>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="image">Featured Image</label>
                    <input type="file" name="image" class="dropify" data-height="150"
                           data-default-file="{{ isset($posts)? asset('storage/images/user/'.$posts->user_image):''}}"
                           data-allowed-file-extensions="jpeg png jpg" data-max-file-size-preview="3M"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body" style="padding: 5px">
                <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect waves-light">
                    {{isset($posts)?'Update User':'Create User'}}

                </button>
            </div>
        </div>
    </div>

</form>

@push('admin.script')

    <script src="{{asset('back_office/assets/select2/select2.min.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
            integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        jQuery(".select2").select2({
            theme: "classic",
            width: 'resolve',
        });
    </script>
    <script>

        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a image here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>


    <script>
        $('#postForm').validate({

            rules: {
                title: {
                    required: true
                },

                email: {
                    required: true
                },
                status: {
                    required: true
                },

                role: {
                    required: true
                },

            },
            submitHandler: function (form) {
                form.submit();
            }
        })
    </script>

@endpush
