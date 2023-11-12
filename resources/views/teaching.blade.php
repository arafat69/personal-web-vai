@extends('layouts.frontend.app')
@section('content')
    <div class="card rounded-0 border-0">
        <div class="card-body">
            <h1 class="title">{{ $teaching?->title }}</h1>
            <div class="description">
                {!! $teaching?->description !!}
            </div>
        </div>
    </div>
@endsection
