@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-2">
            <h5 class="m-0">Teaching Philosophy Page Info</h5>
            <a href="{{ route('teaching.edit') }}" class="btn btn-primary">Edit</a>
        </div>
        <div class="card-body">
            <h3>{{ $teaching?->title }}</h3>
            <p>{!! $teaching?->description !!}</p>
        </div>
    </div>
@endsection
