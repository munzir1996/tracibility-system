@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">

    <div class="min-h-screen flex justify-center">
        <div class="w-2/3 mx-auto">
            {{-- Left Harvest --}}
            <div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 px-2 py-10">
        <form action="{{route('harvest.qrcodes.accept', $qrcode->id)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
                <div class="text-gray-600 mb-2 flex justify-between">
                    <div class="flex flex-row">

                    </div>
                    <div class="font-bold text-2xl">
                        {{$qrcode->cteHarvest->why}}
                    </div>
                </div>
                <div class="text-gray-600 font-bold text-right">
                    <div class="mb-3">
                        <p class="inline-flex">{{$qrcode->cteHarvest->user->name}}</p>
                        <label class="mb-0" for="">: المنشيء</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{{$qrcode->cteHarvest->organization->name}}</p>
                        <label class="mb-0" for="">: الجهة</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteHarvest->what->gtin!!}</p>
                        <label class="mb-0" for="">: رقم البند</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteHarvest->what->batch!!}</p>
                        <label class="mb-0" for="">: رقم الدفعة</label>
                    </div>
                    <div class="mb-3">
                        <p class="inline-flex">{!!$qrcode->cteHarvest->what->quantity!!} شوال</p>
                        <label class="mb-0" for="">: الكمية</label>
                    </div>
                    <div class="mb-3">
                        <span class="relative inline-block px-3 py-1 font-semibold  leading-tight
                        {{$qrcode->status == Config::get('constants.delivery.received') ? 'text-green-900':''}}
                        {{$qrcode->status == Config::get('constants.delivery.pending') ? 'text-orange-900':''}}
                        {{$qrcode->status == Config::get('constants.delivery.rejected') ? 'text-red-900':''}}">
                            <span aria-hidden="" class="absolute inset-0 opacity-50 rounded-full
                            {{$qrcode->status == Config::get('constants.delivery.received') ? 'bg-green-200':''}}
                            {{$qrcode->status == Config::get('constants.delivery.pending') ? 'bg-orange-200':''}}
                            {{$qrcode->status == Config::get('constants.delivery.rejected') ? 'bg-red-200':''}}"></span>
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
        <div class="relative flex h-full w-1 items-center justify-center bg-green-300">
            <div class="absolute flex flex-col justify-center h-24 w-24 border-green-300 rounded-full border-2 leading-none text-center z-10 bg-white font-thin">
                <div>{{$qrcode->cteHarvest->when}}</div>
                {{-- <div>September</div> --}}
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="md:w-2/5 md:px-2 py-10 ">

    </div>
</div>
{{-- Left Harvest --}}

{{-- Right Agent --}}
@if (!empty($qrcode->cteHarvest->cteAgent))
<div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 md:px-2 py-10">

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 bg-green-300 items-center justify-center">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin">
                <div>{{$qrcode->cteHarvest->cteAgent->when}}</div>
                {{-- <div>сентября</div> --}}
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="md:w-2/5 px-2 py-10 ">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2 flex justify-end">
                <div class="font-bold text-2xl">
                    {{$qrcode->cteHarvest->cteAgent->why}}
                </div>
            </div>
            <div class="text-gray-600 font-bold text-right">
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteHarvest->cteAgent->user->name}}</p>
                    <label class="mb-0" for="">: المستلم</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteHarvest->cteAgent->organization->name}}</p>
                    <label class="mb-0" for="">: الجهة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteHarvest->cteAgent->what->gtin!!}</p>
                    <label class="mb-0" for="">: رقم البند</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteHarvest->cteAgent->what->batch!!}</p>
                    <label class="mb-0" for="">: رقم الدفعة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$qrcode->cteHarvest->cteAgent->what->quantity!!} شوال</p>
                    <label class="mb-0" for="">: الكمية المستلمة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{{$qrcode->cteHarvest->cteAgent->amount}} شوال</p>
                    <label class="mb-0" for="">: الكمية المتبقية</label>
                </div>
                <div class="mb-3">
                    <span class="relative inline-block px-3 py-1 font-semibold  leading-tight rounded-full
                    {{$qrcode->cteHarvest->cteAgent->manafactureQrcode->status == Config::get('constants.stock.available') ? 'text-green-900':''}}
                    {{$qrcode->cteHarvest->cteAgent->manafactureQrcode->status == Config::get('constants.delivery.rejected') ? 'text-red-900':''}}
                    {{$qrcode->cteHarvest->cteAgent->manafactureQrcode->status == Config::get('constants.stock.not_available') ? 'text-red-900':''}}">
                        <span aria-hidden="" class="absolute inset-0 opacity-50 rounded-full
                        {{$qrcode->cteHarvest->cteAgent->manafactureQrcode->status == Config::get('constants.stock.available') ? 'bg-green-200':''}}
                        {{$qrcode->cteHarvest->cteAgent->manafactureQrcode->status == Config::get('constants.delivery.rejected') ? 'bg-red-200':''}}
                        {{$qrcode->cteHarvest->cteAgent->manafactureQrcode->status == Config::get('constants.stock.not_available') ? 'bg-red-200':''}}"
                        ></span>
                        <span class="relative">{{$qrcode->cteHarvest->cteAgent->manafactureQrcode->status}}</span>
                    </span>
                    <label class="mb-0" for="">: الحالة</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
{{-- Right Agent --}}


{{-- @canany(['super-admin', 'tread-mill']) --}}
{{-- Right Accept Harvest --}}
@if ($qrcode->status == Config::get('constants.delivery.pending'))
<div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 md:px-2 py-10">

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
    </div>
    <!--right column-->
    <div class="md:w-2/5 px-2 py-10 ">
        <form action="{{route('harvest.qrcodes.accept', $qrcode->id)}}" method="POST">
        @csrf
        {{method_field('PUT')}}
            <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
                <div class="text-gray-600 mb-2 flex justify-end">
                    <div class="font-bold text-2xl">
                        إستلام {{Config::get('constants.status.agent')}}
                    </div>
                </div>
                <div class="text-gray-600">
                    <div class="flex justify-center mt-4">
                        <a href="{{route('harvest.qrcodes.reject', $qrcode->id)}}" class="px-4 py-2 mx-1 bg-red-600 text-white rounded-md text-decoration-none hover:bg-red-500 focus:outline-none focus:bg-red-700">رفض</a>
                        <button type="submit" class="px-4 py-2 mx-1 bg-green-600 text-white rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700">قبول</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
{{-- @endcanany --}}

{{-- Right Accept Harvest --}}

        </div>


    </div>

        </div>
@endsection





