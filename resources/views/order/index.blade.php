@extends('main')
@section('content')
    <food-category-component 
        :categories="{{ $categories }}"
    />
@endsection