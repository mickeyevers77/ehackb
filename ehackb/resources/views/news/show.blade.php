@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-white mt-4 text-uppercase">{{ $news->title }}</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="mb-4 text-secondary">
                    <i class="far fa-calendar-alt mr-1"></i>
                    {{ $news->published_at->format('d.m.Y H:i') }}
                </div>
            </div>
        </div>

        @if($news->getImage())
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <img class="image w-100 card" alt="{{ $news->title }}" src="{{ $news->getImage('detail') }}">
                </div>
            </div>
        @endif

        <div class="row justify-content-center text-white my-5">
            <div class="col-12 col-md-10 col-lg-8">
                {!! $news->long_description !!}
            </div>
        </div>

        @if($news->comments->count() > 0)
            <div class="row justify-content-center my-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Comments</div>

                        <div class="card-body">
                            @foreach($news->comments as $comment)
                                @if (!$loop->first)
                                    <hr>
                                @endif
                                <div>
                                    <div class="text-primary">{{ $comment->user->first_name }}</div>
                                    <div>{{ $comment->body }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(Auth::user())
            <div class="row justify-content-center my-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add a comment</div>

                        <div class="card-body">
                            <form method="POST" action="/news/{{ $news->id }}/comment">
                                @csrf

                                <div class="form-group row">
                                    <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                                    <div class="col-md-6">
                                        <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="body">

                                        @error('body')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0 justify-content-center">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-dark">
                                            Post
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
