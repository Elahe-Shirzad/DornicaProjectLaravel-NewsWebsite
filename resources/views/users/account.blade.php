@extends('users.layouts.account')

@section('account-content')

    <div
        class="max-w-4xl w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
        <a href="{{route('index')}}"><img
                src={{asset("assets/images/logo-icon-64.png")}} class="mx-auto" alt=""></a>
        <h5 class="my-6 text-xl font-semibold">حساب کاربری</h5>
        @error('errorMessage')
        <div>
            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                {{ $message }}
            </p>
        </div>
        @enderror
        <form
            action="{{route('users.account.update')}}"
            method="POST"
            class="text-start"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 justify-between gap-4">
                <div class="space-y-4">

                    <div>
                        <label class="font-semibold" for="first_name">نام :</label>
                        <input
                            id="first_name"
                            name="first_name"
                            type="text"
                            value="{{old('first_name',$user->first_name)}}"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0" placeholder="نام خود را وارد کنید"
                        >
                        @error('first_name')
                        <div>
                            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="font-semibold" for="gender">جنسیت :</label>
                        <input
                            id="gender"
                            name="gender"
                            type="text"
                            value="{{ $user->gender === \App\Enums\GenderStatus::MALE->value ? 'مرد' : 'زن' }}"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-gray-100 dark:bg-slate-800 dark:text-slate-400 rounded border border-gray-200 dark:border-gray-700"
                            readonly
                        >
                    </div>

                    <div>
                        <label class="font-semibold" for="username">نام کاربری :</label>
                        <input
                            id="username"
                            name="username"
                            type="text"
                            value="{{old('username',$user->username)}}"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0" placeholder="نام کاربری خود را وارد کنید"
                        >
                        @error('username')
                        <div>
                            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="space-y-4">

                    <div>
                        <label class="font-semibold" for="last_name">نام خانوادگی :</label>
                        <input
                            id="last_name"
                            name="last_name"
                            type="text"
                            value="{{old('last_name',$user->last_name)}}"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0"
                            placeholder="نام خانوادگی خود را وارد کنید"
                        >
                        @error('last_name')
                        <div>
                            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="font-semibold" for="mobile">شماره موبایل :</label>
                        <input
                            id="mobile"
                            name="mobile"
                            type="text"
                            value="{{old('mobile',$user->mobile)}}"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0"
                            placeholder="شماره موبایل خود را وارد کنید"
                        >
                        @error('mobile')
                        <div>
                            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="font-semibold" for="email">ایمیل :</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{old('email',$user->email)}}"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0" placeholder="ایمیل خود را وارد کنید"
                        >
                        @error('email')
                        <div>
                            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="space-y-4">

                    <div>
                        <label class="font-semibold" for="national_code">کد ملی :</label>
                        <input
                            id="national_code"
                            name="national_code"
                            type="text"
                            value="{{old('national_code',$user->national_code)}}"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0" placeholder="کد ملی خود را وارد کنید"
                        >
                        @error('national_code')
                        <div>
                            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="font-semibold" for="province">استان :</label>
                        <select id="province" name="province_id"
                                class="appearance-none mt-3 w-full py-2 px-3 h-10 bg-transparent
                   dark:bg-slate-900 dark:text-slate-200 rounded outline-none
                   border border-gray-200 focus:border-indigo-600
                   dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 pr-8">
                            <option value="">انتخاب کنید</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('province_id', $user->province_id) == $province->id ? 'selected' : '' }}>
                                    {{ $province->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold" for="password">رمز عبور :</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                    dark:focus:border-indigo-600 focus:ring-0"
                            placeholder="درصورت تغییر، رمز عبور را وارد کنید"
                        >
                        @error('password')
                        <div>
                            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="space-y-4">

                    <div>
                        <label class="font-semibold" for="military_service_status">
                            وضعیت نظام وظیفه :
                            <span class="text-gray-500 font-thin font-medium">
                            آخرین وضعیت:

                        @switch($user->military_service_status)
                                    @case(\App\Enums\MilitaryServiceStatus::ACTIVE)
                                        درحال خدمت
                                        @break
                                    @case(\App\Enums\MilitaryServiceStatus::EXEMPT)
                                        معاف
                                        @break
                                    @case(\App\Enums\MilitaryServiceStatus::COMPLETION)
                                        پایان خدمت
                                        @break
                                @endswitch
                        </span>
                        </label>
                        <select
                            id="military_service_status"
                            name="military_service_status"
                            class="appearance-none mt-3 w-full py-2 px-3 h-10 bg-transparent
                            dark:bg-slate-900 dark:text-slate-200 rounded outline-none
                            border border-gray-200 focus:border-indigo-600
                            dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 pr-8"
                        >
                            <option>یک وضعیت را انتخاب کنید</option>
                            <option
                                value="{{\App\Enums\MilitaryServiceStatus::ACTIVE->value}}"
                            >
                                درحال خدمت
                            </option>
                            <option
                                value="{{\App\Enums\MilitaryServiceStatus::EXEMPT->value}}"
                            >
                                معاف
                            </option>
                            <option
                                value="{{\App\Enums\MilitaryServiceStatus::COMPLETION->value}}"
                            >
                                پایان خدمت
                            </option>
                        </select>
                        @error('military_service_status')
                        <div>
                            <p style="color: rgb(244 63 94 / var(--tw-text-opacity, 1));">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror

                    </div>

                    <div>
                        <label class="font-semibold" for="city">شهر :</label>
                        <select id="city" name="city_id"
                                class="appearance-none mt-3 w-full py-2 px-3 h-10 bg-transparent
                   dark:bg-slate-900 dark:text-slate-200 rounded outline-none
                   border border-gray-200 focus:border-indigo-600
                   dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 pr-8">
                            <option value="">ابتدا استان را انتخاب کنید</option>
                            @if($user->province_id)
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ old('city_id', $user->city_id) == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold" for="password">تکرار رمز عبور :</label>
                        <input
                            id="password"
                            name="password_confirmation"
                            type="password"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800
                             dark:focus:border-indigo-600 focus:ring-0"
                        >
                    </div>

                </div>

            </div>
            <div class="col-span-1 md:col-span-2 mt-6 flex justify-end">
                <button type="submit"
                        class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">
                    ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>

@endsection

@push('script')


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const provinceSelect = document.getElementById('province');
            const citySelect = document.getElementById('city');

            const selectedProvinceId = provinceSelect.value;
            if (selectedProvinceId) {
                loadCities(selectedProvinceId);
            }

            provinceSelect.addEventListener('change', function () {
                const provinceId = this.value;
                loadCities(provinceId);
            });

            function loadCities(provinceId) {
                citySelect.innerHTML = '<option value="">در حال بارگذاری...</option>';
                citySelect.disabled = true;

                if (provinceId) {
                    fetch(`/api/cities/${provinceId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('خطا در دریافت اطلاعات');
                            }
                            return response.json();
                        })
                        .then(data => {
                            citySelect.innerHTML = '<option value="">انتخاب کنید</option>';
                            data.forEach(city => {
                                citySelect.innerHTML += `<option value="${city.id}">${city.name}</option>`;
                            });
                            citySelect.disabled = false;


                            const previousCityId = "{{ old('city_id', $user->city_id) }}";
                            if (previousCityId) {
                                citySelect.value = previousCityId;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            citySelect.innerHTML = '<option value="">خطا در دریافت اطلاعات</option>';
                            citySelect.disabled = false;
                        });
                } else {
                    citySelect.innerHTML = '<option value="">ابتدا استان را انتخاب کنید</option>';
                    citySelect.disabled = false;
                }
            }
        });
    </script>

@endpush

