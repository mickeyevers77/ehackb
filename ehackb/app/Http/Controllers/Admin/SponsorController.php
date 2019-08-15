<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Sponsor;

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

    public function store(StoreSponsorRequest $request)
    {
        $sponsor = new Sponsor();
        $sponsor->fill([
            'title' => $request['title'],
            'link'  => $request['link'],
        ]);
        $sponsor->save();

        if ($request->has('image')) {
            $sponsor->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()
            ->route('sponsors.index')
            ->with('message', 'Sponsor created!');
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

    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        $sponsor->update([
            'title' => $request['title'],
            'link'  => $request['link'],
        ]);
        $sponsor->save();

        if ($request->has('image')) {
            $sponsor->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()
            ->route('sponsors.index')
            ->with('message', 'Sponsor updated!');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()
            ->route('sponsors.index')
            ->with('message', 'Sponsor deleted!');
    }
}
