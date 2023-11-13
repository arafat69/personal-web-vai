@php
    use App\Models\Header;

    $header = Header::first();
@endphp
<div class="main-header">
    <a href="{{ route('root') }}">
        <img src="{{ $header?->thumbnail ?? asset('assets/images/msu-faculty-header.png') }}" alt="header"
            width="100%">
    </a>
    <div class="header-content">
        <a href="{{ route('root') }}">{{ $header?->title }}</a>
        <p>{{ $header?->description }}</p>
    </div>
</div>
