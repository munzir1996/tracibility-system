@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">

    <div class="min-h-screen flex justify-center">
        <div class="w-2/3 mx-auto">
<!-- left col Harvest -->
<div class="flex flex-row w-full">

    <div class="md:w-2/5 px-2 py-10">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2 flex justify-between">
                <div class="flex flex-row">
                </div>
                <div class="font-bold text-2xl">
                    {{$qrcode->cteShipping->cteAgent->cteHarvest->why}}
                </div>
            </div>
            <div class="text-gray-600 font-bold text-right">
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteShipping->cteAgent->cteHarvest->user->name}}</p>
                    <label class="mb-0" for="">: المنشيء</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteShipping->cteAgent->cteHarvest->organization->name}}</p>
                    <label class="mb-0" for="">: الجهة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteShipping->cteAgent->cteHarvest->what->gtin!!}</p>
                    <label class="mb-0" for="">: رقم البند</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteShipping->cteAgent->cteHarvest->what->batch!!}</p>
                    <label class="mb-0" for="">: رقم الدفعة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteShipping->cteAgent->cteHarvest->what->quantity!!} شوال</p>
                    <label class="mb-0" for="">: الكمية</label>
                </div>
                <div class="mb-3">
                    <span class="relative inline-block px-3 py-1 font-semibold  leading-tight
                    {{$qrcode->cteShipping->cteAgent->cteHarvest->harvestQrcode->status == Config::get('constants.delivery.received') ? 'text-green-900':''}}
                    {{$qrcode->cteShipping->cteAgent->cteHarvest->harvestQrcode->status == Config::get('constants.delivery.pending') ? 'text-orange-900':''}}
                    {{$qrcode->cteShipping->cteAgent->cteHarvest->harvestQrcode->status == Config::get('constants.delivery.rejected') ? 'text-red-900':''}}">
                        <span aria-hidden="" class="absolute inset-0 opacity-50 rounded-full
                        {{$qrcode->cteShipping->cteAgent->cteHarvest->harvestQrcode->status == Config::get('constants.delivery.received') ? 'bg-green-200':''}}
                        {{$qrcode->cteShipping->cteAgent->cteHarvest->harvestQrcode->status == Config::get('constants.delivery.pending') ? 'bg-orange-200':''}}
                        {{$qrcode->cteShipping->cteAgent->cteHarvest->harvestQrcode->status == Config::get('constants.delivery.rejected') ? 'bg-red-200':''}}"></span>
                        <span class="relative">{{$qrcode->cteShipping->cteAgent->cteHarvest->harvestQrcode->status}}</span>
                    </span>
                    <label class="mb-0" for="">: الحالة</label>
                </div>
            </div>
        </div>
    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 items-center bg-green-300 justify-center">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 leading-none border-green-300 text-center z-10 bg-white font-thin">
                <div>{{$qrcode->cteShipping->cteAgent->cteHarvest->when}}</div>
                {{-- <div>September</div> --}}
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="md:w-2/5 md:px-2 py-10 ">

    </div>
</div>
<!-- left col Harvest -->

