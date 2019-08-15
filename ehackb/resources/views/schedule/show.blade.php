@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-white m-4 text-uppercase">{{ $event->title }}</h2>
            </div>
        </div>
        @if($event->getImage())
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <img class="image w-100 card" alt="{{ $event->title }}" src="{{ $event->getImage('detail') }}">
                </div>
            </div>
        @endif
        <div class="row justify-content-center text-white my-5">
            <div class="col-12 col-md-10 col-lg-8">
                {!! $event->long_description !!}
            </div>
        </div>
    </div>
@endsection
