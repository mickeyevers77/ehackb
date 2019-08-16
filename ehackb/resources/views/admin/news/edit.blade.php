@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">News</div>

                    <div class="card-body">
                        <form id="form" method="POST" action="{{ $news->id ? route('news.update', $news) : route('news.store') }}" enctype="multipart/form-data">
                            @method($news->id ? 'PUT' : 'POST')
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-8">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $news->title }}" required autocomplete="title" autofocus>

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
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') ?? $news->image }}" autocomplete="image" autofocus>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="published_at" class="col-md-4 col-form-label text-md-right">Published At</label>

                                <div class="col-md-8">
                                    <input id="published_at" type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" name="published_at" value="{{ old('published_at') ?? $news->published_at_date_time_local() }}" autocomplete="published_at" autofocus>

                                    @error('published_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_description" class="col-md-4 col-form-label text-md-right">Short Description</label>

                                <div class="col-md-8">
                                    <input id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{ old('short_description') ?? $news->short_description }}" required autocomplete="short_description" autofocus>

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
                                        {!! old('long_description') ?: $news->long_description !!}
                                    </div>

                                    @error('long_description')
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


