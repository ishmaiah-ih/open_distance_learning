@extends('admin.common')

@section('title', 'profile | E-Hub')

@section('content')

    <div class="container ">
        <div class="row">


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

@endsection

