@extends('layouts.backend.app')
@section('content')
    <form action="{{ route('setting.update', $setting?->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center gap-2">
                <h5 class="m-0">Edit Setting</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="fw-bold">Site Title</label>
                    <input type="text" name="title" value="{{ $setting?->title }}" class="form-control"
                        placeholder="Enter Title" />
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Site Name</label>
                    <input type="text" name="name" placeholder="Site Name" value="{{ $setting?->name }}"
                        class="form-control" />
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Favicon</label>
                    <input type="file" name="favicon" class="form-control" />
                </div>

                <div class="">
                    <label class="fw-bold">Logo</label>
                    <input type="file" name="logo" class="form-control" />
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Save And Update</button>
            </div>
        </div>
    </form>
@endsection
