@extends('layouts.master')

@section('body')

    <h3 class="text-right text-3xl text-indigo-500 font-bold">السائقين /<span class="text-gray-700"> أنشاء</span></h2>

    <div class="mt-4">

    <div class="mt-8">

    </div>

    <div class="flex flex-col mt-8">

        <div class="mt-4">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-right text-lg text-gray-700 font-semibold capitalize">بيانات السائق</h2>

                <form action="{{route('transports.store')}}" method="POST">
                    @csrf

                    <transports-create></transports-create>

                    <div class="flex justify-start mt-4">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700">حفظ</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection





