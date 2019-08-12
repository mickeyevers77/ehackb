<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.events.index');
    }

    public function create()
    {
        return view('admin.events.edit')
            ->with('event', new Event);
    }

    public function store(StoreEventRequest $request)
    {
        $event = new Event();
        $event->fill([
            'title'             => $request['title'],
            'speaker'           => $request['speaker'],
            'image'             => '',
            'short_description' => $request['short_description'],
            'long_description'  => $request['long_description'],
            'slots'             => $request['slots'],
        ]);
        $event->save();

        if ($request->has('image')) {
            $event->addMediaFromRequest('image')->toMediaCollection('image');
            $event->save();
        }

        return redirect()->route('events.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit')
            ->with('event', $event);
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update([
            'title'             => $request['title'],
            'speaker'           => $request['speaker'],
            'image'             => '',
            'short_description' => $request['short_description'],
            'long_description'  => $request['long_description'],
            'slots'             => $request['slots'],
        ]);
        $event->save();

        if ($request->has('image')) {
            $event->addMediaFromRequest('image')->toMediaCollection('image');
            $event->save();
        }

        return redirect()->route('events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }

    public function enroll(Event $event)
    {
        $event->users()->attach(Auth::user());
        return redirect()->back();
    }

    public function cancel(Event $event)
    {
        $event->users()->detach(Auth::user());
        return redirect()->back();
    }
}
