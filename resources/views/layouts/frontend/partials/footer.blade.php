@php
    use App\Models\Social;
    use App\Models\Setting;

    $setting = Setting::first();
    $socialLinks = Social::All();
@endphp
<footer class="mt-3">
    <p class="m-0">
        copyright &copy; {{ date('Y') }}
        <a href="{{ route('root') }}">
            <strong>{{ $setting?->name ?? 'Rejaul Haque' }}</strong>
        </a>
    </p>

    <div class="footer-social">
        @foreach ($socialLinks as $social)
            <div class="icon">
                <a href="{{ $social->url }}"><img src="{{ $social->thumbnail }}" alt="{{ $social->name }}"
                        title="{{ $social->name }}"></a>
            </div>
        @endforeach
    </div>
</footer>
