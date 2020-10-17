<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">

        <div>
            <label class="block text-right text-gray-700" for="username">الأسم</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" name="name" required>
            <!-- @error('name')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

        <div>
            <label class="block text-right text-gray-700" for="national_id">الرقم الوطني</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="national_id"
                required>
            <!-- @error('national_id')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

        <div>
            <label class="block text-right text-gray-700" for="phone">رقم الهاتف</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" name="phone"
                required>
            <!-- @error('phone')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

        <div>
            <label class="block text-right text-gray-700" for="phone">كلمة المرور</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="password" name="password"
                required>
            <!-- @error('password')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

        <div>
            <label class="block text-right text-gray-700" for="phone">تأكيد كلمة المرور</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="password" name="password_confirmation"
                required>
            <!-- @error('password_confirmation')
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
            // popstate: Boolean,
        },
        data() {
            return {

            }
        },
        created() {},
        methods:{

        },
    }

</script>
