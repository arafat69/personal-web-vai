@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-2">
            <h5 class="m-0">Setting</h5>
            <a href="{{ route('setting.edit') }}" class="btn btn-primary">Edit</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1">Site Title</p>
                    <h6>{{ $setting?->title ?? 'N/A' }}</h6>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <p class="mb-1">Site Name</p>
                    <h6>{{ $setting?->name ?? 'N/A' }}</h6>
                </div>

                <div class="col-md-6 mt-3">
                    <p class="mb-1">Site Favicon</p>
                    <img src="{{ $setting?->faviconPath }}" alt="favicon" width="50">
                </div>
                <div class="col-md-6 mt-3">
                    <p class="mb-1">Site Logo</p>
                    <img src="{{ $setting?->logoPath }}" alt="logo" width="50">
                </div>
            </div>
        </div>
    </div>
@endsection
