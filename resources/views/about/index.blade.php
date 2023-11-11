@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-2">
            <h5 class="m-0">About Page Info</h5>
            <a href="{{ route('about.edit') }}" class="btn btn-primary">Edit</a>
        </div>
        <div class="card-body">
            <h3>{{ $about?->title }}</h3>
            <p>{!! $about?->description !!}</p>
        </div>
    </div>
@endsection
