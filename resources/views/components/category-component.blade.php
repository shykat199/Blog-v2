<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Create New Category</h3></div>
            <div class="panel-body">

                <form class="form-horizontal" method="post" role="form"
                      action="{{isset($post) && !empty($post) ? route('update-category',$post->id) : route('store-category') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Select Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id">
                                <option value="" selected>Select from option</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{isset($post) && !empty($post->parent_id) && $post->parent_id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Select Sub Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="sub_category_id">
                                <option value="" selected>Select from option</option>
                                @if($subCategory)
                                    @foreach($subCategory as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category Name</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control categoryName"
                                   placeholder="Category name..."
                                   value="{{ old('title', $post->name ?? '') }}"
                                   onkeyup="convertToSlug(this.value)">
                        </div>
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category Name Slug</label>
                        <div class="col-md-10">
                            <input type="text" id="categorySlug" class="form-control "
                                   value="{{ old('categorySlug', $post->slug ?? '') }}"
                                   name="categorySlug"
                                   placeholder="Category slug..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Featured Image</label>
                        <div class="col-md-10">
                            <input type="file" name="categoryImage" class="dropify" data-height="160"
                                   data-default-file="{{ isset($post)? asset('storage/images/category/'.$post->image):''}}"
                                   data-allowed-file-extensions="jpeg png jpg" data-max-file-size-preview="3M"/>

                        </div>
                    </div>

                    <div class="row">
                        <div style="float: inline-end">
                            <button type="submit" class="btn btn-info waves-effect waves-light m-b-5">
                                <i class="fa fa-cloud"></i>
                                <span>{{isset($post) && !empty($post) ? 'Update' : 'Submit' }}</span>
                            </button>
                        </div>
                    </div>

                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div> <!-- End row -->
<script>
    function convertToSlug(str) {

//replace all special characters | symbols with a space
        str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
// trim spaces at start and end of string
        str = str.replace(/^\s+|\s+$/gm, '');
// replace space with dash/hyphen
        str = str.replace(/\s+/g, '-');
        document.getElementById("categorySlug").value = str;

    }
</script>
