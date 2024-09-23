@extends('admin.common')
@section('title', 'Students-add | E-HUB')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Add Customer
                        <a href="{{ route('students_all') }}" class="btn btn-primary float-end">
                            Back
                        </a>
                        {{--success message--}}
                        @include('admin.includes.flash')

                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name and Phone in two columns -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" class="form-control" type="text" name="name"
                                           value="{{ old('name') }}" required autofocus autocomplete="name"/>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input id="phone" class="form-control" type="text" name="phone"
                                           value="{{ old('phone') }}" required autocomplete="phone"/>
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email and Program in two columns -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" class="form-control" type="email" name="email"
                                           value="{{ old('email') }}" required autocomplete="email"/>
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="program" class="form-label">Program</label>
                                    <input id="program" class="form-control" type="text" name="program"
                                           value="{{ old('program') }}" autocomplete="program"/>
                                    @error('program')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Registration Number and Year in two columns -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="reg" class="form-label">Registration Number</label>
                                    <input id="reg" class="form-control" type="text" name="reg" value="{{ old('reg') }}"
                                           autocomplete="reg"/>
                                    @error('reg')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="year" class="form-label">Year</label>
                                    <input id="year" class="form-control" type="text" name="year"
                                           value="{{ old('year') }}" autocomplete="year"/>
                                    @error('year')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input id="description" class="form-control" type="text" name="description"
                                       value="{{ old('description') }}" autocomplete="description"/>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Profile Picture -->
                            <div class="mb-3">
                                <label for="picture" class="form-label">Profile Picture</label>
                                <input id="picture" class="form-control" type="file" name="picture" accept="image/*"/>
                                @error('picture')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password and Confirm Password in two columns -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" class="form-control" type="password" name="password" required
                                           autocomplete="new-password"/>
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input id="password_confirmation" class="form-control" type="password"
                                           name="password_confirmation" required autocomplete="new-password"/>
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Hidden Role -->
                            <input type="hidden" name="role" value="student"/>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
