<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.sponsors.index');
    }

    public function create()
    {
        return view('admin.sponsors.edit')
            ->with('sponsor', new Sponsor);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsors.edit')
            ->with('sponsor', $sponsor);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
