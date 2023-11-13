@extends('layouts.backend.app')
@section('content')
    <form action="{{ route('social.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center gap-2">
                <h5 class="m-0">Add New Social Link</h5>
            </div>
            <div class="card-body">
                <div class="">
                    <label class="fw-bold">Name</label>
                    <input type="text" name="name" placeholder="Ex: Facebook" class="form-control"/>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="fw-bold">URL</label>
                    <input type="url" name="url" placeholder="Enter link url" class="form-control"/>
                    @error('url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="fw-bold">Social Icon</label>
                    <input type="file" name="icon" class="form-control"/>
                    @error('icon')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
