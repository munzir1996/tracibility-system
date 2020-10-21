@extends('layouts.master')

@section('body')

    <h3 class="text-right text-3xl text-indigo-500 font-bold">الحصاد /<span class="text-gray-700"> أنشاء</span></h2>

    <div class="mt-4">

    <div class="mt-8">

    </div>

    <div class="flex flex-col mt-8">

        <div class="mt-4">

            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-right text-lg text-gray-700 font-semibold capitalize">بيانات المستخدم</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-right text-gray-700" for="username">أسم المستخدم:</label>
                        <p class="text-right">{{Auth::user()->name}}</p>
                    </div>

                    <div>
                        <label class="block text-right text-gray-700" for="emailAddress">الجهة:</label>
                        <p class="text-right">{{Auth::user()->organization->name}}</p>
                    </div>

                    <div>
                        <label class="block text-right text-gray-700" for="emailAddress">الرقم الوطني:</label>
                        <p class="text-right">{{Auth::user()->national_id}}</p>
                    </div>

                    <div>
                        <label class="block text-right text-gray-700" for="emailAddress">رقم الهاتف:</label>
                        <p class="text-right">{{Auth::user()->phone}}</p>
                    </div>

                </div>
            </div>

            <div class="mt-4">

            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-right text-lg text-gray-700 font-semibold capitalize">بيانات الحصاد</h2>

                <form action="{{route('cteharvests.store')}}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="block text-right text-gray-700" for="username">
                                الكمية
                                <span class="text-red-600">(شوال)*</span>
                            </label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600"
                            type="text" name="quantity" required>
                            @error('quantity')
                            <span class="block text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    <br>
                    <div class="flex justify-start mt-4">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700">حفظ</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection





