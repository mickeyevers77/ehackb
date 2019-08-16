@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="text-white mt-4 mb-4 text-uppercase">Subscribers</h2>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif

        <div class="row">
            <div class="col">
                <table class="table table-dark table-borderless table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">E-Mail Address</th>
                            <th class="text-right" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Subscriber::all() as $subscriber)
                            <tr>
                                <td>{{ $subscriber->first_name }}</td>
                                <td>{{ $subscriber->last_name }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td class="text-right">
                                    <label class="d-inline btn btn-sm btn-danger pointer" for="delete-{{ $subscriber->id }}">Delete</label>

                                    <form class="hidden" action="{{ route('subscribers.destroy', $subscriber) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" id="delete-{{ $subscriber->id }}" class="d-none">
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
