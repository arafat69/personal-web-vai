@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header  d-flex justify-content-between align-items-center gap-2">
            <h5 class="m-0">Profile Thumbnail</h5>
            <a href="{{ route('section.profile', $thumbnail?->id) }}" class="btn btn-outline-primary">Update</a>
        </div>
        <div class="card-body">
            <img src="{{ $thumbnail?->thumbnail }}" alt="" width="100" height="100">
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-2">
            <h5 class="m-0">Left Section</h5>
            <a href="{{ route('section.create') }}" class="btn btn-primary">Add New Item</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead class="table-light ">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td>{{ $section->title }}</td>
                                <td>{!! $section->description !!}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('section.edit', $section->id) }}" class="btn btn-info btn-sm">
                                        <i class="ti ti-edit font-20"></i>
                                    </a>
                                    <a href="{{ route('section.destroy', $section->id) }}" class="btn btn-danger btn-sm delete-confirm">
                                        <i class="ti ti-trash font-20"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