{{-- right col Manafacture --}}
<div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 md:px-2 py-10">

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 bg-green-300 items-center justify-center">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin">
                <div>{{$qrcode->cteShipping->cteAgent->when}}</div>
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="md:w-2/5 px-2 py-10 ">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2">
                <div class="font-bold text-2xl text-right">
                    {{$qrcode->cteShipping->cteAgent->why}}
                </div>
            </div>
            <div class="text-gray-600 font-bold text-right">
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteShipping->cteAgent->user->name}}</p>
                    <label class="mb-0" for="">: المستلم</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteShipping->cteAgent->organization->name}}</p>
                    <label class="mb-0" for="">: الجهة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteShipping->cteAgent->what->gtin!!}</p>
                    <label class="mb-0" for="">: رقم البند</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteShipping->cteAgent->what->batch!!}</p>
                    <label class="mb-0" for="">: رقم الدفعة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteShipping->cteAgent->what->quantity!!} شوال</p>
                    <label class="mb-0" for="">: الكمية المستلمة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteShipping->cteAgent->amount}} شوال</p>
                    <label class="mb-0" for="">: الكمية المتبقية</label>
                </div>

                <div class="mb-3">
                    <span class="relative inline-block px-3 py-1 font-semibold  leading-tight
                    {{$qrcode->cteShipping->cteAgent->manafactureQrcode->status == Config::get('constants.stock.available') ? 'text-green-900':''}}
                    {{$qrcode->cteShipping->cteAgent->manafactureQrcode->status == Config::get('constants.stock.not_available') ? 'text-red-900':''}}">
                        <span aria-hidden="" class="absolute inset-0 opacity-50 rounded-full
                        {{$qrcode->cteShipping->cteAgent->manafactureQrcode->status == Config::get('constants.stock.available') ? 'bg-green-200':''}}
                        {{$qrcode->cteShipping->cteAgent->manafactureQrcode->status == Config::get('constants.stock.not_available') ? 'bg-red-200':''}}"></span>
                        <span class="relative">{{$qrcode->cteShipping->cteAgent->manafactureQrcode->status}}</span>
                    </span>
                    <label class="mb-0" for="">: الحالة</label>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- right col Manafacture --}}

{{-- left col Shipping --}}
<div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 px-2 py-10">
        <form action="{{route('cteagents.store',$qrcode->cteShipping->cteAgent->id)}}" method="POST">
            @csrf
            <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
                <div class="text-gray-600 mb-2 flex justify-between">
                    <div class="flex flex-row">
                    </div>
                    <div class="font-bold text-2xl text-right">
                        {{$qrcode->cteShipping->why}}
                    </div>
                </div>
                <div class="text-gray-600 font-bold text-right">
                    <div class="mb-3">
                        <p class="inline-flex">{{$qrcode->cteShipping->user->name}}</p>
                        <label class="mb-0" for="">: المنشيء</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{{$qrcode->cteShipping->organization->name}}</p>
                        <label class="mb-0" for="">: الجهة</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{{$qrcode->cteShipping->sscc}}</p>
                        <label class="mb-0" for="">: رقم الشحنة</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteShipping->what->gtin!!}</p>
                        <label class="mb-0" for="">: رقم البند</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteShipping->what->batch!!}</p>
                        <label class="mb-0" for="">: رقم الدفعة</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteShipping->what->quantity!!} شوال</p>
                        <label class="mb-0" for="">: الكمية</label>
                    </div>
                    <div class="mb-3">
                        <span class="relative inline-block px-3 py-1 font-semibold  leading-tight
                        {{$qrcode->status == Config::get('constants.delivery.received') ? 'text-green-900':''}}
                        {{$qrcode->status == Config::get('constants.delivery.pending') ? 'text-orange-900':''}}
                        {{$qrcode->status == Config::get('constants.delivery.rejected') ? 'text-red-900':''}}
                        {{$qrcode->status == Config::get('constants.delivery.transporting') ? 'text-indigo-900':''}}">
                            <span aria-hidden="" class="absolute inset-0 opacity-50 rounded-full
                            {{$qrcode->status == Config::get('constants.delivery.received') ? 'bg-green-200':''}}
                            {{$qrcode->status == Config::get('constants.delivery.pending') ? 'bg-orange-200':''}}
                            {{$qrcode->status == Config::get('constants.delivery.rejected') ? 'bg-red-200':''}}
                            {{$qrcode->status == Config::get('constants.delivery.transporting') ? 'bg-indigo-200':''}}"></span>
                            <span class="relative">{{$qrcode->status}}</span>
                        </span>
                        <label class="mb-0" for="">: الحالة</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 items-center bg-green-300 justify-center">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 leading-none border-green-300 text-center z-10 bg-white font-thin">
                <div>{{$qrcode->cteShipping->when}}</div>
                {{-- <div>September</div> --}}
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="md:w-2/5 md:px-2 py-10 ">

    </div>
</div>
{{-- left col shipping --}}

