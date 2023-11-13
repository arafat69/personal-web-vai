@php
    use App\Models\Section;

    $thumbnail = Section::first();
    $sections = Section::skip(1)->take(14)->get();
@endphp
<div class="card rounded-0 border-0">
    <div class="card-body">
        <img src="{{ $thumbnail?->thumbnail }}" alt="profile image" width="100%">
    </div>
</div>

@foreach ($sections as $section)
    <div class="card rounded-0 border-0 mt-3">
        <div class="card-body">
            @if ($section->title)
                <h3 class="sub-title">{{ $section->title }}</h3>
            @endif
            {!! $section->description !!}
        </div>
    </div>
@endforeach
