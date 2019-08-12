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
                        <div class="card-body">
                            <div class="row">
                                @if($news->getImage())
                                    <div class="col-auto">
                                        <div class="square-image" style="background-image: url('{{ $news->getImage('thumb') }}'); width: 120px; height: 80px;"></div>
                                    </div>
                                @endif

                                <div class="col">
                                    <h4>{{ $news->title }}</h4>
                                    <div>{{ $news->short_description }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-white m-4 text-uppercase">Sponsors</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach(\App\Sponsor::all() as $sponsor)
                <div class="col-12 col-md-4">
                    <div class="mb-4 text-center">
                        <a href="{{ $sponsor->link }}" target="_blank" class="text-white">{{ $sponsor->title }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="location" class="mt-5">
        <div id="location-overlay" class="text-center text-white p-5">
            <h2>LOCATION</h2>
            <p class="mt-4 mb-4">Nijverheidskaai 170
                <br>1070 Anderlecht</p>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <a href="https://www.google.com/maps/dir/?api=1&amp;destination=Nijverheidskaai+170,+1070+Anderlecht&amp;travelmode=bicycling" target="_blank" id="fietsen" class="showOverlay">
                            <i class="travel-icon fas fa-bicycle"></i>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="https://www.google.com/maps/dir/?api=1&amp;destination=Nijverheidskaai+170,+1070+Anderlecht&amp;travelmode=transit" target="_blank" id="openbaar" class="showOverlay">
                            <i class="travel-icon fas fa-train"></i>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="https://www.google.com/maps/dir/?api=1&amp;destination=Nijverheidskaai+170,+1070+Anderlecht&amp;travelmode=driving" target="_blank" id="auto" class="showOverlay">
                            <i class="travel-icon fas fa-car"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
