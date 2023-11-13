@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-xl-6 col-md-7 m-auto">
            <form action="{{ route('section.profile.update', $section?->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-2">
                        <h5 class="m-0">Update Profile Thumbnail </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="pe-2 text-black">Thumbnail</label>
                            <img src="{{ $section->thumbnail }}" alt="" width="120" />
                        </div>
                        <label class="text-black">Select Photo</label>
                        <input type="file" class="form-control" name="photo">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center gap-2">
                        <a href="{{ route('section.index') }}" class="btn btn-danger">Back</a>
                        <button class="btn btn-primary">Save And Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
