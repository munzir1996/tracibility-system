<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">

        <div>
            <label class="block text-right text-gray-700" for="username">الأسم</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" v-model="transport.user.name" type="text"
                name="name" required>
            <!-- @error('name')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

        <div>
            <label class="block text-right text-gray-700" for="national_id">الرقم الوطني</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="national_id"
                v-model="transport.user.national_id" required>
            <!-- @error('national_id')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

        <div>
            <label class="block text-right text-gray-700" for="phone">رقم الهاتف</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="phone"
                v-model="transport.user.phone" required>
            <!-- @error('phone')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>
        <br>

        <div>
            <label class="block text-right text-gray-700" for="phone">تغير كلمة المرور</label>
            <div class="flex mt-2">
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio" v-model="change_password" value="yes">
                    <span class="mr-2">نعم</span>
                </label>
                <label class="inline-flex items-center mr-6">
                    <input type="radio" class="form-radio" v-model="change_password" value="no">
                    <span class="mr-2">لا</span>
                </label>
            </div>
        </div>
        <br>

        <div v-if="change_password == 'yes'">
            <label class="block text-right text-gray-700" for="password">كلمة المرور</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="password" name="password" required>
            <!-- @error('phone')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

        <div v-if="change_password == 'yes'">
            <label class="block text-right text-gray-700" for="password_confirmation">تأكيد كلمة المرور</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="password" name="password_confirmation" required>
            <!-- @error('phone')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            transport: Object,
        },
        data() {
            return {
                change_password: 'no',
            }
        },
        created() {},
        methods: {

        },
    }

</script>
