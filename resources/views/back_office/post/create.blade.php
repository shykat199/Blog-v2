@extends('back_office.layout.master')
@section('title','Create New Post')

@section('dashboard.content')
    <x-post-component :categories="$allCategories"></x-post-component>
@endsection

