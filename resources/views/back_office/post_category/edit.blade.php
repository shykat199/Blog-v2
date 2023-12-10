@extends('back_office.layout.master')
@section('title','Create New Category')
@push('admin.style')
    <link href="{{asset('back_office/assets/select2/select2.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
          integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush
@section('dashboard.content')

    <x-category-component :categories="$allCategories" :post="$post" :subCategory="$subCategory"></x-category-component>
@endsection

@push('admin.script')
    <script src="{{asset('back_office/assets/select2/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('back_office/js/dropify.js')}}" type="text/javascript"></script>
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
        jQuery(".select2").select2({
            theme: "classic",
            width: 'resolve'
        });

    </script>

@endpush
