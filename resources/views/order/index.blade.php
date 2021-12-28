@extends('main')
@section('content')
    <div class="flex flex-col">
        <h1 class="font-extrabold tracking-wide text-black mb-5">SELECT A FOOD CATEGORY</h1>
        @foreach($categories as $category)
            <a href="{{ route('order.category.menu',['category_id' => $category->id]) }}" class="bg-green-300 mb-2 text-white rounded-md py-3 px-2 font-bold text-center cursor-pointer">{{ $category->category_name }}</a>
        @endforeach
    </div>
@endsection