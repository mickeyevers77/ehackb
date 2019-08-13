@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="text-white mt-4 mb-4 text-uppercase">News</h2>
            </div>
            <div class="col-auto">
                <a class="btn btn-sm mt-4 mb-4 btn-light" href="{{ route('news.create') }}">Create New</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-dark table-borderless table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Published At</th>
                            <th class="text-right" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\News::all() as $news)
                            <tr>
                                <td>
                                    <div class="image" style="background-image: url('{{ $news->getImage('thumb') }}'); width: 60px; height: 40px;"></div>
                                </td>
                                <td>{{ $news->title }}</td>
                                <td>{{ $news->published_at }}</td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-light" href="{{ route('news.edit', $news) }}">Edit</a>
                                    <label class="d-inline btn btn-sm btn-danger pointer" for="delete-{{ $news->id }}">Delete</label>

                                    <form class="hidden" action="{{ route('news.destroy', $news) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" id="delete-{{ $news->id }}" class="d-none">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
