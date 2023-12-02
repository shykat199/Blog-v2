@extends('back_office.layout.master')
@section('title','Create New Post')
@push('admin.style')
    <link href="{{asset('back_office/assets/select2/select2.css')}}" rel="stylesheet" type="text/css"/>
    {{--    <link href="{{asset('back_office/css/dropify.css')}}" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
          integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

@endpush
@section('dashboard.content')
    <form action="{{route('create-post')}}" method="post" class="dropzone" id="my-awesome-dropzone">
        @csrf

        <div class="col-md-9">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Post Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Post title">
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 50px">
                            <label for="inputEmail4" class="col-sm-2 control-label">Post Url</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Post url">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Post Description</h3>
                    </div>
                    <div class="panel-body">
                        <textarea class="form-control" id="editor"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <select class="select2" data-placeholder="Choose a Country..." style="width: 100%">
                            <option value="#">&nbsp;</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Afghanistan">Afghanistan</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Category Name</label>
                        <select class="select2" data-placeholder="Choose a Country..." style="width: 100%">
                            <option value="#">&nbsp;</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Afghanistan">Afghanistan</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="select2" data-placeholder="Choose a Country..." style="width: 100%">
                            <option value="publish" SELECTED>Publish</option>
                            <option value="pending">Pending</option>
                            <option value="unpublished">Unpublished</option>
                        </select>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post Tag</label>
                        <select class="select2" multiple data-placeholder="Choose a Country..." style="width: 100%">
                            <option value="#">&nbsp;</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Afghanistan">Afghanistan</option>
                        </select>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Featured Image</label>
                        <input type="file" name="image" class="dropify" data-height="150"
                               data-allowed-file-extensions="jpeg png jpg" data-max-file-size-preview="3M"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default" >
                <div class="panel-body" style="padding: 5px">
                    <button type="button" class="btn btn-block btn-lg btn-primary waves-effect waves-light">Submit Post</button>
                </div>
            </div>
        </div>

    </form>
@endsection

@push('admin.script')
    <script src="{{asset('back_office/assets/select2/select2.min.js')}}" type="text/javascript"></script>
    {{--    <script src="{{asset('back_office/js/dropify.js')}}" type="text/javascript"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.config.width = "100%";
        CKEDITOR.config.height = "425px"

        jQuery(".select2").select2({
            theme: "classic",
            width: 'resolve'
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

@endpush
