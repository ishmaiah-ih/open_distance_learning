@include('front.includes.header')

<body class="bg-gray-100">
@include('front.includes.navbar')

<div class="container ">
    <div class="row">
        @include('front.includes.sidebar')

        <div class="col-md-9 main-content">
            <div class="courses">
                <h4 class="text-gray-600 pb-4">Update your Profile</h4>
            </div>

            <div class="container w-full ">
{{--                default profile by breeze--}}

                <div class="py-1">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="card shadow-sm mb-4">
                                    <div class="card-body">
                                        @include('profile.partials.update-profile-information-form')
                                    </div>
                                </div>

                                <div class="card shadow-sm mb-4">
                                    <div class="card-body">
                                        @include('profile.partials.update-password-form')
                                    </div>
                                </div>

                                <div class="card shadow-sm mb-4">
                                    <div class="card-body">
                                        @include('profile.partials.delete-user-form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@include('front.includes.footer')
</body>
</html>

{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Profile') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">--}}
{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-profile-information-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-password-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.delete-user-form')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
