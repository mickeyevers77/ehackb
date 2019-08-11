<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(updateProfileRequest $request)
    {
        $user = Auth::user();

        $user->update([
            'first_name' => $request['first_name'],
            'last_name'  => $request['last_name'],
        ]);
        $user->save();

        return redirect()->back();
    }
}
