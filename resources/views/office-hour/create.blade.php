@extends('layouts.backend.app')
@section('content')
    <form action="{{ route('officeHour.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center gap-2">
                <h5 class="m-0">Add New Office Hour</h5>
            </div>
            <div class="card-body">
                <div class="">
                    <label for="">Description</label>
                    <textarea name="description" id="editor" class="form-control" rows="8" placeholder="Enter Description"></textarea>
                    @error('description')
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
