@php
    use App\Models\Education;
    use App\Models\Location;
    use App\Models\OfficeHour;

    $education = Education::first();
    $locations = Location::all();
    $officeHours = OfficeHour::All();
@endphp
<div class="row">
    <!-- Education: -->
    <div class="col-sm-6 col-lg-4 mt-3">
        <div class="card rounded-0 border-0">
            <div class="card-body">
                <h3 class="heading"><Strong>{{ $education?->title }}</Strong></h3>
            </div>
        </div>
        <div class="card rounded-0 border-0 mt-2">
            <div class="card-body">
                {!! $education->description !!}
            </div>
        </div>
    </div>

    <!-- Office Locations: -->
    <div class="col-sm-6 col-lg-4 mt-3">
        <div class="card rounded-0 border-0">
            <div class="card-body">
                <h3 class="heading"><Strong>Office Locations:</Strong></h3>
            </div>
        </div>
        @foreach ($locations as $location)
            <div class="card rounded-0 border-0 mt-2">
                <div class="card-body">
                    {!! $location->name !!}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Office Hours: -->
    <div class="col-sm-6 col-lg-4 mt-3">
        <div class="card rounded-0 border-0">
            <div class="card-body">
                <h3 class="heading"><Strong>Office Hours:</Strong></h3>
            </div>
        </div>

        @foreach ($officeHours as $officeHour)
            <div class="card rounded-0 border-0 mt-2">
                <div class="card-body">
                    {!! $officeHour->description !!}
                </div>
            </div>
        @endforeach
    </div>

</div>
