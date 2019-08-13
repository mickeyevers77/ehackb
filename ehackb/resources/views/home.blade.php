@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-white m-4 text-uppercase">News</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach(\App\News::all() as $news)
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card mb-4">
                        <a href="/news/{{ $news->id }}" class="card-body">
                            <div class="row">
                                @if($news->getImage())
                                    <div class="col-auto">
                                        <div class="image" style="background-image: url('{{ $news->getImage('thumb') }}'); width: 120px; height: 80px;"></div>
                                    </div>
                                @endif

                                <div class="col">
                                    <h4>{{ $news->title }}</h4>
                                    <div>{{ $news->short_description }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('components.sponsors')
    @include('components.newsletter')
    @include('components.location')
@endsection
