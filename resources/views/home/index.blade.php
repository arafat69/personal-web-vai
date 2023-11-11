@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-2">
            <h4>Home Info</h4>
            <a href="{{ route('home.edit') }}" class="btn btn-primary">Edit</a>
        </div>
        <div class="card-body">
            <h3>{{ $home?->title }}</h3>
            <p>{!! $home?->description !!}</p>
        </div>
    </div>
@endsection
