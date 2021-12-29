@extends('main')
@section('content')
<div class="w-1/2 rounded-lg overflow-hidden text-center">
    <div class="md:flex">
        <div class="w-full p-3">
            <div class="border rounded-lg border-dashed py-5 border-3 bg-blue-600">
                <div class="p-3">
                    <h5 class="text-white">Customer Name</h5>
                        <span class="text-white text-3xl font-bold">{{ $order->customer_name }}</span>
                    <h6 class="text-white mt-2">Purchase Date</h6>
                        <span class="text-white text-2xl font-bold">{{ $order->created_at->format('M d Y') }}</span>
                </div>
                <div class="flex w-full mt-3 mb-3"> <span class="border border-dashed w-full border-white"></span> </div>
                <div class="p-3 space-y-5">
                    <div class="flex flex-col">
                        <span class="text-gray-200">Order Lists</span>
                            @foreach ($order->order_details as $item)
                                <li class="text-white">{{ $item->menu->name }} {{ $item->qty }}x</li>
                            @endforeach
                        </ul>
                    </div>
                    @if($order->coupon_used !== 'null')
                        <div class="flex flex-col">
                            <span class="text-gray-200">Coupon Used</span>
                            <span class="text-white text-lg font-bold">{{ $order->coupon_used }}</span>
                        </div>
                    @endif
                    <div class="flex flex-col"> <span class="text-gray-200">Total Items</span> <span class="text-white text-lg font-bold">{{ $order->total_items }}</span> </div>
                    <div class="flex flex-col">
                        <span class="text-gray-200">Total Price</span>
                        <span class="text-white text-lg font-bold">{{ number_format($order->total, 2,'.', ',') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection