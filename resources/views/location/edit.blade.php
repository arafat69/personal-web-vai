@extends('layouts.backend.app')
@section('content')
    <form action="{{ route('location.update', $location->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center gap-2">
                <h5 class="m-0">Edit Location</h5>
            </div>
            <div class="card-body">
                <div class="">
                    <label for="">Location Details</label>
                    <textarea name="name" id="editor" class="form-control" rows="6">{{ $location->name }}</textarea>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Save And Update</button>
            </div>
        </div>
    </form>
@endsection
