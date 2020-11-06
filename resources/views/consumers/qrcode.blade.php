@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">

    <div class="min-h-screen flex justify-center">
        <div class="w-2/3 mx-auto">
            {{-- Left Harvest --}}
            <div class="flex flex-row w-full">
    <!-- left col -->
    @if (!empty($ctereceiving))
    <div class="md:w-2/5 px-2 py-10">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2 flex justify-between">
                <div class="flex flex-row">
                </div>
                <div class="font-bold text-2xl">
                    {{$ctereceiving->why}}
                </div>
            </div>
            <div class="text-gray-600 font-bold text-right">
                <div class="mb-3">
                    <p class="inline-flex">{{$ctereceiving->user->name}}</p>
                    <label class="mb-0" for="">: المستلم</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{{$ctereceiving->organization->name}}</p>
                    <label class="mb-0" for="">: الجهة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$ctereceiving->what->gtin!!}</p>
                    <label class="mb-0" for="">: رقم البند</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$ctereceiving->what->batch!!}</p>
                    <label class="mb-0" for="">: رقم الدفعة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$ctereceiving->what->quantity!!} شوال</p>
                    <label class="mb-0" for="">: الكمية</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$ctereceiving->what->produced!!} رغيفة</p>
                    <label class="mb-0" for="">: الكمية المنتجة</label>
                </div>
                <div class="mb-3">
                    <p class="inline-flex">{!!$ctereceiving->what->consumed!!} رغيفة</p>
                    <label class="mb-0" for="">: الكمية المستهلكة</label>
                </div>
                <div class="mb-3">
                    <span class="relative inline-block px-3 py-1 font-semibold  leading-tight
                    {!!$ctereceiving->what->status == Config::get('constants.stock.available') ? 'text-green-900':''!!}
                    {!!$ctereceiving->what->status == Config::get('constants.stock.not_available') ? 'text-red-900':''!!}">
                        <span aria-hidden="" class="absolute inset-0 opacity-50 rounded-full
                        {!!$ctereceiving->what->status == Config::get('constants.stock.available') ? 'bg-green-200':''!!}
                        {!!$ctereceiving->what->status == Config::get('constants.stock.not_available') ? 'bg-red-200':''!!}"></span>
                        <span class="relative">{!!$ctereceiving->what->status!!}</span>
                    </span>
                    <label class="mb-0" for="">: الحالة</label>
                </div>

            </div>
        </div>
    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 items-center justify-center bg-green-300">
            <div class="absolute flex flex-col justify-center h-24 w-24 border-green-300 rounded-full border-2 leading-none text-center z-10 bg-white font-thin">
                <div>{{$ctereceiving->when}}</div>
                {{-- <div>September</div> --}}
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="md:w-2/5 md:px-2 py-10 ">

    </div>
</div>
{{-- Left Harvest --}}


{{-- Right Accept Harvest --}}
@if ($ctereceiving->what->status == Config::get('constants.stock.available'))
<div class="flex flex-row w-full">
    <!-- left col -->

    <div class="md:w-2/5 md:px-2 py-10">

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
    </div>
    <!--right column-->
    <div class="md:w-2/5 px-2 py-10 ">
        <form action="{{route('selling.qrcodes.sell', [$ctereceiving->id, $consumer->code])}}" method="POST">
        @csrf
        {{method_field('PUT')}}
            <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
                <div class="text-gray-600 mb-2 flex justify-end">
                    <div class="font-bold text-2xl">
                        الأستهلاك
                    </div>
                </div>
                <div class="text-gray-600">

                    <div>
                        <label class="block text-right text-gray-700" for="consumed">
                            الكمية
                            <span class="text-red-600">(رغيفة)</span>
                        </label>
                        <input type="text" name="consumed" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" required>
                        @error('consumed')
                            <span class="block text-red-600 text-right">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="flex justify-center mt-4">
                        {{-- <a href="{{route('harvest.ctereceivings.reject', $ctereceiving->id)}}" class="px-4 py-2 mx-1 bg-red-600 text-white rounded-md text-decoration-none hover:bg-red-500 focus:outline-none focus:bg-red-700">رفض</a> --}}
                        <button type="submit" class="px-4 py-2 mx-1 bg-green-600 text-white rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700">حفظ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endif

@else

<div class="md:w-2/5 px-2 py-10">
    <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
        <div class="text-gray-600 mb-2 flex justify-between">
            <div class="flex flex-row justify-around">

            </div>
            <div class="font-bold text-2xl">
                لا توجد شحنة
            </div>
        </div>
        <div class="text-gray-600 font-bold text-right">


        </div>
    </div>
</div>

@endif
{{-- Right Accept Harvest --}}

        </div>


    </div>

        </div>
@endsection