{{-- @canany(['super-admin', 'agent', 'transporting']) --}}
@if ($qrcode->status == Config::get('constants.delivery.pending'))
{{-- right col accept Transport --}}
<div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 md:px-2 py-10">

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
    </div>
    <!--right column-->
    <div class="md:w-2/5 px-2 py-10 ">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2">
                <div class="font-bold text-2xl text-right">
                    توصيل الشحنة
                </div>
            </div>
            <div class="text-gray-600 font-bold text-right">

                <div class="flex justify-center mt-4">
                    <a href="{{route('shipping.qrcodes.reject.transport', $qrcode->code)}}" class="px-4 py-2 mx-1 bg-red-600 text-white rounded-md hover:bg-red-500 focus:outline-none focus:bg-red-700">
                        رفض
                    </a>
                    <a href="{{route('shipping.qrcodes.accept.transport', $qrcode->code)}}" class="px-4 py-2 mx-1 bg-green-600 text-white rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700 text-decoration-none">
                        قبول
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- right col accept Transport --}}
@endif
{{-- @endcanany --}}


@if ($qrcode->status == Config::get('constants.delivery.transporting') || $qrcode->status == Config::get('constants.delivery.received') || $qrcode->status == Config::get('constants.delivery.rejected'))
@if (!empty($qrcode->cteTransport))

{{-- right col Transport --}}
<div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 md:px-2 py-10">

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 bg-green-300 items-center justify-center">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin">
                <div>{{$qrcode->cteTransport->when}}</div>
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="md:w-2/5 px-2 py-10 ">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2">
                <div class="font-bold text-2xl text-right">
                    {{$qrcode->cteTransport->why}}
                </div>
            </div>
            <div class="text-gray-600 font-bold text-right">
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteTransport->user->name}}</p>
                    <label class="mb-0" for="">: االمستلم</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteTransport->organization->name}}</p>
                    <label class="mb-0" for="">: الجهة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteShipping->sscc}}</p>
                    <label class="mb-0" for="">: رقم الشحنة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteShipping->cteAgent->what->gtin!!}</p>
                    <label class="mb-0" for="">: رقم البند</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteShipping->cteAgent->what->batch!!}</p>
                    <label class="mb-0" for="">: رقم الدفعة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteShipping->what->quantity!!} شوال</p>
                    <label class="mb-0" for="">: الكمية</label>
                </div>
                <div class="mb-3">
                    <span class="relative inline-block px-3 py-1 font-semibold  leading-tight
                    {{$qrcode->status == Config::get('constants.delivery.received') ? 'text-green-900':''}}
                    {{$qrcode->status == Config::get('constants.delivery.pending') ? 'text-orange-900':''}}
                    {{$qrcode->status == Config::get('constants.delivery.rejected') ? 'text-red-900':''}}
                    {{$qrcode->status == Config::get('constants.delivery.transporting') ? 'text-indigo-900':''}}">
                        <span aria-hidden="" class="absolute inset-0 opacity-50 rounded-full
                        {{$qrcode->status == Config::get('constants.delivery.received') ? 'bg-green-200':''}}
                        {{$qrcode->status == Config::get('constants.delivery.pending') ? 'bg-orange-200':''}}
                        {{$qrcode->status == Config::get('constants.delivery.rejected') ? 'bg-red-200':''}}
                        {{$qrcode->status == Config::get('constants.delivery.transporting') ? 'bg-indigo-200':''}}"></span>
                        <span class="relative">{{$qrcode->status}}</span>
                    </span>
                    <label class="mb-0" for="">: الحالة</label>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- right col Transport --}}
@endif
@endif


