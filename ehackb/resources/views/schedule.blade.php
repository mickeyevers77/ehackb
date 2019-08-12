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
                <div class="col col-md-6">
                    <div class="card">
                        <div class="card-header">{{ $event->title }}</div>

                        <div class="card-body">
                            {{ $event->short_description }}
                        </div>

                        <div class="card-footer">
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    {{ $event->availableSlots() . '/' . $event->slots }} available.
                                </div>
                                <div class="col-auto">
                                    @if(!Auth::user())
                                        <a class="btn btn-sm btn-dark" href="/login">Login to enroll</a>
                                    @elseif(Auth::user()->events->contains($event))
                                        <a class="btn btn-sm btn-dark" href="{{ route('events.cancel', $event) }}">Cancel</a>
                                    @else
                                        <a class="btn btn-sm btn-dark" href="{{ route('events.enroll', $event) }}">Enroll</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
