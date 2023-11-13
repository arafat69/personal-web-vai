@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-2">
            <h5 class="m-0">Header Section</h5>
            <a href="{{ route('header.edit') }}" class="btn btn-primary">Edit</a>
        </div>
        <div class="card-body">
            <div>
                <label for=""><strong>Header Image</strong></label>
                <img src="{{ $header?->thumbnail }}" alt="" height="118" width="100%">
            </div>
            <div class="mt-3">
                <label for=""><strong>Header Title</strong></label>
                <h3>{{ $header?->title }}</h3>
            </div>
            <div class="mt-3">
                <label for=""><strong>Header Short Description</strong></label>
                <h4>{{ $header?->description }}</h4>
            </div>
        </div>
    </div>
@endsection
