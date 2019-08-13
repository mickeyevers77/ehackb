@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-white m-4 text-uppercase">{{ $news->title }}</h2>
            </div>
        </div>
        @if($news->getImage())
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <img class="image w-100" alt="{{ $news->title }}" src="{{ $news->getImage('detail') }}">
                </div>
            </div>
        @endif
    </div>
@endsection
