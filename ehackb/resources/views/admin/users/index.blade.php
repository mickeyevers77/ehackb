@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="text-white mt-4 mb-4 text-uppercase">Users</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-dark table-borderless table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">E-Mail Address</th>
                            <th scope="col">Is Admin</th>
                            <th class="text-right" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\User::all() as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin }}</td>
                                <td class="text-right">
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
