@extends('layouts.master')

@section('body')
    <div class="flex justify-between">
    <h3 class="text-right text-3xl text-indigo-500 font-bold">الوكيل /<span class="text-gray-700"> الوارد</span></h2>

        {{-- <a href="{{route('cteagents.create')}}" class="px-6 py-3 bg-green-600 rounded-md text-white font-medium tracking-wide text-decoration-none hover:bg-green-500 ml-3">
            أضافة حصاد
        </a> --}}
    </div>

    <div class="mt-4">

    <div class="mt-8">

    </div>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">رمز الأستجابة</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">المستلم</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">رقم البند</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">رقم الدفعة</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">الكمية المستلمة</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">الكمية المتبقية</th>
                            {{-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">الجهة</th> --}}
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">زمن الأنشاء</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">الحالة</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($cteagents as $cteagent)
                        <tr class="hover:bg-gray-200 text-right">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{$cteagent->id}}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{-- <div class="text-sm leading-5 text-gray-900">{{$cteagent->qrcode}}</div> --}}
                                <a href="{{route('manafacture.qrcodes.show', $cteagent->manafactureQrcode->code)}}">{{$cteagent->qrcode}}</a>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{$cteagent->user->name}}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {!!$cteagent->what->gtin!!}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {!!$cteagent->what->batch!!}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {!!$cteagent->what->quantity!!} شوال
                                    {{-- {!!$cteagent->what->quantity!!} شوال --}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$cteagent->amount}} شوال
                                    {{-- {!!$cteagent->what->quantity!!} شوال --}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$cteagent->when}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <span class="relative inline-block px-3 py-1 font-semibold  leading-tight
                                {{$cteagent->manafactureQrcode->status == Config::get('constants.stock.available') ? 'text-green-900':''}}
                                {{$cteagent->manafactureQrcode->status == Config::get('constants.stock.not_available') ? 'text-red-900':''}}">
                                    <span aria-hidden="" class="absolute inset-0 opacity-50 rounded-full
                                    {{$cteagent->manafactureQrcode->status == Config::get('constants.stock.available') ? 'bg-green-200':''}}
                                    {{$cteagent->manafactureQrcode->status == Config::get('constants.stock.not_available') ? 'bg-red-200':''}}"></span>
                                    <span class="relative">{{$cteagent->manafactureQrcode->status}}</span>
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <form action="{{route('cteagents.destroy', $cteagent->id)}}" method="post">
                                    @csrf {{ method_field('DELETE') }}

                                    {{-- <a class="text-indigo-600 hover:text-indigo-900">تعديل</a> --}}
                                    {{-- <a href="{{route('cteagents.edit', $cteagent->id)}}" class="px-2 py-2 bg-indigo-600 rounded-md text-white font-medium tracking-wide text-decoration-none hover:bg-indigo-500 ml-1">
                                        تعديل
                                    </a> --}}
                                    <button type="submit" class="px-2 py-1 bg-red-600 rounded-md text-white font-medium tracking-wide hover:bg-red-500 ml-1">
                                        حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection





