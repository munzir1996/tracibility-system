@extends('layouts.master')

@section('body')
    <div class="flex justify-between">
    <h3 class="text-gray-700 text-3xl font-medium">الجهات</h3>
        <a href="{{route('organizations.create')}}" class="px-6 py-3 bg-green-600 rounded-md text-white font-medium tracking-wide text-decoration-none hover:bg-green-500 ml-3">
            أضافة جهة
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
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">رمز الأستجابة</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">رقم الموقع</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">الأسم</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">النوع</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($organizations as $organization)
                        <tr class="hover:bg-gray-200 text-right">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{$organization->id}}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if ($organization->type == Config::get('constants.type.bakery') || $organization->type == Config::get('constants.type.admin'))
                                    <a href="{{route('organization.qrcode', $organization->id)}}">
                                        {{$organization->qrcode}}
                                    </a>
                                    <div class="text-sm leading-5 text-gray-900"></div>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{$organization->gln}}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{$organization->name}}
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{$organization->type}}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <form action="{{route('organizations.destroy', $organization->id)}}" method="post">
                                    @csrf {{ method_field('DELETE') }}

                                    {{-- <a class="text-indigo-600 hover:text-indigo-900">تعديل</a> --}}
                                    <a href="{{route('organizations.edit', $organization->id)}}" class="px-2 py-2 bg-indigo-600 rounded-md text-white font-medium tracking-wide text-decoration-none hover:bg-indigo-500 ml-1">
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





