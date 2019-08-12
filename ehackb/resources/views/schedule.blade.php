@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-white m-4 text-uppercase">Schedule</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach(\App\Event::all() as $event)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ $event->title }}</div>

                        <div class="card-body">
                            {{ $event->short_description }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
