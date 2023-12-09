@extends('back_office.layout.master')
@section('title','Update User')
@push('admin.style')
    <link href="{{asset('back_office/assets/select2/select2.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('dashboard.content')

    <x-user-form :post="$getAllUser"></x-user-form>
@endsection

@push('admin.script')
    <script src="{{asset('back_office/assets/select2/select2.min.js')}}" type="text/javascript"></script>

    <script>
        jQuery(".select2").select2({
            theme: "classic",
            width: 'resolve'
        });

    </script>

@endpush
