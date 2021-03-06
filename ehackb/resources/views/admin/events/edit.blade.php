@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Event</div>

                    <div class="card-body">
                        <form id="form" method="POST" action="{{ $event->id ? route('events.update', $event) : route('events.store') }}" enctype="multipart/form-data">
                            @method($event->id ? 'PUT' : 'POST')
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $event->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-8">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') ?? $event->image }}" autocomplete="image" autofocus>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="speaker" class="col-md-4 col-form-label text-md-right">Speaker</label>

                                <div class="col-md-8">
                                    <input id="speaker" type="text" class="form-control @error('speaker') is-invalid @enderror" name="speaker" value="{{ old('speaker') ?? $event->speaker }}" required autocomplete="speaker" autofocus>

                                    @error('speaker')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="starts_at" class="col-md-4 col-form-label text-md-right">Starts At</label>

                                <div class="col-md-8">
                                    <input id="starts_at" type="datetime-local" class="form-control @error('starts_at') is-invalid @enderror" name="starts_at" value="{{ old('starts_at') ?? $event->starts_at_date_time_local() }}" required autocomplete="starts_at" autofocus>

                                    @error('starts_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ends_at" class="col-md-4 col-form-label text-md-right">Ends At</label>

                                <div class="col-md-8">
                                    <input id="ends_at" type="datetime-local" class="form-control @error('ends_at') is-invalid @enderror" name="ends_at" value="{{ old('ends_at') ?? $event->ends_at_date_time_local() }}" required autocomplete="ends_at" autofocus>

                                    @error('ends_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_description" class="col-md-4 col-form-label text-md-right">Short Description</label>

                                <div class="col-md-8">
                                    <input id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{ old('short_description') ?? $event->short_description }}" required autocomplete="short_description" autofocus>

                                    @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="long_description" class="col-md-4 col-form-label text-md-right">Long Description</label>

                                <div class="col-md-8 d-flex flex-column">
                                    <div id="long_description">
                                        {!! old('long_description') ?: $event->long_description !!}
                                    </div>

                                    @error('long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slots" class="col-md-4 col-form-label text-md-right">Slots</label>

                                <div class="col-md-8">
                                    <input id="slots" type="number" class="form-control @error('slots') is-invalid @enderror" name="slots" value="{{ old('slots') ?? $event->slots }}" required autocomplete="slots" autofocus>

                                    @error('slots')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script>
        var quill = new Quill('#long_description', {
            theme: 'snow',
        });

        $(document).ready(function(){
            $("#form").on("submit", function () {
                var hvalue = $('.ql-editor').html();
                $(this).append("<textarea name='long_description' style='display:none'>"+hvalue+"</textarea>");
            });
        });
    </script>
@endsection
