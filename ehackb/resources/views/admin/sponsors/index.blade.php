@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="text-white mt-4 mb-4 text-uppercase">Sponsors</h2>
            </div>
            <div class="col-auto">
                <a class="btn btn-sm mt-4 mb-4 btn-light" href="{{ route('sponsors.create') }}">Create New</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-dark table-borderless table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Link</th>
                            <th class="text-right" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Sponsor::all() as $sponsor)
                            <tr>
                                <td>
                                    <div class="square-image" style="background-image: url('{{ $sponsor->getImage('thumb') }}'); width: 50px; height: 50px;"></div>
                                </td>
                                <td>{{ $sponsor->title }}</td>
                                <td>{{ $sponsor->link }}</td>
                                <td class="text-right">
                                    <a class="d-inline btn btn-sm btn-light" href="{{ route('sponsors.edit', $sponsor) }}">Edit</a>
                                    <label class="d-inline btn btn-sm btn-danger pointer" for="delete-{{ $sponsor->id }}">Delete</label>

                                    <form class="hidden" action="{{ route('sponsors.destroy', $sponsor) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" id="delete-{{ $sponsor->id }}" class="d-none">
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
