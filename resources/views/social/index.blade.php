@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-2">
            <h5 class="m-0">Social Links</h5>
            <a href="{{ route('social.create') }}" class="btn btn-primary">Add New Link</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead class="table-light ">
                        <tr>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($socials as $social)
                            <tr>
                                <td>{{ $social->name }}</td>
                                <td>
                                    <img src="{{ $social->thumbnail }}" alt="" width="40">
                                </td>
                                <td>{{ Str::limit($social->url, 46, ' ...') }} </td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('social.edit', $social->id) }}" class="btn btn-info btn-sm">
                                        <i class="ti ti-edit font-20"></i>
                                    </a>
                                    <a href="{{ route('social.destroy', $social->id) }}" class="btn btn-danger btn-sm delete-confirm">
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
