@extends('main')
@section('content')
    <div class="flex flex-col w-full">
        @if(session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-5 rounded relative" role="alert">
            <strong class="font-bold">Something went wrong!</strong>
            <span class="block sm:inline">{{ session()->get('error') }}</span>
        </div>
        @endif
        <order-component 
            :categories="{{ $categories }}"
        />
    </div>
@endsection