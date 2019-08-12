@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="text-white mt-4 mb-4 text-uppercase">Events</h2>
            </div>
            <div class="col-auto">
                <a class="btn btn-sm mt-4 mb-4 btn-light" href="{{ route('events.create') }}">Create New</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-dark table-borderless table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Starts At</th>
                            <th scope="col">Ends At</th>
                            <th class="text-right" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Event::all() as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->starts_at }}</td>
                                <td>{{ $event->ends_at }}</td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-light" href="{{ route('events.edit', $event) }}">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
