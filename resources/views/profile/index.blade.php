@extends('layouts.backend.app')
@section('content')
    <div class="row h-100 align-items-center">
        <div class="col-lg-8 m-auto">
            <div class="card m-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle" width="150px" src="{{ $user->thumbnail }}" />
                                <span class="font-weight-bold">{{ $user->name }}</span>
                                <span class="text-black-50">{{ $user->email }}</span>
                                <a href="{{ route('change.password') }}" class="btn btn-outline-primary mt-2 btn-sm">Change Password</a>
                            </div>
                        </div>
                        <div class="col-md-7 border-right">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="py-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <div class="mt-2">
                                        <label class="labels">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                            value="{{ $user->name }}" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label class="labels">Email Address</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $user->email }}" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label class="labels">Profile Photo</label>
                                        <input type="file" name="photo" class="form-control" />
                                        @error('photo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary" type="submit">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
