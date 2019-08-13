@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <img alt="" src="/img/logoSimple.svg" style="height: 200px;">
                <h1 class="text-primary text-center text-uppercase">EhackB</h1>
                <h2 class="text-secondary text-center text-uppercase">3 - 4 may</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-white m-4 text-uppercase">News</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach(\App\News::all()->where('published_at', '<', now())->sortByDesc('published_at') as $news)
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card mb-4">
                        <a href="/news/{{ $news->id }}" class="card-body text-dark">
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
