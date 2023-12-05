@extends('back_office.layout.master')
@section('title','Update Post')

@section('dashboard.content')
    <x-post-component :categories="$allCategories" :posts="$postDetails"></x-post-component>
@endsection
