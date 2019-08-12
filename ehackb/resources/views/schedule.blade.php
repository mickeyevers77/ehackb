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
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                @if($event->getImage())
                                    <div class="col-auto">
                                        <div class="square-image" style="background-image: url('{{ $event->getImage('thumb') }}'); width: 120px; height: 80px;"></div>
                                    </div>
                                @endif

                                <div class="col">
                                    <h4>{{ $event->title }}</h4>
                                    <div>{{ $event->short_description }}</div>
                                </div>
                            </div>
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
