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
                    <img class="image w-100" alt="{{ $event->title }}" src="{{ $event->getImage('detail') }}">
                </div>
            </div>
        @endif
    </div>
@endsection
