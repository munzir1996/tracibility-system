@extends('layouts.master')

@section('body')
    <div class="flex justify-between">
    <h3 class="text-gray-700 text-3xl font-medium">المستهلكين</h3>
        <a href="{{route('consumers.create')}}" class="px-6 py-3 bg-green-600 rounded-md text-white font-medium tracking-wide text-decoration-none hover:bg-green-500 ml-3">
            أضافة مستهلك
        </a>
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
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">رقم التعريف</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">الأسم</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">رقم الوطنية</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($consumers as $consumer)
                        <tr class="hover:bg-gray-200 text-right">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{$consumer->id}}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <a href="{{route('selling.qrcodes.show', $consumer->code)}}">
                                    {{$consumer->qrcode}}
                                </a>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$consumer->name}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{$consumer->national_id}}
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <form action="{{route('consumers.destroy', $consumer->id)}}" method="post">
                                    @csrf {{ method_field('DELETE') }}

                                    {{-- <a class="text-indigo-600 hover:text-indigo-900">تعديل</a> --}}
                                    <a href="{{route('consumers.edit', $consumer->id)}}" class="px-2 py-2 bg-indigo-600 rounded-md text-white font-medium tracking-wide text-decoration-none hover:bg-indigo-500 ml-1">
                                        تعديل
                                    </a>
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





