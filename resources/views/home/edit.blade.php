@extends('layouts.backend.app')
@section('content')
    <form action="{{ route('home.update', $home?->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center gap-2">
                <h5 class="m-0">Edit Home Info</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{ $home?->title }}" class="form-control"
                        placeholder="Enter Title">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" rows="6">{{ $home?->description }}</textarea>
                    @error('description')
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