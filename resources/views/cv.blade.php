@extends('layouts.frontend.app')
@section('content')
    <div class="card rounded-0 border-0">
        <div class="card-body">
            <h1 class="title">{{ $curriculum?->title }}</h1>
            <div class="description">
               {!! $curriculum?->description !!}
            </div>
        </div>
    </div>
@endsection