{{-- @canany(['super-admin', 'transporting']) --}}
@if ($qrcode->status == Config::get('constants.delivery.transporting'))
{{-- left col Accept Transport --}}
<div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 px-2 py-10">
        <form action="{{route('cteagents.store',$qrcode->cteShipping->cteAgent->id)}}" method="POST">
            @csrf
            <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
                <div class="text-gray-600 mb-2 flex justify-between">
                    <div class="flex flex-row">
                    </div>
                    <div class="font-bold text-2xl text-right">
                        إستلام الشحنة
                    </div>
                </div>
                <div class="text-gray-600 font-bold text-right">

                    <div class="flex justify-center mt-4">
                        <a href="{{route('shipping.qrcodes.reject.receive', $qrcode->code)}}" class="px-4 py-2 mx-1 bg-red-600 text-white rounded-md hover:bg-red-500 focus:outline-none focus:bg-red-700">
                            رفض
                        </a>
                        <a href="{{route('shipping.qrcodes.accept.receive', $qrcode->code)}}" class="px-4 py-2 mx-1 bg-green-600 text-white rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700 text-decoration-none">
                            قبول
                        </a>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
    </div>
    <!--right column-->
    <div class="md:w-2/5 md:px-2 py-10 ">

    </div>
</div>
{{-- left col Accept Transport --}}
@endif
{{-- @endcanany --}}


@if ($qrcode->status == Config::get('constants.delivery.received') || $qrcode->status == Config::get('constants.delivery.rejected'))
@if (!empty($qrcode->cteReceiving))

{{-- left col Shipping --}}
<div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 px-2 py-10">
        <form action="{{route('cteagents.store',$qrcode->cteShipping->cteAgent->id)}}" method="POST">
            @csrf
            <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
                <div class="text-gray-600 mb-2 flex justify-between">
                    <div class="flex flex-row">
                    </div>
                    <div class="font-bold text-2xl text-right">
                        {{$qrcode->cteReceiving->why}}
                    </div>
                </div>
                <div class="text-gray-600 font-bold text-right">
                    <div class="mb-3">
                        <p class="inline-flex">{{$qrcode->cteReceiving->user->name}}</p>
                        <label class="mb-0" for="">: المنشيء</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{{$qrcode->cteReceiving->organization->name}}</p>
                        <label class="mb-0" for="">: الجهة</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{{$qrcode->cteShipping->sscc}}</p>
                        <label class="mb-0" for="">: رقم الشحنة</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteShipping->what->gtin!!}</p>
                        <label class="mb-0" for="">: رقم البند</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteShipping->what->batch!!}</p>
                        <label class="mb-0" for="">: رقم الدفعة</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteShipping->what->quantity!!} شوال</p>
                        <label class="mb-0" for="">: الكمية</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteReceiving->what->produced!!} رغيفة</p>
                        <label class="mb-0" for="">: الكمية المنتجة</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteReceiving->what->consumed!!} رغيفة</p>
                        <label class="mb-0" for="">: الكمية المستهلكة</label>
                    </div>
                    <div class="mb-3">
                        <span class="relative inline-block px-3 py-1 font-semibold  leading-tight
                        {{$qrcode->status == Config::get('constants.delivery.received') ? 'text-green-900':''}}
                        {{$qrcode->status == Config::get('constants.delivery.pending') ? 'text-orange-900':''}}
                        {{$qrcode->status == Config::get('constants.delivery.rejected') ? 'text-red-900':''}}
                        {{$qrcode->status == Config::get('constants.delivery.transporting') ? 'text-indigo-900':''}}">
                            <span aria-hidden="" class="absolute inset-0 opacity-50 rounded-full
                            {{$qrcode->status == Config::get('constants.delivery.received') ? 'bg-green-200':''}}
                            {{$qrcode->status == Config::get('constants.delivery.pending') ? 'bg-orange-200':''}}
                            {{$qrcode->status == Config::get('constants.delivery.rejected') ? 'bg-red-200':''}}
                            {{$qrcode->status == Config::get('constants.delivery.transporting') ? 'bg-indigo-200':''}}"></span>
                            <span class="relative">{{$qrcode->status}}</span>
                        </span>
                        <label class="mb-0" for="">: الحالة</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 items-center bg-green-300 justify-center">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 leading-none border-green-300 text-center z-10 bg-white font-thin">
                <div>{{$qrcode->cteReceiving->when}}</div>
                {{-- <div>September</div> --}}
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="md:w-2/5 md:px-2 py-10 ">

    </div>
</div>
{{-- left col shipping --}}
@endif
@endif











</div>
    </div>
</div>
@endsection





