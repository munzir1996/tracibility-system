@extends('layouts.master')

@section('body')

    <h3 class="text-right text-3xl text-indigo-500 font-bold">الوارد /<span class="text-gray-700"> أنشاء</span></h2>

    <div class="mt-4">

    <div class="mt-8">

    </div>

    <div class="flex flex-col mt-8">

        <div class="mt-4">

            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-right text-lg text-gray-700 font-semibold capitalize">بيانات الوارد</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-right text-gray-700">الجهة:</label>
                        <p class="text-right">{{$import->cteHarvest->organization->name}}</p>
                    </div>

                    <div>
                        <label class="block text-right text-gray-700">الكمية:</label>
                        <p class="text-right">{{$import->amount}} طن</p>
                    </div>

                </div>
            </div>

            <div class="mt-4">

            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-right text-lg text-gray-700 font-semibold capitalize">بيانات الأنتاج</h2>

                <form action="{{route('imports.update', $import->id)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="block text-right text-gray-700">
                                الكمية المستهلكة
                                <span class="text-red-600">(طن)*</span>
                            </label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600"
                            type="text" name="used" required>
                            @error('used')
                            <span class="block text-red-600 text-right">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-right text-gray-700">
                                الكمية المنتجة
                                <span class="text-red-600">(شوال)*</span>
                            </label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600"
                            type="text" name="quantity" required>
                            @error('quantity')
                            <span class="block text-red-600 text-right">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="flex justify-start mt-4">
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700">حفظ</button>
                        </div>
                        <input type="hidden" name="import_amount" value="{{$import->amount}}">
                        <input type="hidden" name="cte_harvest_id" value="{{$import->cte_harvest_id}}">
                </form>
            </div>
        </div>

    </div>
@endsection





