@extends('layouts.backend.app')
@section('content')
        <div class="row align-items-center h-100">
            <div class="col-md-8 m-auto">
                <form action="{{ route('change.password') }}" method="POST">
                    @csrf
                    <div class="card shadow rounded-12 border-0">
                        <div class="card-header py-3">
                            <h4 class="m-0">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <label class="mb-1 fw-bold">{{ __('Current Password') }}</label>
                                <input type="text" name="current_password" placeholder="Enter Current Password"
                                    class="form-control" value="{{ old('current_password') }}">
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-1 fw-bold">{{ __('New Password') }}</label>
                                <input type="text" name="password" placeholder="Enter New Password" class="form-control" value="{{ old('password') }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="mb-1 fw-bold">{{ __('Confirm Password') }}</label>
                                <input type="text" name="password_confirmation" placeholder="Enter Confirm Password" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between py-3">
                            <a href="{{ route('profile.index') }}" class="btn btn-danger">{{ __('Back') }}</a>
                            <button class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection
