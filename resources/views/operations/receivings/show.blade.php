@extends('layouts.master')

@section('body')
    <div class="flex justify-between">
    <h3 class="text-right text-3xl text-indigo-500 font-bold">العمليات / المخابز / <span class="text-gray-700"> المخبز</span></h2>
        {{-- <a href="{{route('ctesellings.create')}}" class="px-6 py-3 bg-green-600 rounded-md text-white font-medium tracking-wide text-decoration-none hover:bg-green-500 ml-3">
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
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">أسم المستهلك</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">الرقم الوطني</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">الكمية المستهلكة</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">المخبز</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">زمن الأنشاء</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($ctesellings as $cteselling)
                        <tr class="hover:bg-gray-200 text-right">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{$cteselling->id}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$cteselling->consumer->name}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$cteselling->consumer->national_id}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {!!$cteselling->what->quantity!!} رغيفة
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$cteselling->organization->name}}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{$cteselling->when}}
                                </div>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection





