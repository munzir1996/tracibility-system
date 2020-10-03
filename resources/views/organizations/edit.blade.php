@extends('layouts.master')

@section('body')

    <h3 class="text-right text-3xl text-indigo-500 font-bold">الجهات /<span class="text-gray-700"> تعديل</span></h2>

    <div class="mt-4">

    <div class="mt-8">

    </div>

    <div class="flex flex-col mt-8">

        <div class="mt-4">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-right text-lg text-gray-700 font-semibold capitalize">بيانات الجهة</h2>

                <form action="{{route('organizations.update', $organization->id)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="block text-right text-gray-700" for="username">الأسم</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600"
                            type="text" name="name" value="{{$organization->name}}" required>
                            @error('name')
                            <span class="block text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-right text-gray-700" for="emailAddress">النوع</label>
                            <select class="form-select w-full mt-2 rounded-md focus:border-indigo-600"
                            name="type" required>
                                <option value="{{Config::get('constants.type.harvest')}}"
                                {{Config::get('constants.type.harvest') == $organization->type ? 'selected' : ''}}>
                                    {{Config::get('constants.type.harvest')}}
                                </option>
                                <option value="{{Config::get('constants.type.agent')}}"
                                {{Config::get('constants.type.agent') == $organization->type ? 'selected' : ''}}>
                                    {{Config::get('constants.type.agent')}}
                                </option>
                                <option value="{{Config::get('constants.type.bakery')}}"
                                {{Config::get('constants.type.bakery') == $organization->type ? 'selected' : ''}}>
                                    {{Config::get('constants.type.bakery')}}
                                </option>
                            </select>
                            @error('type')
                            <span class="block text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-start mt-4">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700">تعديل</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection





