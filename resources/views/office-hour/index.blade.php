@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center gap-2">
            <h5 class="m-0">Office Hours</h5>
            <a href="{{ route('officeHour.create') }}" class="btn btn-primary">Add New Office Hour</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead class="table-light ">
                        <tr>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officeHours as $officeHour)
                            <tr>
                                <td>{!! $officeHour->description !!}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('officeHour.edit', $officeHour->id) }}" class="btn btn-info btn-sm">
                                        <i class="ti ti-edit font-20"></i>
                                    </a>
                                    <a href="{{ route('officeHour.destroy', $officeHour->id) }}" class="btn btn-danger btn-sm">
                                        <i class="ti ti-trash font-20"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
