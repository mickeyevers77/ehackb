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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ $news->title }}</div>

                        <div class="card-body">
                            {{ $news->short_description }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-white m-4 text-uppercase">Location</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-white m-4 text-uppercase">Sponsors</h2>
            </div>
        </div>
    </div>
@endsection
