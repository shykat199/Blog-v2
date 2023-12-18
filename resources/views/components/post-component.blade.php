@push('admin.style')
    <link href="{{asset('back_office/assets/select2/select2.css')}}" rel="stylesheet" type="text/css"/>
    {{--    <link href="{{asset('back_office/css/dropify.css')}}" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
          integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush

<form action="{{isset($posts)?route('update-post',$posts->post_url):route('store-post')}}" method="post"
      id="postForm"
      enctype="multipart/form-data">
    @csrf

    <div class="col-md-9">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Post Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="inputEmail3"
                                   placeholder="Post title"
                                   value="{{isset($posts)?$posts->title:''}}"
                                   onkeyup="convertToSlug(this.value)">
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 50px">
                        <label for="post_url" class="col-sm-2 control-label">Post Url</label>
                        <div class="col-sm-10">
                            <input type="text" name="post_url" class="form-control" id="postUrl"
                                   value="{{isset($posts)?$posts->post_url:''}}"
                                   placeholder="Post url" readonly>
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
                    <textarea class="form-control" name="description"
                              id="editor">{{isset($posts)?$posts->description:''}}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="cat_id">Category Name</label>
                    <select class="select2 mainCategory" name="cat_id" data-placeholder="Choose a category..."
                            style="width: 100%">
                        <option value="">&nbsp;</option>
                        @foreach($categories as $key => $category)
                            <option
                                value="{{$category->id}}" {{isset($posts)?($posts->cat_id == $category->id ? 'Selected':''):''}}>{{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="sub_cat_id">Sub Category Name</label>
                    <select class="select2" id="subCategory" name="sub_cat_id" data-placeholder="Choose a Country..."
                            style="width: 100%">
                        <option value="">&nbsp;</option>

                    </select>

                </div>
                @hasanyrole('admin|sub_admin')
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="select2" name="status" data-placeholder="Choose a Country..." style="width: 100%">
                        <option value="Active" {{isset($posts)?($posts->status == 'Active'?'SELECTED':''):''}}>Publish
                        </option>
                        <option value="Pending"{{isset($posts)?($posts->status == 'Pending'?'SELECTED':''):''}}>
                            Pending
                        </option>
                        <option value="Inactive"{{isset($posts)?($posts->status == 'Inactive'?'SELECTED':''):''}}>Inactive
                        </option>
                    </select>
                </div>
                @endrole
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox3" name="is_featured"
                               type="checkbox" {{isset($posts) && $posts->is_featured == 1?'checked':''}}>
                        <label for="checkbox3">
                            Is Featured Post
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="tag_id">Post Tag</label>
                    <select class="select2" id="tags" name="tag_id[]" multiple
                            data-placeholder="Choose tag from post..." style="width: 100%">
                        <option value="">Chose tag for post</option>
                    </select>

                </div>
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="image">Featured Image</label>
                    <input type="file" name="image" class="dropify" data-height="168"
                           data-default-file="{{ isset($posts)? asset('storage/images/post/'.$posts->featured_image):''}}"
                           data-allowed-file-extensions="jpeg png jpg" data-max-file-size-preview="3M"/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="padding: 5px">
                    <button type="submit" class="btn btn-block btn-lg btn-primary waves-effect waves-light">
                        {{isset($posts)?'Update Post':'Submit Post'}}
                    </button>
                </div>
            </div>
        </div>
    </div>


</form>

@push('admin.script')

    <script src="{{asset('back_office/assets/select2/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('back_office/js/jqueryValidate.js')}}" type="text/javascript"></script>
    <script src="{{asset('back_office/js/dropify.js')}}" type="text/javascript"></script>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"--}}
    {{--            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="--}}
    {{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"--}}
    {{--            integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="--}}
    {{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.config.width = "100%";
        CKEDITOR.config.height = "425px"

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
        $(document).ready(function () {
            $('#tags').select2({
                ajax: {
                    url: '{{route('tag-post')}}',
                    dataType: 'json',
                    type: 'GET',
                    delay: 300,
                    data: function (params) {
                        return {
                            query: params.term,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (tag) {
                                return {
                                    id: tag.id,
                                    text: tag.tag_name,
                                };
                            }),
                        };
                    },
                    cache: true,
                },
                minimumInputLength: 0,
            });
        });


        $('.mainCategory').on('change', function () {
            let data = $(".select2 option:selected").val();
            let subCategory = $('#subCategory')
            let subCategoryText = ''
            $.ajax({
                url: '{{route('post-sub-category')}}',
                type: 'GET',
                data: {
                    cat_id: data
                },
                success: function (response) {
                    response.forEach(function (subcategory) {
                        subCategoryText += ` <option value="${subcategory.id}">${subcategory.name}</option>`;
                    })
                    subCategory.html(subCategoryText);
                    $('#subcategory').select2();
                }
            })
        })

        function convertToSlug(str) {

            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm, '');
            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');
            document.getElementById("postUrl").value = str;

        }

    </script>
    @if(empty($posts))
        <script>
            $('#postForm').validate({

                rules: {
                    title: {
                        required: true
                    },
                    cat_id: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    image: {
                        required: true
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                }
            })
        </script>
    @endif

    @if($posts)
        <script>
            $(document).ready(function () {
                let postCategoryId = {{$posts->cat_id}};
                let subCategory = $('#subCategory');
                let subCategoryId = {{$posts->sub_cat_id}};
                let subCategoryText = ''
                $.ajax({
                    url: '{{route('post-sub-category')}}',
                    type: 'GET',
                    data: {
                        cat_id: postCategoryId
                    },
                    success: function (response) {
                        response.forEach(function (subcategory) {
                            subCategoryText += ` <option value="${subcategory.id}" ${subCategoryId == subcategory.id ? 'selected' : ''}>${subcategory.name}</option>`;
                        })
                        subCategory.html(subCategoryText);
                        $('#subcategory').select2();
                    }
                })

            });

            $(document).ready(function () {
                let tags = $('#tags');
                let postTags = {{$posts->sub_cat_id}};
                let tag = ''
                $.ajax({
                    url: '{{route('post-tag-data')}}',
                    type: 'GET',
                    data: {
                        tagList: <?= json_encode($posts->tags->pluck('tag_name', 'id')->toArray()) ?>
                    },
                    success: function (response) {
                        tags.html(response.selectedTagList)
                        $('#subcategory').select2();
                    }
                })

            });

        </script>
    @endif
@endpush
