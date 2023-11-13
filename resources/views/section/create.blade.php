@extends('layouts.backend.app')
@section('content')
    <form action="{{ route('section.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center gap-2">
                <h5 class="m-0">Add New Item</h5>
            </div>
            <div class="card-body">
                <label for="">Title</label>
                <input type="text" name="title" placeholder="Enter Title" class="form-control"/>
                <div class="mt-4">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"  placeholder="Description..."></textarea>
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
