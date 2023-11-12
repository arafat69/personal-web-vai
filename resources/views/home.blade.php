@extends('layouts.frontend.app')
@section('content')
    <div class="card rounded-0 border-0">
        <div class="card-body">
            <h1 class="title">{{ $home?->title }}</h1>
            <div class="description">
                {!! $home?->description !!}
            </div>
        </div>
    </div>
@endsection
