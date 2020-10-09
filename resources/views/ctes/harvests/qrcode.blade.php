@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">

    <div class="min-h-screen flex justify-center">
        <div class="w-2/3 mx-auto">
            <div class="flex flex-row w-full">
    <!-- left col -->

    <div class="w-2/5 px-2 py-10">
        <form action="">
            <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
                <div class="text-gray-600 mb-2 flex justify-between">
                    <div class="flex flex-row">
                        <button class="text-blue-500 mr-2 hover:text-blue-300 transition duration-200">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.2426 16.3137L6 12.071L7.41421 10.6568L10.2426 13.4853L15.8995 7.8284L17.3137 9.24262L10.2426 16.3137Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M1 5C1 2.79086 2.79086 1 5 1H19C21.2091 1 23 2.79086 23 5V19C23 21.2091 21.2091 23 19 23H5C2.79086 23 1 21.2091 1 19V5ZM5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3Z" fill="currentColor" /></svg>
                        </button>

                        <button class="text-red-500 hover:text-red-300 transition duration-200">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.3956 7.75734C16.7862 8.14786 16.7862 8.78103 16.3956 9.17155L13.4142 12.153L16.0896 14.8284C16.4802 15.2189 16.4802 15.8521 16.0896 16.2426C15.6991 16.6331 15.0659 16.6331 14.6754 16.2426L12 13.5672L9.32458 16.2426C8.93405 16.6331 8.30089 16.6331 7.91036 16.2426C7.51984 15.8521 7.51984 15.2189 7.91036 14.8284L10.5858 12.153L7.60436 9.17155C7.21383 8.78103 7.21383 8.14786 7.60436 7.75734C7.99488 7.36681 8.62805 7.36681 9.01857 7.75734L12 10.7388L14.9814 7.75734C15.372 7.36681 16.0051 7.36681 16.3956 7.75734Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M4 1C2.34315 1 1 2.34315 1 4V20C1 21.6569 2.34315 23 4 23H20C21.6569 23 23 21.6569 23 20V4C23 2.34315 21.6569 1 20 1H4ZM20 3H4C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4C21 3.44772 20.5523 3 20 3Z" fill="currentColor" /></svg>
                        </button>
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
                        <p class="inline-flex">{!!$qrcode->cteHarvest->what->quantity!!} طن</p>
                        <label class="mb-0" for="">: الكمية</label>
                    </div>
                    <div class="mb-3">
                        <p class="px-2 inline-flex leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{$qrcode->status}}
                        </p>
                        <label class="mb-0" for="">: الحالة</label>
                    </div>
                    <div>
                        <label class="block text-right text-gray-700" for="username">
                            الكمية المنتجة
                            <span class="text-red-600">(شوال)</span>
                        </label>
                        <input type="text" name="quantity" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" required>
                        <input type="hidden" name="cte_harvest_id" value="{{$qrcode->cteHarvest->id}}">
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button type="submit" class="px-4 py-2 mx-1 bg-red-600 text-white rounded-md hover:bg-red-500 focus:outline-none focus:bg-red-700">رفض</button>
                    <button type="submit" class="px-4 py-2 mx-1 bg-green-600 text-white rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700">قبول</button>
                </div>
            </div>
        </form>
    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 bg-green-300 items-center justify-center">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin">
                <div>{{$qrcode->cteHarvest->when}}</div>
                {{-- <div>September</div> --}}
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="w-2/5 px-2 py-10 ">

    </div>
</div>
            <div class="flex flex-row w-full">
    <!-- left col -->

    <div class="w-2/5 px-2 py-10">

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 bg-green-300 items-center justify-center">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin">
                <div>20</div>
                <div>сентября</div>
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="w-2/5 px-2 py-10 ">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2 flex justify-between">
                <div class="font-bold">
                    Svetlana Torn
                </div>
            </div>
            <div class="text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis enim esse fuga modi quisquam veritatis?
                Привет Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad corporis culpa deserunt, dignissimos dolor esse fugit ipsam minus odit officiis placeat qui, quidem quis soluta vero? Adipisci alias eius et iure nam nihil reiciendis saepe, voluptatem. Alias cumque dicta dignissimos ea et laborum, minima similique.
            </div>
        </div>
    </div>
</div>
            <div class="flex flex-row w-full">
    <!-- left col -->

    <div class="w-2/5 px-2 py-10">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2 flex justify-between">
                <div class="font-bold">
                    Svjatoslav Torn
                </div>
                <div class="flex flex-row">
                    <button class="text-blue-500 mr-2 hover:text-blue-300 transition duration-200"><i class="far fa-edit"></i></button>
                    <button class="text-red-500 hover:text-red-300 transition duration-200"><i class="far fa-trash-alt"></i></button>
                </div>
            </div>
            <div class="text-gray-600">
                Привет Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad corporis culpa deserunt, dignissimos dolor esse fugit ipsam minus odit officiis placeat qui, quidem quis soluta vero? Adipisci alias eius et iure nam nihil reiciendis saepe, voluptatem. Alias cumque dicta dignissimos ea et laborum, minima similique.
            </div>
        </div>

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 bg-green-300 items-center justify-center">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 border-green-300 leading-none text-center z-10 bg-white font-thin">
                <div>20</div>
                <div>сентября</div>
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="w-2/5 px-2 py-10 ">

    </div>
</div>
        </div>


    </div>

        </div>
@endsection





