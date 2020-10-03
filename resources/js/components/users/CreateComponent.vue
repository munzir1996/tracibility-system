<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">

        <div>
            <label class="block text-right text-gray-700" for="permission">الصلاحية</label>
            <select @change="getOrganizations(permission)" v-model="permission"
            class="form-select w-full mt-2 rounded-md focus:border-indigo-600" name="permission" required>
                <option></option>
                <option v-for="permission in permissions" :key="permission" :value="permission">{{permission}}</option>
            </select>
            <!-- @error('permisson')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

        <div>
            <label class="block text-right text-gray-700" for="permission">الجهة</label>
            <select class="form-select w-full mt-2 rounded-md focus:border-indigo-600" name="organization_id" required>
                <option></option>
                <option v-for="organization in organizations" :key="organization.id" :value="organization.id">{{organization.name}}</option>
            </select>
            <!-- @error('permisson')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

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
            <!-- @error('phone')
            <span class="block text-red-600">
                {{ $message }}
            </span>
            @enderror -->
        </div>

        <div>
            <label class="block text-right text-gray-700" for="phone">تأكيد كلمة المرور</label>
            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="password" name="password_confirmation"
                required>
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
            permissions: Array,
            // popstate: Boolean,
        },
        data() {
            return {
                organizations: null,
                permission: '',
            }
        },
        created() {},
        methods:{

            getOrganizations(permission) {
                axios.get('/get/organizations/' + permission)
                .then(res => {
                    console.log(res);
                    this.organizations = res.data
                })
                .catch(error => {
                    console.log(error)
                });
            }
        },
    }

</script>
